<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite('resources/css/app.css')
</head>
    <body>
        <section class="bg-[#EFF1F5] min-h-screen flex items-center justify-center">
            <div class="bg-white flex rounded-2xl max-w-4xl shadow-lg shadow-[#b2c1dd]">
                <div class="sm:w-1/2 px-14 flex flex-col justify-center">
                    <div class="logo w-full flex items-center justify-center max-w-30 mb-10">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                    <h2 class="font-bold text-2xl text-[#29BCCF]">Login</h2>
                    <p class="text-sm mt-4 text-[#13545C]">Please enter your valid credentials.</p>
                    <hr class="mt-2 opacity-10">

                    <form action="" class="flex flex-col gap-4">
                        <input class="p-2 mt-8  rounded-xl border border-[#D4D6D9]" type="text" name="email" placeholder="youremail@bkcbank.com">
                        <input class="p-2 rounded-xl border border-[#D4D6D9] mb-4" type="password" name="password" placeholder="Password">
                        <button class="bg-[#29BCCF] rounded-xl py-2 text-white font-semibold">Login</button>
                    </form>
                </div>
                <div class="w-1/2 sm:block hidden">
                    <img class="rounded-2xl max-h-1000" src="{{ asset('images/cropped_bank_worker.png') }}" alt="">
                </div>
            </div>
        </section>
    </body>
</html> 

<div class="w-"></div>