<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register'); // Pastikan view sesuai
    }

    public function register(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:20',
            'occupation' => 'required|in:Student,Worker,Businessman',
            'date' => 'required|date',
            'password' => 'required|string|min:6|confirmed',
            'gender' => 'required|in:male,female',
        ]);

        // Gabungkan nama depan dan belakang
        $fullName = $validated['first_name'] . ' ' . $validated['last_name'];

        // Simpan user
        User::create([
            'name' => $fullName,
            'email' => $validated['email'],
            'phone_num' => $validated['phone_number'],
            'occupation' => $validated['occupation'],
            'bod' => $validated['date'],
            'gender' => ucfirst($validated['gender']),
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/login')->with('success', 'Registration successful!');
    }
}
