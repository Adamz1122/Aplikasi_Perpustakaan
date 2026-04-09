@extends('layouts.anggota')

@section('title', 'Dashboard Anggota')

@section('content')

<!-- GREETING -->
<div class="mb-6">
    <h3 class="text-2xl font-bold text-gray-800">
        Selamat Datang, {{ auth()->user()->name }} 👋
    </h3>
    <p class="text-sm text-gray-500">
        Berikut ringkasan aktivitas perpustakaan kamu
    </p>
</div>

<!-- CARDS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

    <!-- CARD 1 -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-5 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-sm">Jumlah Buku</p>
        <h2 class="text-3xl font-bold mt-2">{{ $jumlahBuku ?? 0 }}</h2>
    </div>

    <!-- CARD 2 -->
    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-5 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-sm">Buku Dipinjam</p>
        <h2 class="text-3xl font-bold mt-2">{{ $dipinjam ?? 0 }}</h2>
    </div>

    <!-- CARD 3 -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-5 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-sm">Riwayat Peminjaman</p>
        <h2 class="text-3xl font-bold mt-2">{{ $riwayat ?? 0 }}</h2>
    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-2xl shadow-md p-6">

    <h3 class="text-lg font-semibold text-gray-800 mb-4">
        📊 Aktivitas Terbaru
    </h3>

    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left border-collapse">

            <thead>
                <tr class="text-gray-600 border-b">
                    <th class="py-3 px-2">No</th>
                    <th class="py-3 px-2">Judul Buku</th>
                    <th class="py-3 px-2">Tanggal Pinjam</th>
                    <th class="py-3 px-2">Tanggal Kembali</th>
                    <th class="py-3 px-2">Status</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($peminjaman ?? [] as $item)

                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="py-3 px-2">{{ $loop->iteration }}</td>

                    <td class="py-3 px-2 font-medium text-gray-700">
                        {{ $item->buku->judul ?? '-' }}
                    </td>

                    <td class="py-3 px-2 text-gray-600">
                        {{ $item->tanggal_pinjam }}
                    </td>

                    <td class="py-3 px-2 text-gray-600">
                        {{ $item->tanggal_kembali }}
                    </td>

                    <td class="py-3 px-2">
                        <span class="
                            px-3 py-1 text-xs rounded-full text-white
                            @if($item->status == 'dipinjam') bg-blue-500
                            @elseif($item->status == 'dikembalikan') bg-green-500
                            @else bg-gray-500
                            @endif
                        ">
                            {{ $item->status }}
                        </span>
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection
