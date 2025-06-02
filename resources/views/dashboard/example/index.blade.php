@extends('layouts.app')

@section('content')
<div class="container">
        <div class="d-flex justify-content-between align-items-center mb-2">
                <h1 class="mb-4">Daftar Katalog</h1>
                <a href="{{ route('menu.create') }}" class="btn btn-success">+ <span class="p-1"></span>Tambah Katalog Menu</a>
        </div>
        <div class="row">
                @foreach ($menus as $menu)
                <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-lg">
                                @if($menu->image)
                                <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->name }}" style="object-fit: cover; height: 200px;">
                                @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No image" style="object-fit: cover; height: 200px;">
                                @endif
                                <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                                <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-bitbucket"></i></button>
                                                </form>
                                        </div>
                                        <h5 class="card-title mt-3">{{ $menu->name }}</h5>
                                        <p class="card-text">{{ $menu->description }}</p>
                                        <p class="card-text"><strong>Rp{{ number_format($menu->price, 0, ',', '.') }}</strong></p>
                                        <div class="d-flex justify-content-between mt-3">
                                                <form action="{{ route('menu.add', $menu->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary w-100">Tambah ke Pesanan</button>
                                                </form>

                                        </div>
                                </div>
                        </div>
                        @endforeach
                </div>

        </div>
        @endsection