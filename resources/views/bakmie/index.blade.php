<!-- resources/views/bakmie/index.blade.php -->
@extends('layouts.app') <!-- Menggunakan layout app.blade.php -->

@section('content') <!-- Mulai bagian konten -->
    <h1 class="text-2xl font-bold mb-4">Daftar Bakmie</h1>
    <ul>
        @foreach ($bakmies as $bakmie)
            <li>{{ $bakmie->nama }} - Rp{{ number_format($bakmie->harga, 0, ',', '.') }}</li>
        @endforeach
    </ul>
    <a href="{{ route('bakmie.create') }}" class="text-blue-500 hover:underline">Tambah Bakmie Baru</a>
@endsection
