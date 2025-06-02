@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-body">
                <h4 class="card-title">Edit Kategori</h4>
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group mb-2">
                                <label>Nama Kategori</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                        </div>
                        <button class="btn btn-success">Update</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
        </div>
</div>
@endsection