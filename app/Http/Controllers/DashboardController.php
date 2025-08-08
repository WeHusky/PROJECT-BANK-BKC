<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan_Kredit;
use App\Models\Nasabah;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Get loan statistics for charts
            $loanStats = $this->getLoanStatistics();

            return view('menu.dashboard', compact('loanStats'));
        } catch (\Exception $e) {
            \Log::error('Dashboard Error: ' . $e->getMessage());

            return view('menu.dashboard', [
                'loanStats' => [
                    'totalLoans' => 0,
                    'loansByStatus' => [],
                    'loansByCategory' => [],
                    'monthlyLoans' => [],
                    'totalLoanAmount' => 0,
                    'totalDisbursedAmount' => 0,
                    'monthlyDisbursements' => []
                ]
            ]);
        }
    }

    public function regions()
    {
        // Logic to retrieve regions or any other data
        return view('menu.newdashboard'); // Adjust the view as necessary
    }

    public function search(Request $request)
    {
        try {
            $query = $request->get('q');
            $results = [];

            \Log::info('Search query: ' . $query);

            if (strlen($query) >= 2) {
                // Search in loans
                $loans = Pengajuan_Kredit::with('nasabah')
                    ->where(function($q) use ($query) {
                        $q->whereHas('nasabah', function($subQ) use ($query) {
                            $subQ->where('nama_nasabah', 'like', "%{$query}%");
                        })
                        ->orWhere('status_pengajuankredit', 'like', "%{$query}%")
                        ->orWhere('kategori_pengajuankredit', 'like', "%{$query}%")
                        ->orWhere('id_pengajuankredit', 'like', "%{$query}%");
                    })
                    ->limit(5)
                    ->get();

                \Log::info('Found loans: ' . $loans->count());

                foreach ($loans as $loan) {
                    \Log::info('Processing loan: ' . $loan->id_pengajuankredit . ' - ' . $loan->status_pengajuankredit);
                    $results[] = [
                        'title' => "Pinjaman #{$loan->id_pengajuankredit} - " . ($loan->nasabah ? $loan->nasabah->nama_nasabah : 'Unknown'),
                        'subtitle' => "Status: {$loan->status_pengajuankredit} | Rp " . number_format($loan->nominal_pengajuankredit, 0, ',', '.'),
                        'url' => route('loans.show', ['id' => $loan->id_pengajuankredit]),
                        'status' => $loan->status_pengajuankredit,
                        'isDisbursed' => $loan->status_pengajuankredit === 'Loan Disbursed'
                    ];
                }

                // Search in customers
                $customers = Nasabah::where('nama_nasabah', 'like', "%{$query}%")
                    ->limit(3)
                    ->get();

                \Log::info('Found customers: ' . $customers->count());

                foreach ($customers as $customer) {
                    \Log::info('Processing customer: ' . $customer->nama_nasabah);
                    $results[] = [
                        'title' => "Nasabah: {$customer->nama_nasabah}",
                        'subtitle' => "Email: {$customer->email_nasabah}",
                        'url' => route('loans') . "?search={$customer->nama_nasabah}"
                    ];
                }
            }

            \Log::info('Total results: ' . count($results));
            return response()->json($results);
        } catch (\Exception $e) {
            \Log::error('Search Error: ' . $e->getMessage());
            return response()->json([]);
        }
    }

    private function getLoanStatistics()
    {
        try {
            // Get total loans
            $totalLoans = Pengajuan_Kredit::count();

            // Get loans by status
            $loansByStatus = Pengajuan_Kredit::selectRaw('status_pengajuankredit, COUNT(*) as count')
                ->groupBy('status_pengajuankredit')
                ->get()
                ->pluck('count', 'status_pengajuankredit')
                ->toArray();

            // Get loans by category
            $loansByCategory = Pengajuan_Kredit::selectRaw('kategori_pengajuankredit, COUNT(*) as count')
                ->groupBy('kategori_pengajuankredit')
                ->get()
                ->pluck('count', 'kategori_pengajuankredit')
                ->toArray();

            // Get monthly loan applications (last 6 months)
            $monthlyLoans = Pengajuan_Kredit::selectRaw('MONTH(tanggal_pengajuankredit) as month, COUNT(*) as count')
                ->where('tanggal_pengajuankredit', '>=', now()->subMonths(6))
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->pluck('count', 'month')
                ->toArray();

            // Get total loan amount
            $totalLoanAmount = Pengajuan_Kredit::sum('nominal_pengajuankredit');

            // Get disbursement statistics
            $totalDisbursedAmount = Pengajuan_Kredit::where('status_pengajuankredit', 'Loan Disbursed')
                ->sum('nominal_pengajuankredit');

            // Get disbursement by month (last 6 months)
            $monthlyDisbursements = Pengajuan_Kredit::selectRaw('MONTH(tanggal_pengajuankredit) as month, SUM(nominal_pengajuankredit) as total_amount')
                ->where('status_pengajuankredit', 'Loan Disbursed')
                ->where('tanggal_pengajuankredit', '>=', now()->subMonths(6))
                ->groupBy('month')
                ->orderBy('month')
                ->get()
                ->pluck('total_amount', 'month')
                ->toArray();

            return [
                'totalLoans' => $totalLoans,
                'loansByStatus' => $loansByStatus,
                'loansByCategory' => $loansByCategory,
                'monthlyLoans' => $monthlyLoans,
                'totalLoanAmount' => $totalLoanAmount,
                'totalDisbursedAmount' => $totalDisbursedAmount,
                'monthlyDisbursements' => $monthlyDisbursements
            ];
        } catch (\Exception $e) {
            \Log::error('getLoanStatistics Error: ' . $e->getMessage());
            return [
                'totalLoans' => 0,
                'loansByStatus' => [],
                'loansByCategory' => [],
                'monthlyLoans' => [],
                'totalLoanAmount' => 0,
                'totalDisbursedAmount' => 0,
                'monthlyDisbursements' => []
            ];
        }
    }

    private function getStatusColor($status)
    {
        $colors = [
            'Under Review' => '#4299e1',
            'Loan Approved' => '#48bb78',
            'Loan Rejected' => '#f56565',
            'Survey Scheduled' => '#ed8936',
            'Survey Under Review' => '#9f7aea',
            'Awaiting Date Confirmation' => '#38b2ac',
            'Loan Disbursed' => '#68d391',
            'Loan Cancelled' => '#a0aec0'
        ];

        return $colors[$status] ?? '#718096';
    }
}
