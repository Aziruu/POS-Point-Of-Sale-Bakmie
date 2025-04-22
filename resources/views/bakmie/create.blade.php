<!-- resources/views/bakmie/create.blade.php -->
@extends('layouts.app') <!-- Menggunakan layout app.blade.php -->

@section('content') <!-- Mulai bagian konten -->
<h1 class="text-2xl font-bold mb-4">Tambah Bakmie Baru</h1>

<!-- Form untuk menambah bakmie baru -->
<form action="{{ route('bakmie.store') }}" method="POST">
        @csrf
        <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Bakmie</label>
                <input type="text" name="nama" id="nama" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="harga" id="harga" class="mt-1 block w-full" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Tambah</button>
</form>
@endsection