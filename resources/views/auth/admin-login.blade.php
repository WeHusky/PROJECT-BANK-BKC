@extends('layouts.app')

@section('content')
<section class="bg-[#EFF1F5] min-h-screen flex items-center justify-center">
    <div class="bg-white flex p-12 rounded-2xl sm:p-0 sm:w-[1000px] sm:h-[570px]">
        <div class="sm:w-1/2 w-full px-12 flex flex-col justify-center">
            <div class="logo w-full flex items-center justify-center mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="" class="w-32">
            </div>
            <h2 class="font-bold text-2xl text-[#29BCCF]">Login</h2>
            <p class="text-sm mt-2 text-[#13545C]">Please enter your valid credentials.</p>
            <hr class="mt-2 opacity-10">

            <form method="POST" action="{{ route('admin.login') }}" class="flex flex-col gap-4 mt-4">
                @csrf
                <input class="p-2 rounded-xl border border-[#D4D6D9] @error('email') is-invalid @enderror"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="youremail@bkcbank.com"
                    required
                    autocomplete="email"
                    autofocus>

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
                    autocomplete="current-password">

                @error('password')
                    <span class="text-red-500 text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox"
                            name="remember"
                            id="remember"
                            {{ old('remember') ? 'checked' : '' }}
                            class="mr-2">
                        <label for="remember" class="text-sm text-[#13545C]">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <button type="submit" class="bg-[#29BCCF] hover:bg-[#70d6ff] transition rounded-xl py-2 text-white font-semibold cursor-pointer">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
        <div class="w-1/2 sm:block hidden overflow-hidden rounded-r-2xl">
            <img class="h-full w-full object-cover" src="{{ asset('images/adminwelcomepage-02-02.png') }}" alt="">
        </div>
    </div>
</section>
@endsection
