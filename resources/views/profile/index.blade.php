@extends($layout)

@section('content')
<div class="p-6">

    <h2 class="text-2xl font-bold mb-6">Profile</h2>

    <div class="bg-white shadow rounded-lg p-6 flex gap-6 items-center">

        {{-- FOTO --}}
        <div>
            @if ($data && $data->foto)
                <img src="{{ asset('storage/' . $data->foto) }}"
                     class="w-32 h-32 rounded-full object-cover border">
            @else
                <img src="https://via.placeholder.com/150"
                     class="w-32 h-32 rounded-full border">
            @endif
        </div>

        {{-- DATA --}}
        <div class="space-y-1">

            <p><b>Nama:</b> {{ $user->name }}</p>
            <p><b>Email:</b> {{ $user->email }}</p>
            <p><b>Role:</b> {{ ucfirst($user->role) }}</p>

            <hr class="my-3">

            {{-- KHUSUS ANGGOTA --}}
            @if ($user->role == 'anggota' && $data)
                <p><b>NIS:</b> {{ $data->nis }}</p>
                <p><b>Jurusan:</b> {{ $data->jurusan }}</p>
                <p><b>Kelas:</b> {{ $data->kelas }}</p>
            @endif

            {{-- SEMUA ROLE --}}
            @if ($data)
                <p><b>Jenis Kelamin:</b> {{ $data->jenis_kelamin ?? '-' }}</p>
                <p><b>Alamat:</b> {{ $data->alamat ?? '-' }}</p>
            @endif

            {{-- BUTTON --}}
            <a href="{{ route('profile.edit') }}"
               class="mt-4 inline-block bg-[#7b4b2a] hover:bg-[#a86b45] text-white px-4 py-2 rounded transition">
               Edit Profile
            </a>

        </div>

    </div>

</div>
@endsection
