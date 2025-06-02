@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-body">
                <h4 class="card-title">Tambah Kategori</h4>
                <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                                <label>Nama Kategori</label>
                                <input type="text" name="name" class="form-control" required>
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
        </div>
</div>
@endsection