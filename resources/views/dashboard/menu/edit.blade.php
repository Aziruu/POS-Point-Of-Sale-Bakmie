@extends('layouts.app')

@section('content')
<h2 class="mb-5">Edit Menu</h2>
<form action="{{ route(auth()->user()->role . '.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="name">Nama Menu</label>
                <input type="text" name="name" value="{{ $menu->name }}" class="form-control" required>
        </div>
        <div class="form-group">
                <label for="price">Harga</label>
                <input type="text" name="price" value="{{ $menu->price }}" class="form-control" required>
        </div>
        <div class="form-group">
                <label for="category_id">Kategori</label>
                <select name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                        </option>
                        @endforeach
                </select>
        </div>
        <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
        </div>
        <div class="form-group">
                <label for="image">Gambar Menu</label>
                <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary mb-5">Update Menu</button>
</form>
@endsection