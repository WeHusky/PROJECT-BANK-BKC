@extends('layouts.app')

@section('content')
<section class="bg-[#EFF1F5] min-h-screen flex items-center justify-center">
    <div class="bg-white flex w-[1000px] h-[500px] rounded-2xl shadow-lg">
        <div class="w-1/2 px-12 flex flex-col justify-center">
            <div class="logo w-full flex items-center justify-center mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="" class="w-32">
            </div>
            <h2 class="font-bold text-2xl text-[#29BCCF]">Register</h2>
            <p class="text-sm mt-2 text-[#13545C]">Please fill in your information.</p>
            <hr class="mt-2 opacity-10">

            <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4 mt-4">
                @csrf
                <input class="p-2 rounded-xl border border-[#D4D6D9] @error('name') is-invalid @enderror" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}"
                    placeholder="Your Name"
                    required 
                    autocomplete="name" 
                    autofocus>

                @error('name')
                    <span class="text-red-500 text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input class="p-2 rounded-xl border border-[#D4D6D9] @error('email') is-invalid @enderror" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    placeholder="youremail@bkcbank.com"
                    required 
                    autocomplete="email">

                @error('email')
                    <span class="text-red-500 text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input class="p-2 rounded-xl border border-[#D4D6D9] @error('password') is-invalid @enderror" 
                    type="password" 
                    name="password" 
                    placeholder="Password"
                    required 
                    autocomplete="new-password">

                @error('password')
                    <span class="text-red-500 text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input class="p-2 rounded-xl border border-[#D4D6D9]" 
                    type="password" 
                    name="password_confirmation" 
                    placeholder="Confirm Password"
                    required 
                    autocomplete="new-password">

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" 
                            name="terms" 
                            id="terms" 
                            required
                            class="mr-2">
                        <label for="terms" class="text-sm text-[#13545C]">
                            {{ __('I agree to the terms and conditions') }}
                        </label>
                    </div>
                    <a href="{{ route('login') }}" class="text-sm text-[#29BCCF] hover:text-[#70d6ff]">
                        {{ __('Already have an account?') }}
                    </a>
                </div>

                <button type="submit" class="bg-[#29BCCF] hover:bg-[#70d6ff] transition rounded-xl py-2 text-white font-semibold cursor-pointer">
                    {{ __('Register') }}
                </button>
            </form>
        </div>
        <div class="w-1/2 overflow-hidden">
            <img class="h-full w-full object-cover" src="{{ asset('images/adminwelcomepage-02-02.png') }}" alt="">
        </div>
    </div>
</section>
@endsection
