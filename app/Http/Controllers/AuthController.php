<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // TAMPILAN
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    // REGISTER
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect('/login')->with('success', 'Register berhasil!');
    }

    // LOGIN
    public function login(Request $request) {
        if (Auth::attempt($request->only('email','password'))) {

            $user = Auth::user();

            if ($user->role == 'anggota') {
                return redirect('/anggota');
            } elseif ($user->role == 'petugas') {
                return redirect('/petugas');
            } else {
                return redirect('/kepala');
            }
        }

        return back()->with('error','Login gagal!');
    }

    // LOGOUT
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
