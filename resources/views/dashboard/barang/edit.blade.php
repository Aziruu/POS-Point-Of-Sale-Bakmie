@extends('layouts.app')

@section('content')
<h2>Edit Barang</h2>
<form method="POST" action="{{ route('barang.update', $barang->id) }}">
    @csrf @method('PUT')
    <input type="text" name="nama" value="{{ $barang->nama }}"><br>
    <select name="pemasok_id">
        @foreach($pemasoks as $p)
            <option value="{{ $p->id }}" {{ $barang->pemasok_id == $p->id ? 'selected' : '' }}>
                {{ $p->nama }}
            </option>
        @endforeach
    </select><br>
    <input type="number" name="stok" value="{{ $barang->stok }}"><br>
    <input type="number" name="harga" value="{{ $barang->harga }}"><br>
    <button type="submit">Update</button>
</form>

@endsection