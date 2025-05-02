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
<body class="bg-[#29BCCF] max-h-screen overflow-hidden">
    <div class="w-full relative">
        <div class="absolute flex space-x-1 top-10 items-center w-full justify-center">
            <img src="{{ asset('images/image 4.png') }}" alt="">
            <img src="{{ asset('images/image 5.png') }}" alt="">
        </div>
        <img src="{{ asset('images/welcomepage-01.png') }}" alt="">
        <div class="bg-white absolute w-full bottom-5 h-[394px] border rounded-tl-[50px] rounded-tr-[50px] flex flex-col items-center p-5">
            <h2 class="font-bold text-[25px] align-middle text-[#13545C] mb-4">Welcome!</h2>
            <a href="" class="rounded-[50px] bg-[#29BCCF] h-[60px] w-full flex items-center justify-between px-7">
                <p class="text-white font-semibold">Create an Account</p>
                <img src="{{ asset('images/arrow-right.png') }}" alt="">
            </a>
            <a href="{{ route('nasabah.login') }}" class="rounded-[50px] bg-[#29BCCF] h-[60px] w-full flex items-center justify-between px-7 mt-2">
                <p class="text-white font-semibold">Sign In</p>
                <img src="{{ asset('images/arrow-right.png') }}" alt="">
            </a>
        </div>
    </div>
</body>
</html>