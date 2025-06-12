@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Card - Bank BKC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite('resources/css/app.css')
    <style>
        .swiper {
            width: 100%;
            padding-top: 20px;
            padding-bottom: 50px;
        }
        .swiper-slide {
            width: 300px;
            height: 400px;
            margin: 0 auto;
        }
        .swiper-pagination-bullet-active {
            background: #29BBCF !important;
        }
    </style>
</head>
<body class="bg-[#EFF1F5]">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-[#13545C] text-center mb-8">Choose Your Card Design</h1>

        <!-- Swiper -->
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- Classic Black Card -->
                <div class="swiper-slide">
                    <div class="bg-white p-4 rounded-[17px] h-auto">
                        <p class="text-[#13545C] mb-2 font-semibold">Classic Black</p>

                        <div class="creditcard-container">
                            <div class="relative rounded-[12px] overflow-hidden w-[270px] h-[170px] text-white font-sans shadow-lg"
                                style="background: radial-gradient(circle at center, #0f172a 8%, rgb(80, 80, 80) 57%, #000000 90%);">
                                
                                <!-- Zoomed-in wave background -->
                                <div class="absolute inset-0 z-0 opacity-100"
                                    style="background-image: url('{{ asset('images/wave.png') }}'); background-size: 200%; background-position: center;">
                                </div>

                                <!-- Konten kartu -->
                                <div class="relative z-10 p-4 flex flex-col justify-between h-full">
                                    
                                    <!-- Baris atas: Logo dan Chip -->
                                    <div class="flex justify-between items-start">
                                        <div class="flex items-center">
                                            <span class="inline-block w-6 h-6 rounded-full bg-red-600 mr-1" style="box-shadow: 14px 0 0 0 #fbbf24;"></span>
                                            <span class="ml-6 text-white font-semibold text-sm">Master Card</span>
                                        </div>
                                        <img src="{{ asset('images/chip.png') }}" alt="chip" class="h-6 w-10 object-contain" />
                                    </div>

                                    <!-- Nomor kartu -->
                                    <div class="mt-4">
                                        <p class="text-xs text-gray-300 mb-1">Card Number</p>
                                        <p class="tracking-widest text-base text-gray-100 font-mono break-words">
                                            {{ $nasabah->rekening_nasabah }}
                                        </p>
                                    </div>

                                    <!-- Nama & Valid -->
                                    <div class="flex justify-between items-end">
                                        <div>
                                            <p class="text-sm text-gray-100 font-medium">{{ $nasabah->nama_nasabah }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-xs text-gray-300 mb-1">Valid Thru</p>
                                            <p class="text-sm text-gray-100 font-semibold">05/28</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Gold Card -->
                <div class="swiper-slide">
                    <div class="bg-white p-4 rounded-[17px] h-auto">
                        <p class="text-[#13545C] mb-2 font-semibold">Gold Premium</p>

                        <div class="creditcard-container">
                            <div class="relative rounded-[12px] overflow-hidden w-[270px] h-[170px] text-white font-sans shadow-lg"
                                style="background: radial-gradient(circle at center, rgb(212, 151, 20) 8%, rgb(14, 117, 65) 57%, rgb(11, 81, 187) 90%);">
                                
                                <!-- Zoomed-in wave background -->
                                <div class="absolute inset-0 z-0 opacity-1000"
                                    style="background-image: url('{{ asset('images/wave.png') }}'); background-size: 200%; background-position: center;">
                                </div>

                                <!-- Konten kartu -->
                                <div class="relative z-10 p-4 flex flex-col justify-between h-full">
                                    
                                    <!-- Baris atas: Logo dan Chip -->
                                    <div class="flex justify-between items-start">
                                        <div class="flex items-center">
                                            <span class="inline-block w-6 h-6 rounded-full bg-red-600 mr-1" style="box-shadow: 14px 0 0 0 #fbbf24;"></span>
                                            <span class="ml-6 text-white font-semibold text-sm">Master Card</span>
                                        </div>
                                        <img src="{{ asset('images/chip.png') }}" alt="chip" class="h-6 w-10 object-contain" />
                                    </div>

                                    <!-- Nomor kartu -->
                                    <div class="mt-4">
                                        <p class="text-xs text-gray-300 mb-1">Card Number</p>
                                        <p class="tracking-widest text-base text-gray-100 font-mono break-words">
                                            {{ $nasabah->rekening_nasabah }}
                                        </p>
                                    </div>

                                    <!-- Nama & Valid -->
                                    <div class="flex justify-between items-end">
                                        <div>
                                            <p class="text-sm text-gray-100 font-medium">{{ $nasabah->nama_nasabah }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-xs text-gray-300 mb-1">Valid Thru</p>
                                            <p class="text-sm text-gray-100 font-semibold">05/28</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Red Card -->
                <div class="swiper-slide">
                    <div class="bg-white p-4 rounded-[17px] h-auto">
                        <p class="text-[#13545C] mb-2 font-semibold">Red Premium</p>

                        <div class="creditcard-container">
                            <div class="relative rounded-[12px] overflow-hidden w-[270px] h-[170px] text-white font-sans shadow-lg"
                                style="background: radial-gradient(circle at center, #0f172a 8%, rgb(187, 28, 28) 57%, #000000 90%);">
                                
                                <!-- Zoomed-in wave background -->
                                <div class="absolute inset-0 z-0 opacity-100"
                                    style="background-image: url('{{ asset('images/wave.png') }}'); background-size: 200%; background-position: center;">
                                </div>

                                <!-- Konten kartu -->
                                <div class="relative z-10 p-4 flex flex-col justify-between h-full">
                                    
                                    <!-- Baris atas: Logo dan Chip -->
                                    <div class="flex justify-between items-start">
                                        <div class="flex items-center">
                                            <span class="inline-block w-6 h-6 rounded-full bg-red-600 mr-1" style="box-shadow: 14px 0 0 0 #fbbf24;"></span>
                                            <span class="ml-6 text-white font-semibold text-sm">Master Card</span>
                                        </div>
                                        <img src="{{ asset('images/chip.png') }}" alt="chip" class="h-6 w-10 object-contain" />
                                    </div>

                                    <!-- Nomor kartu -->
                                    <div class="mt-4">
                                        <p class="text-xs text-gray-300 mb-1">Card Number</p>
                                        <p class="tracking-widest text-base text-gray-100 font-mono break-words">
                                            {{ $nasabah->rekening_nasabah }}
                                        </p>
                                    </div>

                                    <!-- Nama & Valid -->
                                    <div class="flex justify-between items-end">
                                        <div>
                                            <p class="text-sm text-gray-100 font-medium">{{ $nasabah->nama_nasabah }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-xs text-gray-300 mb-1">Valid Thru</p>
                                            <p class="text-sm text-gray-100 font-semibold">05/28</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- Select Card Button -->
        <div class="text-center mt-8">
            <form action="{{ route('nasabah.select-card') }}" method="POST">
                @csrf
                <input type="hidden" name="card_type" id="selected_card_type" value="classic">
                <button type="submit" class="bg-[#29BBCF] hover:bg-cyan-600 text-white font-semibold py-3 px-8 rounded-full transition duration-200">
                    Select This Card
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.swiper', {
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 'auto',
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                on: {
                    slideChange: function() {
                        const cardTypes = ['classic', 'gold', 'red'];
                        const activeIndex = this.activeIndex;
                        document.getElementById('selected_card_type').value = cardTypes[activeIndex];
                    }
                }
            });
        });
    </script>
</body>
</html>
