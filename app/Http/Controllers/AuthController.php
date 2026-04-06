<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

// ======================
// REGISTER
// ======================
public function register(Request $request)
{
$request->validate([
'name'=>'required',
'email'=>'required|email|unique:users',
'password'=>'required|min:4'
]);

User::create([
'name'=>$request->name,
'email'=>$request->email,
'password'=>Hash::make($request->password),
'role'=>'anggota' // default anggota
]);

return redirect()->route('login')
->with('success','Akun berhasil dibuat');
}


// ======================
// LOGIN
// ======================
public function login(Request $request)
{
$credentials = [
'name'=>$request->name,
'password'=>$request->password
];

if(Auth::attempt($credentials)){

$user = Auth::user();

if($user->role == 'anggota'){
return redirect('/anggota/dashboard');
}

if($user->role == 'petugas'){
return redirect('/petugas/dashboard');
}

if($user->role == 'kepala'){
return redirect('/kepala/dashboard');
}

}

return back()->with('error','Login gagal');
}


// ======================
// LOGOUT
// ======================
public function logout()
{
Auth::logout();
return redirect('/login');
}

}
