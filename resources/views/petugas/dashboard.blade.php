@extends('layouts.petugas')

@section('title', 'Dashboard Petugas')

@section('content')

<div class="p-6">

    <h3 class="text-2xl font-bold mb-6">
        Selamat Datang, {{ auth()->user()->name }}
    </h3>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-red-500 text-white p-6 rounded-2xl shadow-lg">
            <p class="text-lg">Jumlah Buku</p>
            <h2 class="text-3xl font-bold">{{ $jumlahBuku ?? 0 }}</h2>
        </div>

        <div class="bg-green-500 text-white p-6 rounded-2xl shadow-lg">
            <p class="text-lg">Buku Dipinjam</p>
            <h2 class="text-3xl font-bold">{{ $jumlahDipinjam ?? 0 }}</h2>
        </div>

        <div class="bg-orange-500 text-white p-6 rounded-2xl shadow-lg">
            <p class="text-lg">Jumlah Anggota</p>
            <h2 class="text-3xl font-bold">{{ $jumlahAnggota ?? 0 }}</h2>
        </div>

    </div>

    <!-- Table -->
    <h3 class="text-xl font-semibold mb-4">Data Peminjaman</h3>

    <div class="overflow-x-auto bg-white rounded-2xl shadow">
        <table class="min-w-full text-sm text-left">

            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Anggota</th>
                    <th class="px-6 py-3">Judul Buku</th>
                    <th class="px-6 py-3">Tgl Kembali</th>
                    <th class="px-6 py-3">Status</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach ($peminjaman as $p)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $p->user->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $p->buku->judul ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $p->tanggal_kembali }}</td>
                    <td class="px-6 py-4">
                        <span class="
                            px-3 py-1 rounded-full text-white text-xs
                            @if($p->status == 'dipinjam') bg-blue-500
                            @elseif($p->status == 'dikembalikan') bg-green-500
                            @else bg-gray-500
                            @endif
                        ">
                            {{ $p->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

@endsection
