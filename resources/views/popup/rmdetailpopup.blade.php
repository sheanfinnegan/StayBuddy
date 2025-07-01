<?php 
use Carbon\Carbon;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <!-- Css and Js files -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .flip-card{
            perspective: 1000px;
             width: 16rem;
            height: 30rem;
            cursor: pointer;
        }
        .flip-card-inner {
            /* position: relative; */
             transform-origin: center center;
            transform-style: preserve-3d;
        }
        .flip-card.flipped .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            top: 0;
            left: 0;
            position: absolute;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            width: 100%;
            height: 100%;
        }

        .flip-card-back{
            transform: rotateY(180deg);
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-gray-900 flex items-center justify-center">
        <div class="bg-[#f4f3e6] p-6 rounded-xl w-[90%] max-w-screen-xl relative h-[70%]">
            
            <button class="top-8 right-10 text-xl absolute ">❌</button>
            <!-- Header -->
            <div class=" w-[80%] mx-[10%] relative">
                <div class="flex justify-center items-center bg-[#570807] text-white px-6 py-2">
                    <h2 class="text-xl font-bold text-center">BUDDIES 1</h2>
                </div>
                <div class="text-xl absolute top-2 right-10 font-bold text-[#FF5F1F]">3/4</div>

            </div>
            
            <!-- Card List -->
            <div class="flex overflow-x-auto space-x-4 py-4 justify-center">
                <!-- Card 1-->
                @foreach($users as $user)
                    <div class="flip-card w-64 h-[400px]">
                        <div class="flip-card-inner w-full h-full transition-transform duration-500 transform">
                            <!-- Front Card -->
                            <div class="bg-[#570807] flip-card-front text-white rounded-xl shadow-lg p-4 min-w-[200px] w-64 relative border-4 border-[#f8A91f] min-h-[480px]">
                                <div class="absolute top-0 right-0 -mt-4 -mr-4 bg-[#f8A91f] rounded px-1 text-black font-bold text-sm"></div>
                                <img src="{{ asset('image/eric.jpg') }}" class="rounded-lg h-70 mb-2 flex justify-center mx-auto my-auto" alt="Foto" />
                                <div class="text-left font-bold mt-8 ml-2 flex mx-auto text-xl">{{ $user->Username }}</div>
                                <div class="text-sm text-left flex ml-2 mx-auto">
                                    {{ Carbon::parse($user->profile->DOB)->age }} Tahun<br />
                                    Phone: {{$user->PhoneNumber}}<br />
                                    Email: {{$user->Email}}<br />
                                </div>
                                <div class="flex items-center justify-center h-16 w-16 mx-auto mt-2 absolute top-75 left-35 right-0">
                                    <svg class="transform -rotate-90 w-full h-full" viewBox="0 0 100 100">
                                        <circle
                                        cx="50"
                                        cy="50"
                                        r="45"
                                        {{-- stroke="#e5e7eb" --}}
                                        stroke-width="10"
                                        fill="transparent"
                                        />
                                        <circle
                                        cx="50"
                                        cy="50"
                                        r="45"
                                        stroke="#f4f3e6"
                                        stroke-width="10"
                                        fill="transparent"
                                        stroke-dasharray="282.6"
                                        stroke-dashoffset="56.52"
                                        stroke-linecap="round"
                                        />
                                    </svg>
                                    <div class="absolute text-center flex flex-col items-center">
                                        <span class="text-sm font-bold">80%</span>
                                        <span class="text-xs font-bold">match</span>
                                    </div>
                                </div>

                                <div class="mt-2 text-center">
                                    <button class="text-white underline">View Detail</button>
                                </div>
                            </div>
                            <!-- Back Card -->
                            <div class="bg-[#570807] flip-card-back text-white rounded-xl shadow-lg p-4 min-w-[200px] w-64 relative border-4 border-[#f8A91f] backface-visibility-hidden min-h-[480px]">
                                <div class="absolute top-0 right-0 -mt-4 -mr-4 bg-[#f8A91f] rounded px-1 text-black font-bold text-sm"></div>
                                <div class="overflow-y-auto [scrollbar-width:none]  [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden h-[450px] pr-2">
                                    <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum inventore reiciendis ipsam sequi fugiat omnis aliquid at autem id iste. Animi architecto repellendus assumenda, quas modi quia! Dicta, fugiat distinctio.</h1>
                                    <div class="mt-3 text-center border-t-2 border-gray-300 pt-4">
                                        <h1>Pertanyaan 1</h1>
                                        <div class="w-full bg-gray-300 rounded-full h-6 overflow-hidden mt-4">
                                            <div class="bg-[#f8a91f] h-6 text-white text-sm font-bold text-center" style="width: 70%">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center border-t-2 border-gray-300 pt-4">
                                        <h1>Pertanyaan 2</h1>
                                        <div class="w-full bg-gray-300 rounded-full h-6 overflow-hidden mt-4">
                                            <div class="bg-[#f8a91f] h-6 text-white text-sm font-bold text-center" style="width: 70%">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center border-t-2 border-gray-300 pt-4">
                                        <h1>Pertanyaan 3</h1>
                                        <div class="w-full bg-gray-300 rounded-full h-6 overflow-hidden mt-4">
                                            <div class="bg-[#f8a91f] h-6 text-white text-sm font-bold text-center" style="width: 70%">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center border-t-2 border-gray-300 pt-4">
                                        <h1>Pertanyaan 4</h1>
                                        <div class="w-full bg-gray-300 rounded-full h-6 overflow-hidden mt-4">
                                            <div class="bg-[#f8a91f] h-6 text-white text-sm font-bold text-center" style="width: 70%">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center border-t-2 border-gray-300 pt-4">
                                        <h1>Pertanyaan 5</h1>
                                        <div class="w-full bg-gray-300 rounded-full h-6 overflow-hidden mt-4">
                                            <div class="bg-[#f8a91f] h-6 text-white text-sm font-bold text-center" style="width: 70%">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center border-t-2 border-gray-300 pt-4">
                                        <h1>Pertanyaan 6</h1>
                                        <div class="w-full bg-gray-300 rounded-full h-6 overflow-hidden mt-4">
                                            <div class="bg-[#f8a91f] h-6 text-white text-sm font-bold text-center" style="width: 70%">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center border-t-2 border-gray-300 pt-4">
                                        <h1>Pertanyaan 7</h1>
                                        <div class="w-full bg-gray-300 rounded-full h-6 overflow-hidden mt-4">
                                            <div class="bg-[#f8a91f] h-6 text-white text-sm font-bold text-center" style="width: 70%">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center border-t-2 border-gray-300 pt-4">
                                        <h1>Pertanyaan 8</h1>
                                        <div class="w-full bg-gray-300 rounded-full h-6 overflow-hidden mt-4">
                                            <div class="bg-[#f8a91f] h-6 text-white text-sm font-bold text-center" style="width: 70%">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center border-t-2 border-gray-300 pt-4">
                                        <h1>Pertanyaan 9</h1>
                                        <div class="w-full bg-gray-300 rounded-full h-6 overflow-hidden mt-4">
                                            <div class="bg-[#f8a91f] h-6 text-white text-sm font-bold text-center" style="width: 70%">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center border-t-2 border-gray-300 pt-4">
                                        <h1>Pertanyaan 10</h1>
                                        <div class="w-full bg-gray-300 rounded-full h-6 overflow-hidden mt-4">
                                            <div class="bg-[#f8a91f] h-6 text-white text-sm font-bold text-center" style="width: 70%">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <!-- Join Buddies Box -->
                <div class="bg-[#601010] text-white rounded-xl shadow-lg p-4 min-w-[200px] w-64 min-h-[480px] flex flex-col border-4 border-yellow-400">
                    <div class="bg-white rounded-lg mb-2 text-5xl mx-auto min-w-[200px] h-70 flex items-center justify-center">👥</div>
                    <button class="bg-white text-[#601010] font-bold py-2 rounded-full mt-15">Join Buddies</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".flip-card").forEach(card => {
                card.addEventListener("click", () => {
                    card.classList.toggle("flipped");
                });
            });
        });
    </script>   

</body>
</html>