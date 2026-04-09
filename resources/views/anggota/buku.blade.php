@extends('layouts.anggota')

@section('title', 'Daftar Buku')

@section('content')

<!-- SEARCH -->
<div class="flex items-center bg-white px-4 py-3 rounded-2xl shadow-sm border border-gray-100 mb-6">
    <span class="text-gray-400 mr-2">🔍</span>
    <input type="text" placeholder="Cari buku..."
        class="bg-transparent w-full outline-none text-sm">
</div>

<!-- GRID -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

    @foreach ($buku as $item)

    <!-- CARD -->
    <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 overflow-hidden border border-gray-100">

        <!-- IMAGE -->
        <div class="relative aspect-[3/4] bg-gray-50 overflow-hidden">

            <img src="{{ asset('storage/' . $item->gambar) }}"
                class="w-full h-full object-cover group-hover:scale-105 transition duration-300">

            <!-- FAVORITE -->
            <div
                class="absolute top-3 right-3 bg-white/80 backdrop-blur px-2 py-1 rounded-full text-sm cursor-pointer hover:text-red-500">
                🤎
            </div>

            <!-- STOCK BADGE -->
            <div class="absolute bottom-3 left-3 bg-[#7b4b2a] text-white text-[10px] px-2 py-1 rounded-full">
                Stok: {{ $item->stok }}
            </div>

        </div>

        <!-- CONTENT -->
        <div class="p-4">

            <!-- TITLE -->
            <h3 class="font-semibold text-sm text-gray-800 mb-1 line-clamp-1 group-hover:text-[#7b4b2a] transition">
                {{ $item->judul }}
            </h3>

            <!-- DETAILS -->
            <p class="text-xs text-gray-500">✍️ {{ $item->pengarang }}</p>
            <p class="text-xs text-gray-500">📚 {{ $item->kategori }}</p>
            <p class="text-xs text-gray-500 mb-2">🏢 {{ $item->penerbit }}</p>

            <!-- BUTTON -->
            <a href="{{ route('anggota.detail-buku', $item->id) }}"
                class="block text-center bg-[#7b4b2a] hover:bg-[#a86b45] text-white text-xs py-2 rounded-xl transition duration-300">
                View Detail
            </a>

        </div>

    </div>

    @endforeach

</div>

@endsection
