@extends('layouts.app')

@section('content')
<div>
        <div class="page-header">
                <h1 class="page-title">Daftar Kategori</h1>
        </div>
        <div class="card">
                <div class="card-body">
                        <h4 class="card-title">Daftar Kategori yang dibuat</h4>
                        <p class="card-description d-flex mt-1 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, eos consequuntur ipsa facilis vitae dolor?</p>
                        <a href="{{ route(auth()->user()->role . '.categories.create') }}" class="btn btn-primary mb-3">+ Tambah Kategori</a>
                        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
                        <table class="table">
                                <thead>
                                        <tr>
                                                <th>Nama Kategori</th>
                                                <th>Aksi</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                        <a href="{{ route(auth()->user()->role . '.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route(auth()->user()->role . '.categories.destroy', $category->id) }}" method="POST" class="d-inline"
                                                                onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                                                @csrf @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                        </form>
                                                </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                </div>
        </div>
</div>
@endsection