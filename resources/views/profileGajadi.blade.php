@extends('layouts.app')

@section('content')
    <script>
        function enableEdit() {
            const input = document.getElementById("userName");
            input.removeAttribute("readonly");
            input.focus();
        }
    </script>

    <div class="flex min-h-screen justify-center bg-[#f4f3e6]">
        <div class="flex w-screen">
            {{-- Left Side: Form --}}
            <div class="w-[55%] bg-[#f4f3e6] flex items-center justify-center relative">
                <img src="{{ asset('assets/ProfileBackground.png') }}"
                    class="absolute inset-0 w-full h-full object-cover z-0">

                <div class="w-[60%] h-[600px] bg-white shadow-md rounded-3xl flex justify-center items-center z-1">
                    <div class="w-full relative flex justify-center items-center">
                        <img src="{{ asset('assets/profile.png') }}" class="w-[90%] h-[550px]">

                        <div
                            class="absolute w-[90%] h-[550px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group z-1 opacity-0 hover:opacity-100">
                            <label class="w-full h-full relative cursor-pointer block">
                                <input type="file"
                                    class="w-full h-full bg-maroon/[50%] text-[0px] absolute top-0 left-0 opacity-0 hover:opacity-100 duration-100 cursor-pointer">
                                <img src="{{ asset('assets/OrangFix.png') }}"
                                    class="w-[60px] h-[60px] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-2 pointer-events-none duration-100">
                            </label>
                        </div>
                    </div>

                </div>

                <div class="absolute w-[45%] bottom-[-20px] z-2">
                    <img src="{{ asset('assets/LogoShadow.png') }}" class="w-full">
                </div>
            </div>

            {{-- Right Side: Logo --}}
            <div class="w-[47%] h-full flex items-center">
                <div class="w-full flex flex-col items-center justify-center gap-7 relative">
                    <div role="tablist" aria-label="tabs"
                        class="relative w-max mx-auto h-12 grid grid-cols-2 items-center rounded-full px-[3px] bg-oranye/[50%] hover:bg-oranye overflow-hidden shadow-2xl shadow-900/20 transition-colors">
                        <div class="absolute indicator h-10 my-auto justify-center left-0 rounded-full bg-putih"></div>
                        <button role="tab" aria-selected="true" aria-controls="panel-1" id="tab-1" tabindex="0"
                            class="relative block h-10 px-6 tab rounded-full">
                            <span class="text-maroon">Profile</span>
                        </button>
                        <button role="tab" aria-selected="false" aria-controls="panel-2" id="tab-2" tabindex="1"
                            class="relative block h-10 px-6 tab rounded-full">
                            <span class="text-maroon">User Preference</span>
                        </button>
                    </div>
                    <div role="tabpanel" id="panel-1"
                        style="background: #FF5F1F;
background: linear-gradient(182deg,rgba(255, 95, 31, 1) 43%, rgba(214, 35, 0, 1) 81%);"
                        class="tab-panel container w-[90%] h-fit pb-5 flex flex-col gap-8 pt-5 rounded-4xl">
                        <div class="form-1 w-full flex flex-wrap gap-10 justify-center">
                            <div class="form-1 w-full flex flex-row gap-10 justify-center">
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">Name</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="text" id="userName"
                                            class="flex-grow text-base bg-transparent focus:outline-none" value="John Doe"
                                            readonly />
                                        <button onclick="enableEdit('userName')" class="ml-2" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-black hover:text-gray-700" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6-6m2 2L9 17H5v-4l8-8z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">Email</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="email" id="email"
                                            class="flex-grow text-base bg-transparent focus:outline-none"
                                            value="JohnDoe@gmail.com" readonly />
                                        <button onclick="enableEdit('email')" class="ml-2" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-black hover:text-gray-700" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6-6m2 2L9 17H5v-4l8-8z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-1 w-full flex flex-row gap-10 justify-center">
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">Age</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="text" id="age"
                                            class="flex-grow text-base bg-transparent focus:outline-none" value="25"
                                            readonly />
                                        <button onclick="enableEdit('age')" class="ml-2" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-black hover:text-gray-700" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6-6m2 2L9 17H5v-4l8-8z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">Phone Number</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="text" id="PhoneNumber"
                                            class="flex-grow text-base bg-transparent focus:outline-none"
                                            value="+1 23456789" readonly />
                                        <button onclick="enableEdit('PhoneNumber')" class="ml-2" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-black hover:text-gray-700" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6-6m2 2L9 17H5v-4l8-8z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-1 w-full flex flex-row gap-10 justify-evenly">
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">History Transaction</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="text" id="historyTransaction"
                                            class="flex-grow text-base bg-transparent focus:outline-none"
                                            value="Homestay Sentul" readonly />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">Waiting List On</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="text" id="WaitingList"
                                            class="flex-grow text-base bg-transparent focus:outline-none" value="-"
                                            readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="background: #FF5F1F;
background: linear-gradient(182deg,rgba(255, 95, 31, 1) 43%, rgba(214, 35, 0, 1) 81%);"
                        role="tabpanel" id="panel-2"
                        class="invisible opacity-0 absolute top-[80px] tab-panel transition duration-300 container w-fit h-fit pb-5 flex flex-col gap-8 pt-5 rounded-4xl">
                        <div class="form-1 w-[600px] flex flex-wrap gap-10 justify-center">
                            <div class="form-1 w-fit flex flex-row gap-10 justify-center">
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">Name</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="text" id="userName"
                                            class="flex-grow text-base bg-transparent focus:outline-none" value="John Doe"
                                            readonly />
                                        <button onclick="enableEdit('userName')" class="ml-2" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-black hover:text-gray-700" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6-6m2 2L9 17H5v-4l8-8z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">Email</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="email" id="email"
                                            class="flex-grow text-base bg-transparent focus:outline-none"
                                            value="JohnDoe@gmail.com" readonly />
                                        <button onclick="enableEdit('email')" class="ml-2" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-black hover:text-gray-700" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6-6m2 2L9 17H5v-4l8-8z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-1 w-fit flex flex-row gap-10 justify-center">
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">Age</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="text" id="age"
                                            class="flex-grow text-base bg-transparent focus:outline-none" value="25"
                                            readonly />
                                        <button onclick="enableEdit('age')" class="ml-2" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-black hover:text-gray-700" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6-6m2 2L9 17H5v-4l8-8z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">Phone Number</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="text" id="PhoneNumber"
                                            class="flex-grow text-base bg-transparent focus:outline-none"
                                            value="+1 23456789" readonly />
                                        <button onclick="enableEdit('PhoneNumber')" class="ml-2" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-black hover:text-gray-700" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6-6m2 2L9 17H5v-4l8-8z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-1 w-full flex flex-row gap-10 justify-evenly ">
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">History Transaction</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="text" id="historyTransaction"
                                            class="flex-grow text-base bg-transparent focus:outline-none"
                                            value="Homestay Sentul" readonly />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-putih text-md font-semibold">Waiting List On</label>
                                    <div
                                        class="bg-white shadow-md rounded-full px-6 py-3 flex items-center w-full border border-maroon">
                                        <input type="text" id="WaitingList"
                                            class="flex-grow text-base bg-transparent focus:outline-none" value="-"
                                            readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex justify-end pr-15">
                        <button type="submit"
                            class="w-[25%] h-[50px] bg-oranye text-putih py-2 rounded-full font-bold shadow-md 
           hover:bg-maroon hover:text-putih transition-colors duration-300 mt-4">
                            Save
                        </button>
                    </div>

                </div>
            </div>

        </div>
    @endsection
