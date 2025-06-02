@extends('layouts.app')

@section('content')
<h2 class="mb-5">Tambah Menu</h2>
<form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
                <label for="name">Nama Menu</label>
                <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" name="price" class="form-control" required>
        </div>
        <div class="form-group">
                <label for="category">Kategori</label>
                <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $menu->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                        </option>
                        @endforeach
                </select>
        </div>
        <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
                <label for="image">Gambar Menu</label>
                <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary mb-5">Tambah Menu</button>
</form>
@endsection