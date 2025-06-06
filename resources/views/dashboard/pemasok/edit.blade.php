@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Pemasok</h4>
        <form action="{{ route('pemasok.update', $pemasok->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group mb-2">
                <label>Nama Pemasok</label>
                <input type="text" name="nama" class="form-control" value="{{ $pemasok->nama }}" required>
            </div>
            <div class="form-group mb-2">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required>{{ $pemasok->alamat }}</textarea>
            </div>
            <div class="form-group mb-2">
                <label>Nomor HP</label>
                <input type="text" name="telepon" class="form-control" value="{{ $pemasok->telepon }}" required>
            </div>
            <button class="btn btn-success">Update</button>
            <a href="{{ route('pemasok.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection