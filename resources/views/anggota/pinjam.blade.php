@extends('layouts.anggota')

@section('title', 'Pinjam Buku')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-md p-6">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        📚 Form Peminjaman Buku
    </h2>

    <form method="POST" action="{{ route('anggota.pinjam.store') }}" class="space-y-5">
        @csrf

        <input type="hidden" name="id_buku" value="{{ $buku->id }}">
        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
        <input type="hidden" name="tanggal_pinjam" value="{{ date('Y-m-d') }}">

        <!-- Nama -->
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Nama Peminjam</label>
            <input type="text"
                value="{{ auth()->user()->name }}"
                readonly
                class="w-full bg-gray-100 border border-gray-200 px-4 py-2 rounded-xl text-sm">
        </div>

        <!-- Judul Buku -->
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Judul Buku</label>
            <input type="text"
                value="{{ $buku->judul }}"
                readonly
                class="w-full bg-gray-100 border border-gray-200 px-4 py-2 rounded-xl text-sm">
        </div>

        <!-- Tanggal Pinjam -->
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Pinjam</label>
            <input type="text"
                value="{{ date('Y-m-d') }}"
                readonly
                class="w-full bg-gray-100 border border-gray-200 px-4 py-2 rounded-xl text-sm">
        </div>

        <!-- Tanggal Kembali -->
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Tanggal Kembali</label>
            <input type="date"
                name="tanggal_kembali"
                required
                class="w-full border border-gray-300 px-4 py-2 rounded-xl text-sm focus:ring-2 focus:ring-[#7b4b2a] focus:outline-none">
        </div>

        <!-- Jumlah -->
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">Jumlah</label>
            <input type="number"
                name="jumlah"
                value="1"
                min="1"
                required
                class="w-full border border-gray-300 px-4 py-2 rounded-xl text-sm focus:ring-2 focus:ring-[#7b4b2a] focus:outline-none">
        </div>

        <!-- BUTTON -->
        <button type="submit"
            class="w-full bg-[#7b4b2a] hover:bg-[#a86b45] text-white py-3 rounded-xl font-semibold shadow transition">
            📚 Pinjam Buku
        </button>

    </form>

</div>

@endsection
