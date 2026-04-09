@extends($layout)

@section('title', 'Edit Profile')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-xl">

    <h2 class="text-xl font-bold mb-4">Edit Profile</h2>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- NAMA --}}
        <label>Nama</label>
        <input type="text" name="name" value="{{ $user->name }}"
            class="w-full border p-2 mb-3 rounded">

        {{-- KHUSUS ANGGOTA --}}
        @if($user->role == 'anggota')
            <label>NIS</label>
            <input type="text" name="nis" value="{{ $data->nis ?? '' }}"
                class="w-full border p-2 mb-3 rounded">

            <label>Jurusan</label>
            <input type="text" name="jurusan" value="{{ $data->jurusan ?? '' }}"
                class="w-full border p-2 mb-3 rounded">

            <label>Kelas</label>
            <input type="text" name="kelas" value="{{ $data->kelas ?? '' }}"
                class="w-full border p-2 mb-3 rounded">
        @endif

        {{-- UMUM --}}
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full border p-2 mb-3 rounded">
            <option value="L" {{ ($data->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ ($data->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>

        <label>Alamat</label>
        <textarea name="alamat" class="w-full border p-2 mb-3 rounded">{{ $data->alamat ?? '' }}</textarea>

        {{-- FOTO --}}
        <label>Foto Profile</label>
        <input type="file" name="foto" class="mb-3">

        {{-- BUTTON --}}
        <button class="bg-[#7b4b2a] hover:bg-[#a86b45] text-white px-4 py-2 rounded">
            Simpan
        </button>

    </form>

</div>
@endsection
