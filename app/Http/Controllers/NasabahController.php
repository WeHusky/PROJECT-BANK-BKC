<?php
namespace App\Http\Controllers;

class NasabahController extends Controller{
    public function showLandingPage()
    {
        return view('auth.landing');
    }
    public function showHomePage()
    {
        return view('menu.homepage');
    }
    public function showAccountPage()
    {
        return view('menu.account');
    }
        public function showAccountSettingsPage()
    {
        return view('menu.account-settings');
    }
    public function showNotificationsPage()
    {
        return view('menu.notification');
    }
}
?>
