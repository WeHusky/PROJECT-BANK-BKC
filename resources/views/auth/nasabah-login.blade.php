<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank BKC</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#EFF1F5] max-h-screen overflow-hidden flex flex-col">
    <div class="w-full ">
        <div class="header flex items-center relative w-full px-7 py-6">
            <a class="absolute left-4 " href="{{ route('nasabah.landingpage') }}"><img class="w-[31px] h-[31px]" src="{{ asset('images/arrowblue.png') }}" alt=""></a>
            <h2 class="font-extrabold text-[#13545C] text-[24px] text-center w-full">Sign In</h2>
        </div>
        <div class="body bg-white rounded-tl-[45px] rounded-tr-[45px] w-screen h-screen px-7 flex-grow">
            <form class="w-full max-w-full mx-auto pt-10" method="POST" action="{{ route('nasabah.login') }}">
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
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-normal text-[#13545C]">Email Address</label>
                    <input name="email_akun" type="email" id="email" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="name@email.com" required />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-normal text-[#13545C]">Password</label>
                    <input name="password_akun" type="password" id="password" class="bg-gray-50 border border-[#29BBCF] text-gray-900 text-sm rounded-[30px] focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-0" placeholder="Password" required />
                </div>
                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                    <input name="remember" id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300"/>
                    </div>
                    <label for="remember" class="ms-2 text-sm font-normal text-[#13545C]">Remember me</label>
                </div>
                <a class="text-[#13545C] underline text-sm text-normal" href=""><p>Forgot Password?</p></a>
                <button type="submit" class="mt-3 text-white bg-[#29BBCF] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-[13px] text-sm w-full sm:w-auto px-5 py-2.5 text-center">{{ __('Sign in') }}</button>
            </form>
        </div>
    </div>
</body>
</html>
