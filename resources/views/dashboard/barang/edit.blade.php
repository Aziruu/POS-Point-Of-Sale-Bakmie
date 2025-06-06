@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Barang</h4>
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group mb-2">
                <label>Nama Barang</label>
                <input type="text" name="nama" class="form-control" value="{{ $barang->nama }}" required>
            </div>
            <div class="form-group mb-2">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" required>
            </div>
            <div class="form-group mb-2">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}" required>
            </div>
            <button class="btn btn-success">Update</button>
            <a href="{{ route('barang.index') }}" class="btn btn-light">Kembali</a>
        </form>
    </div>
</div>
@endsection