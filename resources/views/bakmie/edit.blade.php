<!-- resources/views/bakmie/edit.blade.php -->
@extends('layouts.app') <!-- Menggunakan layout app.blade.php -->

@section('content') <!-- Mulai bagian konten -->
<h1 class="text-2xl font-bold mb-4">Edit Bakmie</h1>

<!-- Form untuk mengedit bakmie -->
<form action="{{ route('bakmie.update', $bakmie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Bakmie</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $bakmie->nama) }}" class="mt-1 block w-full" required>
        </div>
        <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="harga" id="harga" value="{{ old('harga', $bakmie->harga) }}" class="mt-1 block w-full" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update</button>
</form>
@endsection