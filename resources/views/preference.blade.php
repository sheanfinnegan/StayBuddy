@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="outerContainer w-full flex">
        <div class="sidebar w-[28%] bg-cream px-5 py-8  min-h-screen flex flex-col justify-between">
            <div class="h-[630px] flex flex-col justify-between">
                <div>
                    <div class="profile flex flex-row items-center gap-5">
                        <div class="img">
                            <img class="rounded-full w-[80px] h-[80px]" src="{{ asset('assets/profile.png') }}" alt="">
                        </div>
                        <div class="username flex flex-col gap-2">
                            <p class="text-[17px] text-abu">Welcome back!</p>
                            <h2 class="text-2xl font-popB text-maroon">Eric Finnegan</h2>
                        </div>
                    </div>
                    <div class="upperNav ms-1 mt-15 font-popReg ">
                        <div class="up flex flex-col gap-5">
                            <div class="profileDetail flex items-center justify-between bg-putih ps-5 py-0.5 rounded-xl">
                                <div class="flex gap-4 items-center">
                                    <ion-icon class="text-abu text-[27px] font-bold" name="person-outline"></ion-icon>
                                    <p class="text-[18px] font-semibold">Profile</p>
                                </div>

                                <img class="w-[60px]" src="{{ asset('assets/iconNext.png') }}" alt="">

                            </div>
                            <div class="preferences flex items-center justify-between ps-5 py-0.5 rounded-xl">
                                <div class="flex gap-3 items-center">
                                    <ion-icon class="text-abu text-[35px] font-bold" name="cog-outline"></ion-icon>
                                    <p class="text-[18px] ">Your Preferences</p>
                                </div>

                                <img class="w-[60px]" src="{{ asset('assets/iconNext.png') }}" alt="">

                            </div>
                            <div class="history flex items-center justify-between ps-5 py-0.5 rounded-xl">
                                <div class="flex gap-4 items-center">
                                    <ion-icon class="text-abu text-[30px] font-bold" name="arrow-undo-outline"></ion-icon>
                                    <p class="text-[18px]">History</p>
                                </div>

                                <img class="w-[60px]" src="{{ asset('assets/iconNext.png') }}" alt="">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom ms-1 font-popReg">
                    <a href="{{ route('searchPage') }}" class="map flex gap-4 items-center ps-5 py-0.5">

                        <ion-icon class="text-[30px] text-maroon" name="map-outline"></ion-icon>
                        <p class="text-[18px]">Maps</p>



                    </a>
                </div>

            </div>




            <div class="bottomNav ms-1">
                <div class="h-[1px] w-full bg-maroon mb-8"></div>
                <div class="signOut flex gap-4 items-center ps-5 py-0.5 font-popReg">
                    <ion-icon class="text-[30px] text-maroon" name="log-out-outline"></ion-icon>
                    <p class="text-[18px]">Sign Out</p>

                </div>
            </div>

        </div>
        <div class="w-[72%]">
            <div class="title pt-10 pb-6.5 ms-12">
                <h1 class="font-popReg font-semibold text-3xl text-[#333333]">Your Preferences</h1>
            </div>
            <div class="line h-[1px] bg-maroon"></div>
            <div class="content ms-12 mt-10 flex gap-[60px]">
                <div class="left flex flex-col gap-[60px]">
                    <div class="smoking flex items-center gap-6">
                        <div class="img">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(202,143,143,0.4)] border border-maroon">


                                <ion-icon class="text-[50px] text-maroon" name="logo-no-smoking"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">
                            <h1 class="font-popReg font-bold pb-1">Smoking</h1>
                            <h1 class="font-popReg text-[#797979]">Yes</h1>
                        </div>
                    </div>
                    <div class="alcoholic flex items-center gap-6">
                        <div class="img">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(248,169,31,0.4)] border border-kuning">
                                <ion-icon class="text-[45px] text-kuning" name="beer-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">

                            <h1 class="font-popReg font-bold pb-1">Alcoholic</h1>
                            <h1 class="font-popReg text-[#797979]">Yes</h1>

                        </div>
                    </div>
                    <div class="tidiness flex items-center gap-6">
                        <div class="img">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(214,35,0,0.4)] border border-merah">
                                <ion-icon class="text-[40px] text-merah" name="trash-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">
                            <h1 class="font-popReg font-bold pb-3">Tidiness</h1>
                            <div class="flex gap-0.5">
                                <!-- Bar 1 (active) -->
                                <div class="w-8 h-3 bg-[#88A825] rounded-full"></div>

                                <!-- Bar 2 (active) -->
                                <div class="w-8 h-3 bg-[#88A825] rounded-full"></div>

                                <!-- Bar 3 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>

                                <!-- Bar 4 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>

                                <!-- Bar 5 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>
                            </div>

                        </div>
                    </div>
                    <div class="age flex items-center gap-6">
                        <div class="img">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(255,95,31,0.4)] border border-oranye">
                                <ion-icon class="text-[35px] text-oranye" name="people-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">

                            <h1 class="font-popReg font-bold pb-1">Prefered Age</h1>
                            <h1 class="font-popReg text-[#797979]">Same age group</h1>

                        </div>
                    </div>

                </div>

                <div class="mid flex flex-col gap-[60px]">
                    <div class="dailyRoutine flex items-center gap-6">
                        <div class="img ">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(202,143,143,0.4)] border border-maroon">

                                <ion-icon class="text-[35px] text-maroon" name="sunny-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">
                            <h1 class="font-popReg font-bold pb-1">Daily Routine</h1>
                            <h1 class="font-popReg text-[#797979]">Morning person</h1>
                        </div>
                    </div>
                    <div class="room flex items-center gap-6">
                        <div class="img">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(248,169,31,0.4)] border border-kuning">
                                <ion-icon class="text-[40px] text-kuning" name="bed-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">
                            <h1 class="font-popReg font-bold pb-1">Room Type</h1>
                            <h1 class="font-popReg text-[#797979]">Shared</h1>
                        </div>
                    </div>
                    <div class="socializing flex items-center gap-6">
                        <div class="img">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(214,35,0,0.4)] border border-merah">
                                <ion-icon class="text-[35px] text-merah" name="accessibility-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">
                            <h1 class="font-popReg font-bold pb-3">Socializing</h1>
                            <div class="flex gap-0.5">
                                <!-- Bar 1 (active) -->
                                <div class="w-8 h-3 bg-[#88A825] rounded-full"></div>

                                <!-- Bar 2 (active) -->
                                <div class="w-8 h-3 bg-[#88A825] rounded-full"></div>

                                <!-- Bar 3 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>

                                <!-- Bar 4 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>

                                <!-- Bar 5 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cooking flex items-center gap-6">
                        <div class="img">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(255,95,31,0.4)] border border-oranye">
                                <ion-icon class="text-[35px] text-oranye" name="restaurant-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">
                            <h1 class="font-popReg font-bold pb-3">Cooking Frequency</h1>
                            <div class="flex gap-0.5">
                                <!-- Bar 1 (active) -->
                                <div class="w-8 h-3 bg-[#88A825] rounded-full"></div>

                                <!-- Bar 2 (active) -->
                                <div class="w-8 h-3 bg-[#88A825] rounded-full"></div>

                                <!-- Bar 3 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>

                                <!-- Bar 4 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>

                                <!-- Bar 5 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="right flex flex-col gap-[60px]">
                    <div class="petFriendly flex items-center gap-6">
                        <div class="img">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(202,143,143,0.4)] border border-maroon">
                                <ion-icon class="text-[35px] text-maroon" name="paw-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">
                            <h1 class="font-popReg font-bold pb-1">Pet friendly</h1>
                            <h1 class="font-popReg text-[#797979]">Yes</h1>
                        </div>
                    </div>
                    <div class="workStyle flex items-center gap-6">
                        <div class="img">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(248,169,31,0.4)] border border-kuning">
                                <ion-icon class="text-[40px] text-kuning" name="briefcase-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">
                            <h1 class="font-popReg font-bold pb-1">Work/Study Style</h1>
                            <h1 class="font-popReg text-[#797979]">Silent</h1>
                        </div>
                    </div>
                    <div class="noise flex items-center gap-6">
                        <div class="img">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(214,35,0,0.4)] border border-merah">
                                <ion-icon class="text-[40px] text-merah" name="ear-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">
                            <h1 class="font-popReg font-bold pb-3">Noise Tolerance</h1>
                            <div class="flex gap-0.5">
                                <!-- Bar 1 (active) -->
                                <div class="w-8 h-3 bg-[#88A825] rounded-full"></div>

                                <!-- Bar 2 (active) -->
                                <div class="w-8 h-3 bg-[#88A825] rounded-full"></div>

                                <!-- Bar 3 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>

                                <!-- Bar 4 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>

                                <!-- Bar 5 (inactive) -->
                                <div class="w-8 h-3 bg-[rgba(98,98,98,0.28)] rounded-full"></div>
                            </div>
                        </div>
                    </div>
                    <div class="gender flex items-center gap-6">
                        <div class="img">
                            <div
                                class="w-18 h-18 flex items-center justify-center rounded-full bg-[rgba(255,95,31,0.4)] border border-oranye">
                                <ion-icon class="text-[40px] text-oranye" name="male-female-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="info text-[19px]">
                            <h1 class="font-popReg font-bold pb-1">Prefered Gender</h1>
                            <h1 class="font-popReg text-[#797979]">Male only</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="editCon w-full flex justify-center mt-14">
                <div class="edit px-5 py-2 bg-[#5E2D2D] font-popReg text-white rounded-sm w-[120px] text-center">
                    <button>Edit</button>
                </div>
            </div>

        </div>

    </div>



@endsection
