@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-body">
                <h4 class="card-title">Tambah Kategori</h4>
                <form action="{{ route(auth()->user()->role . '.categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                                <label>Nama Kategori</label>
                                <input type="text" name="name" class="form-control" required>
                        </div>
                        <button class="btn btn-success">Simpan</button>
                        <a href="{{ route(auth()->user()->role . '.categories.index') }}" class="btn btn-light">Kembali</a>
                </form>
        </div>
</div>
@endsection