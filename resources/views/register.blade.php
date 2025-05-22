@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen justify-center bg-[#f4f3e6]">
        <div class="flex w-screen">
            {{-- Left Side: Form --}}
            <div style="background: #FF5F1F;
background: linear-gradient(170deg,rgba(255, 95, 31, 1) 30%, rgba(245, 234, 202, 1) 81%);"
                class="w-[47%] p-10 pt-20 pl-15 rounded-tr-[150px] rounded-br-[150px]">
                <h2 class="text-putih text-6xl font-popB mb-15 fw-bold text-shadow-lg">Register</h2>

                <form method="POST" action="" class="space-y-4">
                    @csrf
                    <div class="container w-full flex flex-col gap-8">
                        <div class="form-1 w-full flex gap-10">
                            <div class="flex flex-col gap-2">
                                <label class="text-putih text-md font-semibold">First Name</label>
                                <input type="text" name="first_name"
                                    class="w-full px-4 py-2 rounded-full bg-maroon text-putih shadow-sm focus:outline-none border border-[#f4f3e6]"
                                    placeholder="Type here...">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-putih text-md font-semibold">Last Name</label>
                                <input type="text" name="last_name"
                                    class="w-full px-4 py-2 rounded-full bg-maroon text-putih shadow-md focus:outline-none border border-[#f4f3e6]"
                                    placeholder="Type here...">
                            </div>
                        </div>
                        <div class="form-2 w-full flex gap-10">
                            <div class="flex flex-col gap-2">
                                <label class="text-putih text-md font-semibold">Email</label>
                                <input type="email" name="email"
                                    class="w-full px-4 py-2 rounded-full bg-maroon text-putih shadow-md focus:outline-none border border-[#f4f3e6]"
                                    placeholder="username@example.com">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-putih text-md font-semibold">Phone Number</label>
                                <input type="test" name="phone_number"
                                    class="w-full px-4 py-2 rounded-full bg-maroon text-putih shadow-md focus:outline-none border border-[#f4f3e6]"
                                    placeholder="Type here...">
                            </div>
                        </div>
                        <div class="form-3 w-full flex gap-10">
                            <div class="flex flex-col gap-2">
                                <label class="text-putih text-md font-semibold">City</label>
                                <input type="text" name="city"
                                    class="w-full px-4 py-2 rounded-full bg-maroon text-putih shadow-md focus:outline-none border border-[#f4f3e6]"
                                    placeholder="Type here...">
                            </div>
                            <div class="flex flex-col gap-2 w-[214px]">
                                <label class="text-putih text-md font-semibold">Birth of Date</label>
                                <input type="date" name="date"
                                    class="ipt-date w-[100%] px-4 py-2 rounded-full bg-maroon text-putih shadow-md focus:outline-none border border-[#f4f3e6]"
                                    placeholder="Type here...">
                            </div>
                        </div>
                        <div class="form-4 w-full flex gap-10">
                            <div class="flex flex-col gap-2">
                                <label class="text-putih text-md font-semibold">Password</label>
                                <input type="password" name="password"
                                    class="w-full px-4 py-2 rounded-full bg-maroon text-putih shadow-md focus:outline-none border border-[#f4f3e6]"
                                    placeholder="Type here...">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-putih text-md font-semibold">Confirm Password</label>
                                <input type="password" name="confirm_password"
                                    class="w-full px-4 py-2 rounded-full bg-maroon text-putih shadow-md focus:outline-none border border-[#f4f3e6]"
                                    placeholder="Type here...">
                            </div>
                        </div>

                    </div>

                    <div class="mt-6">
                        <label class="text-putih text-md font-semibold">Gender</label>
                        <div class="flex space-x-4 mt-1 text-maroon text-sm ">
                            <div class="gender-1 flex justify-center items-center gap-1 text-[15px]">
                                <input type="radio" name="gender" value="male">
                                <label>Male</label>
                            </div>
                            <div class="gender-2 flex justify-center items-center gap-1 text-[15px]">
                                <input type="radio" name="gender" value="female">
                                <label>Female</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-[85%] h-[50px] bg-putih text-maroon py-2 rounded-full font-bold shadow-md 
           hover:bg-maroon hover:text-putih transition-colors duration-300 mt-4">
                        Register
                    </button>

                    <p class="text-sm mt-4 text-[#570807]">
                        Already have account? <a href="{{route('login')}}" class="text-oranye underline font-semibold">Sign in</a>
                    </p>
                </form>
            </div>

            {{-- Right Side: Logo --}}
            <div class="w-[55%] bg-[#f4f3e6] flex items-center justify-center relative">
                <img src="{{ asset('assets/RegisBackground.png') }}" alt="StayBuddy Logo" class="w-full">
            </div>
        </div>
    </div>
@endsection
