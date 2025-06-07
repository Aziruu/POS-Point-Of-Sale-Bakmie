@extends('layouts.app')

@section('content')
<div class="page-header">
    <h3 class="page-title">Tambah Barang</h3>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Form Tambah Barang</h4>
        <form action="{{ route(auth()->user()->role . '.barang.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Barang</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pemasok_id">Pemasok</label>
                <select name="pemasok_id" class="form-control" required>
                    <option value="">Pilih Pemasok</option>
                    @foreach($pemasoks as $pemasok)
                        <option value="{{ $pemasok->id }}">{{ $pemasok->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah Barang</button>
            <a href="{{ route(auth()->user()->role . '.barang.index') }}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>
@endsection
