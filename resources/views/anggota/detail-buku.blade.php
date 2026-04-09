@extends('layouts.anggota')

@section('title','Detail Buku')

@section('content')

<div class="bg-white rounded-2xl shadow-md p-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- IMAGE -->
        <div class="md:col-span-1">
            <div class="bg-gray-50 rounded-2xl p-4 flex items-center justify-center">
                <img src="{{ asset('storage/'.$buku->gambar) }}"
                    class="w-full h-[350px] object-cover rounded-xl shadow">
            </div>
        </div>

        <!-- INFO -->
        <div class="md:col-span-2">

            <!-- TITLE -->
            <h2 class="text-2xl font-bold text-gray-800 mb-4">
                {{ $buku->judul }}
            </h2>

            <!-- TABLE INFO -->
            <div class="bg-gray-50 rounded-xl p-4 mb-6">

                <table class="w-full text-sm">

                    <tr class="border-b">
                        <td class="py-2 text-gray-500">Pengarang</td>
                        <td class="py-2 font-medium">: {{ $buku->pengarang }}</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-2 text-gray-500">Penerbit</td>
                        <td class="py-2 font-medium">: {{ $buku->penerbit }}</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-2 text-gray-500">Kategori</td>
                        <td class="py-2 font-medium">: {{ $buku->kategori }}</td>
                    </tr>

                    <tr>
                        <td class="py-2 text-gray-500">Stok</td>
                        <td class="py-2 font-medium">
                            <span class="px-2 py-1 text-xs rounded-full bg-[#7b4b2a] text-white">
                                {{ $buku->stok }} tersedia
                            </span>
                        </td>
                    </tr>

                </table>

            </div>

            <!-- DESKRIPSI -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold text-gray-800 mb-2">
                    Deskripsi Buku
                </h4>
                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ $buku->deskripsi }}
                </p>
            </div>

            <!-- BUTTON -->
            <a href="{{ route('anggota.pinjam',$buku->id) }}"
                class="inline-block bg-[#7b4b2a] hover:bg-[#a86b45] text-white px-6 py-3 rounded-xl shadow transition">
                📚 Pinjam Buku
            </a>

        </div>

    </div>

</div>

@endsection
