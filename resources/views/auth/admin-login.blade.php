@extends('layouts.app')

@section('content')
<!-- <style>
    /* From Uiverse.io by himanshu9682 */
.type--A {
  --line_color: #555555;
  --back_color: #ffecf6;
}
.type--B {
  --line_color: #1b1919;
  --back_color: #e9ecff;
}
.type--C {
  --line_color: #00135c;
  --back_color: #defffa;
}
.button {
  position: relative;
  z-index: 0;
  width: 400px;
  height: 56px;
  text-decoration: none;
  font-size: 14px;
  font-weight: bold;
  color: var(--line_color);
  letter-spacing: 2px;
  transition: all 0.3s ease;
}
.button__text {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}
.button::before,
.button::after,
.button__text::before,
.button__text::after {
  content: "";
  position: absolute;
  height: 3px;
  border-radius: 2px;
  background: var(--line_color);
  transition: all 0.5s ease;
}
.button::before {
  top: 0;
  left: 54px;
  width: calc(100% - 56px * 2 - 16px);
}
.button::after {
  top: 0;
  right: 54px;
  width: 8px;
}
.button__text::before {
  bottom: 0;
  right: 54px;
  width: calc(100% - 56px * 2 - 16px);
}
.button__text::after {
  bottom: 0;
  left: 54px;
  width: 8px;
}
.button__line {
  position: absolute;
  top: 0;
  width: 56px;
  height: 100%;
  overflow: hidden;
}
.button__line::before {
  content: "";
  position: absolute;
  top: 0;
  width: 150%;
  height: 100%;
  box-sizing: border-box;
  border-radius: 300px;
  border: solid 3px var(--line_color);
}
.button__line:nth-child(1),
.button__line:nth-child(1)::before {
  left: 0;
}
.button__line:nth-child(2),
.button__line:nth-child(2)::before {
  right: 0;
}
.button:hover {
  letter-spacing: 6px;
}
.button:hover::before,
.button:hover .button__text::before {
  width: 8px;
}
.button:hover::after,
.button:hover .button__text::after {
  width: calc(100% - 56px * 2 - 16px);
}
.button__drow1,
.button__drow2 {
  position: absolute;
  z-index: -1;
  border-radius: 16px;
  transform-origin: 16px 16px;
}
.button__drow1 {
  top: -16px;
  left: 40px;
  width: 32px;
  height: 0;
  transform: rotate(30deg);
}
.button__drow2 {
  top: 44px;
  left: 77px;
  width: 32px;
  height: 0;
  transform: rotate(-127deg);
}
.button__drow1::before,
.button__drow1::after,
.button__drow2::before,
.button__drow2::after {
  content: "";
  position: absolute;
}
.button__drow1::before {
  bottom: 0;
  left: 0;
  width: 0;
  height: 32px;
  border-radius: 16px;
  transform-origin: 16px 16px;
  transform: rotate(-60deg);
}
.button__drow1::after {
  top: -10px;
  left: 45px;
  width: 0;
  height: 32px;
  border-radius: 16px;
  transform-origin: 16px 16px;
  transform: rotate(69deg);
}
.button__drow2::before {
  bottom: 0;
  left: 0;
  width: 0;
  height: 32px;
  border-radius: 16px;
  transform-origin: 16px 16px;
  transform: rotate(-146deg);
}
.button__drow2::after {
  bottom: 26px;
  left: -40px;
  width: 0;
  height: 32px;
  border-radius: 16px;
  transform-origin: 16px 16px;
  transform: rotate(-262deg);
}
.button__drow1,
.button__drow1::before,
.button__drow1::after,
.button__drow2,
.button__drow2::before,
.button__drow2::after {
  background: var(--back_color);
}
.button:hover .button__drow1 {
  animation: drow1 ease-in 0.06s;
  animation-fill-mode: forwards;
}
.button:hover .button__drow1::before {
  animation: drow2 linear 0.08s 0.06s;
  animation-fill-mode: forwards;
}
.button:hover .button__drow1::after {
  animation: drow3 linear 0.03s 0.14s;
  animation-fill-mode: forwards;
}
.button:hover .button__drow2 {
  animation: drow4 linear 0.06s 0.2s;
  animation-fill-mode: forwards;
}
.button:hover .button__drow2::before {
  animation: drow3 linear 0.03s 0.26s;
  animation-fill-mode: forwards;
}
.button:hover .button__drow2::after {
  animation: drow5 linear 0.06s 0.32s;
  animation-fill-mode: forwards;
}
@keyframes drow1 {
  0% {
    height: 0;
  }
  100% {
    height: 100px;
  }
}
@keyframes drow2 {
  0% {
    width: 0;
    opacity: 0;
  }
  10% {
    opacity: 0;
  }
  11% {
    opacity: 1;
  }
  100% {
    width: 120px;
  }
}
@keyframes drow3 {
  0% {
    width: 0;
  }
  100% {
    width: 80px;
  }
}
@keyframes drow4 {
  0% {
    height: 0;
  }
  100% {
    height: 120px;
  }
}
@keyframes drow5 {
  0% {
    width: 0;
  }
  100% {
    width: 124px;
  }
}

.container {
  width: 100%;
  height: 300px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.button:not(:last-child) {
  margin-bottom: 64px;
} -->

</style>
<section class="bg-[#EFF1F5] min-h-screen flex items-center justify-center">
    <div class="bg-white flex p-12 rounded-2xl sm:p-0 sm:w-[1000px] sm:h-[570px]">
        <div class="sm:w-1/2 w-full px-12 flex flex-col justify-center">
            <div class="logo w-full flex items-center justify-center mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="" class="w-32">
            </div>
            <h2 class="font-bold text-2xl text-[#29BCCF]">Admin Login</h2>
            <p class="text-sm mt-2 text-[#13545C]">Please enter your valid credentials.</p>
            <hr class="mt-2 opacity-10">

            <form method="POST" action="{{ route('admin.login') }}" class="flex flex-col gap-4 mt-4">
                @csrf
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                        <ul class="mt-3 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input class="p-2 rounded-xl border border-[#D4D6D9] @error('email_akun') border-red-500 @enderror"
                    type="email"
                    name="email_akun"
                    value="{{ old('email_akun') }}"
                    placeholder="youremail@bkcbank.com"
                    required
                    autocomplete="email"
                    autofocus>

                @error('email_akun')
                    <span class="text-red-500 text-sm" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input class="p-2 rounded-xl border border-[#D4D6D9] @error('password_akun') border-red-500 @enderror"
                    type="password"
                    name="password_akun"
                    placeholder="Password"
                    required
                    autocomplete="current-password">

                @error('password_akun')
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

                <button type="submit" class="relative group border-none bg-transparent p-0 outline-none cursor-pointer font-mono font-light uppercase text-base">
                    <span class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-25 rounded-lg transform translate-y-0.5 transition duration-[600ms] ease-[cubic-bezier(0.3,0.7,0.4,1)] group-hover:translate-y-1 group-hover:duration-[250ms] group-active:translate-y-px"></span>
                    <span class="absolute top-0 left-0 w-full h-full rounded-lg bg-gradient-to-l from-[hsl(217,33%,16%)] via-[hsl(217,33%,32%)] to-[hsl(217,33%,16%)]"></span>
                    <div class="relative flex items-center justify-between py-2.5 px-6 text-lg text-white rounded-lg transform -translate-y-1 bg-gradient-to-r from-[#f27121] via-[#e94057] bg-[#29BCCF] gap-3 transition duration-[600ms] ease-[cubic-bezier(0.3,0.7,0.4,1)] group-hover:-translate-y-1.5 group-hover:duration-[250ms] group-active:-translate-y-0.5 brightness-100 group-hover:brightness-110">
                        <span class="select-none">{{ __('Login') }}</span>
                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 ml-2 -mr-1 transition duration-250 group-hover:translate-x-1">
                            <path clip-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                </button>
            </form>
        </div>
        <div class="w-1/2 sm:block hidden overflow-hidden rounded-r-2xl">
            <img class="h-full w-full object-cover" src="{{ asset('images/adminwelcomepage-02-02.png') }}" alt="">
        </div>
    </div>

    @if(session('logged_out'))
    <div id="logoutModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white text-center rounded-xl shadow-lg p-6 max-w-sm w-full animate-fade-in-down">
            <h2 class="text-2xl font-semibold text-green-600 mb-2">Logout Berhasil</h2>
            <p class="text-gray-600 mb-4">Anda telah berhasil keluar dari sistem.</p>
            <button onclick="document.getElementById('logoutModal').style.display='none'"
                    class="bg-[#29BCCF] hover:bg-[#70d6ff] text-white font-semibold py-2 px-4 rounded-xl transition">
                Tutup
            </button>
        </div>
    </div>

    <style>
        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.3s ease-out;
        }
    </style>
@endif

<script>
    setTimeout(() => {
        const modal = document.getElementById('logoutModal');
        if (modal) modal.style.display = 'none';
    }, 4000);
</script>
</section>
@endsection
