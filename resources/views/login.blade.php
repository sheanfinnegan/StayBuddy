@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen justify-center bg-[#f4f3e6]">
        <div class="flex w-screen">
            {{-- Left Side: Form --}}
            <div class="w-[55%] bg-[#f4f3e6] flex items-center justify-center relative">
                <img src="{{ asset('assets/RegisBackground.png') }}" alt="StayBuddy Logo" class="w-full">
            </div>

            {{-- Right Side: Logo --}}
            <div style="background: #FF5F1F;
background: linear-gradient(170deg,rgba(255, 95, 31, 1) 30%, rgba(245, 234, 202, 1) 81%);"
                class="w-[47%] p-10 pt-20 pl-15 pr-10 rounded-tl-[150px] rounded-bl-[150px]">
                <h2 class="text-putih text-[80px] font-popB mb-15 fw-bold text-shadow-lg flex justify-center mt-10">Login
                </h2>

                <form method="" action="" class="space-y-4 flex justify-center items-center flex-col">
                    @csrf
                    <div class="container w-full flex flex-col gap-8 items-center justify-center pl-10">
                        <div class="form-2 w-full pr-10">
                            <div class="flex flex-col gap-2">
                                <label class="text-putih text-sm font-semibold text-[20px]">Email</label>
                                <input type="email" name="email"
                                    class="w-full h-[50px] px-4 py-2 rounded-full bg-maroon text-putih shadow-md focus:outline-none border border-[#f4f3e6]"
                                    placeholder="Type here...">
                            </div>
                        </div>

                        <div class="form-4 w-full pr-10">
                            <div class="flex flex-col gap-2">
                                <label class="text-putih text-sm font-semibold text-[20px]">Password</label>
                                <input type="password" name="password"
                                    class="w-full h-[50px] px-4 py-2 rounded-full bg-maroon text-putih shadow-md focus:outline-none border border-[#f4f3e6]"
                                    placeholder="Type here...">
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-[70%] h-[50px] bg-putih text-maroon py-2 rounded-full font-bold shadow-md 
           hover:bg-[#5E2D2D] hover:text-putih transition-colors duration-300 mt-15">
                        Log In
                    </button>

                    <p class="text-sm mt-6 text-maroon">
                        Don't have account? <a href="{{ route('register') }}"
                            class="underline font-semibold text-oranye">Register Now</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
