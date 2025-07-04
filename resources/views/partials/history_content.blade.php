<div class="title pt-10 pb-6.5 ms-12">
    <h1 class="font-popReg font-semibold text-3xl text-[#333333]">Your Preferences</h1>
</div>
<div class="line h-[1px] bg-maroon"></div>
<div class="content ms-12 mt-10 flex gap-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-10">
        {{-- nanti diganti for each --}}
        @for ($i = 0; $i < 4; $i++)
            <div class="flex border-2 border-maroon rounded-xl p-4 shadow-md bg-white">
                <img src="{{ asset('assets/kos.jpeg') }}" alt="Kos"
                    class="w-50 h-50  object-cover rounded-md mr-4 mt-1">
                <div class="flex flex-col w-full h-full gap-y-1">
                    <h2 class="text-xl font-semibold text-[#651B1B]">Kos Bu Hani</h2>
                    <p class="text-sm text-gray-600 flex items-center">
                        <span class="text-yellow-500 mr-1">4.9</span>
                        <i class="fas fa-star text-yellow-500 mr-1"></i>
                        (500)
                    </p>
                    <p class="text-sm text-gray-600">Jl. Raya Jungle Land Avenue No.68, Babakan Madang</p>

                    <div class="flex flex-col h-[50%] w-full mt-3 gap-y-3">
                        <div class="flex flex-row w-full justify-between">
                            <div class="flex flex-col">
                                <p class="text-sm text-gray-600">Start Rent</p>
                                <h3 class="text-l font-semibold ">28 May 2022</h3>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-sm text-gray-600">End Rent</p>
                                <h3 class="text-l font-semibold">28 May 2025</h3>
                            </div>
                        </div>
                        <div class="flex flex-row w-full justify-between">
                            <div class="flex flex-col">
                                <p class="text-sm text-gray-600">Payment Info</p>
                                <h3 class="text-l font-semibold ">Credit Card</h3>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-sm text-gray-600">Price</p>
                                <h3 class="text-l font-semibold">Rp. 2.500.000</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endfor
    </div>

</div>
