@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-lg">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Verify Your Email
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Please enter the 6-digit code sent to your email address
            </p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('nasabah.verify-email') }}" method="POST">
            @csrf
            <div>
                <label for="otp" class="sr-only">OTP Code</label>
                <input id="otp" name="otp" type="text" required
                    class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    placeholder="Enter 6-digit code"
                    maxlength="6"
                    pattern="[0-9]{6}"
                    title="Please enter a 6-digit code">
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Verify Email
                </button>
            </div>

            <div class="text-sm text-center">
                <p class="text-gray-600">
                    Didn't receive the code?
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Resend Code
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
