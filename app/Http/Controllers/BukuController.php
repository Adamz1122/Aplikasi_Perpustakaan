<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    // ===========================
    // ANGGOTA
    // ===========================

    // Menampilkan semua buku untuk anggota
    public function anggota()
    {
        $buku = Buku::all();
        return view('anggota.buku', compact('buku'));
    }

    // Halaman detail buku
    public function detail($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }

        return view('anggota.detail-buku', compact('buku'));
    }

    // Halaman pinjam buku
    public function pinjam($id)
{
    $buku = Buku::findOrFail($id);
    return view('anggota.pinjam', compact('buku'));
}

    // Menyimpan peminjaman buku
    public function store(Request $request, $id)
    {
        return redirect()->route('anggota.buku')
            ->with('success', 'Buku berhasil dipinjam');
    }

    // ===========================
    // PETUGAS CRUD
    // ===========================

    // Daftar buku petugas
    public function index()
    {
        $buku = Buku::all();
        return view('petugas.buku.index', compact('buku'));
    }

    // Form tambah buku
    public function create()
    {
        return view('petugas.buku.create');
    }

    // Simpan buku baru
    public function storeBuku(Request $request)
    {
        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('buku', 'public');
        }

        Buku::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'kategori' => $request->kategori,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('petugas.buku')
            ->with('success', 'Buku berhasil ditambah');
    }

    // Form edit buku
    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('petugas.buku.edit', compact('buku'));
    }

    // Update buku
    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('buku', 'public');
            $buku->gambar = $gambar;
        }

        $buku->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'kategori' => $request->kategori,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('petugas.buku')
            ->with('success', 'Buku berhasil diupdate');
    }

    // Hapus buku
    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect()->route('petugas.buku');
    }
}
