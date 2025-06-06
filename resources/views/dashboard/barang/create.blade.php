@extends('layouts.app')

@section('content')
<h2>Tambah Barang</h2>
<form action="{{ route('barang.store') }}" method="POST">
    @csrf

    <label>Nama Barang</label>
    <input type="text" name="nama" required>

    <label>Harga</label>
    <input type="number" name="harga" required>

    <label>Stok</label>
    <input type="number" name="stok" required>

    <label>Pemasok</label>
    <select name="pemasok_id" required>
        @foreach($pemasoks as $pemasok)
            <option value="{{ $pemasok->id }}">{{ $pemasok->nama }}</option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>
@endsection