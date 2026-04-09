<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;
use App\Models\Petugas;
use App\Models\Kepala;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // ambil data sesuai role
        if ($user->role == 'anggota') {
            $data = $user->anggota;
        } elseif ($user->role == 'petugas') {
            $data = $user->petugas;
        } else {
            $data = $user->kepala;
        }

        // layout
        $layout = match ($user->role) {
            'anggota' => 'layouts.anggota',
            'petugas' => 'layouts.petugas',
            'kepala' => 'layouts.kepala',
        };

        return view('profile.index', compact('user', 'data', 'layout'));
    }

    public function edit()
    {
        $user = Auth::user();

        // ambil data (boleh null)
        if ($user->role == 'anggota') {
            $data = $user->anggota;
        } elseif ($user->role == 'petugas') {
            $data = $user->petugas;
        } else {
            $data = $user->kepala;
        }

        // layout
        $layout = match ($user->role) {
            'anggota' => 'layouts.anggota',
            'petugas' => 'layouts.petugas',
            'kepala' => 'layouts.kepala',
        };

        return view('profile.edit', compact('user', 'data', 'layout'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // update user
        $user->name = $request->name;
        $user->save();

        // ======================
        // AMBIL ATAU BUAT DATA
        // ======================
        if ($user->role == 'anggota') {
            $data = $user->anggota ?? new Anggota();

            $data->id_user = $user->id; // ⚠️ penting sesuai DB kamu
            $data->nis = $request->nis;
            $data->jurusan = $request->jurusan;
            $data->kelas = $request->kelas;

        } elseif ($user->role == 'petugas') {
            $data = $user->petugas ?? new Petugas();

            $data->id_user = $user->id;

        } else {
            $data = $user->kepala ?? new Kepala();

            $data->id_user = $user->id;
        }

        // ======================
        // DATA UMUM
        // ======================
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;

        // upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto')->store('foto_profile', 'public');
            $data->foto = $file;
        }

        $data->save();

        return redirect()->route('profile')->with('success', 'Profile berhasil diupdate');
    }
}
