<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'tittle' => 'register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'email' => ['required', 'unique:users'],
            'password' => 'required|min:5|max:255'
        ]);

        // ENKRIPSI
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);


        // PESAN 
        $request->session()->flash('success', 'Registrasi berhasil! Silahkan Login!');

        // REDIRECT & PESAN
        return redirect('/login');
    }
}
