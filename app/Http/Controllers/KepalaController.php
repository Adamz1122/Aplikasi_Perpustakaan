<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;

class KepalaController extends Controller
{

    // DASHBOARD
    public function dashboard()
    {
        $total_petugas = User::where('role', 'petugas')->count();
        $total_peminjaman = Peminjaman::count();
        $total_buku = Buku::count();

        $peminjaman = Peminjaman::with('user', 'buku')->latest()->take(5)->get();

        return view('kepala.dashboard', compact(
            'total_petugas',
            'total_peminjaman',
            'total_buku',
            'peminjaman'
        ));
    }


    // ==========================
    // DATA PETUGAS
    // ==========================

    public function petugas()
    {
        $petugas = User::where('role', 'petugas')->get();
        return view('kepala.petugas.index', compact('petugas'));
    }


    // ==========================
    // CREATE
    // ==========================

    public function createPetugas()
    {
        return view('kepala.petugas.create');
    }

    public function storePetugas(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas'
        ]);

        return redirect()->route('kepala.petugas');
    }


    // ==========================
    // EDIT
    // ==========================

    public function editPetugas($id)
    {
        $petugas = User::find($id);
        return view('kepala.petugas.edit', compact('petugas'));
    }

    public function updatePetugas(Request $request, $id)
    {

        $petugas = User::find($id);

        $petugas->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('kepala.petugas');

    }


    // ==========================
    // DELETE
    // ==========================

    public function deletePetugas($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }


    // DATA PEMINJAMAN
    public function peminjaman()
    {
        $peminjaman = Peminjaman::latest()->get();

        return view('kepala.peminjaman', compact('peminjaman'));
    }


    // LAPORAN
    public function laporan(Request $request)
    {

        $query = Peminjaman::with('user', 'buku');

        if ($request->dari && $request->sampai) {
            $query->whereBetween('tanggal_pinjam', [
                $request->dari,
                $request->sampai
            ]);
        }

        $peminjaman = $query->latest()->get();

        return view('kepala.laporan', compact('peminjaman'));

    }

    public function laporanPdf(Request $request)
    {

        $query = Peminjaman::with('user', 'buku');

        if ($request->dari && $request->sampai) {
            $query->whereBetween('tanggal_pinjam', [
                $request->dari,
                $request->sampai
            ]);
        }

        $peminjaman = $query->get();

        $pdf = Pdf::loadView('kepala.laporan-pdf', compact('peminjaman'));

        return $pdf->download('laporan-peminjaman.pdf');

    }
}
