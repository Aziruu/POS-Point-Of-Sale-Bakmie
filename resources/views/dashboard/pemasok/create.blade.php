@extends('layouts.app')

@section('content')
<h2 class="mb-5">Tambah Pemasok</h2>
<form action="{{ route('pemasok.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama Pemasok</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="telepon">Nomor HP</label>
        <input type="text" name="telepon" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary mb-5">Tambah Pemasok</button>
</form>
@endsection
