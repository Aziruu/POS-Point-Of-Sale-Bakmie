@extends('layouts.app')

@section('content')
<div class="container">
        <h1 class="mb-4">Daftar Menu</h1>

        <!-- Tombol Buat Menu Baru -->
        <div class="mb-3">
                <a href="{{ route('menu.create') }}" class="btn btn-success">
                        + Tambah Menu
                </a>
        </div>

        @foreach ($menus as $menu)
        <div class="d-flex align-items-center border-bottom py-3">
                <div style="width: 100px; height: 80px; overflow: hidden; border-radius: 8px;">
                        @if($menu->image)
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                        <img src="https://via.placeholder.com/100x80?text=No+Image" alt="No image" style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                </div>

                <div class="flex-grow-1 mx-3">
                        <h5 class="mb-1">{{ $menu->name }}</h5>
                        <small class="text-muted">{{ $menu->description }}</small>
                        <div><strong>Rp{{ number_format($menu->price, 0, ',', '.') }}</strong></div>
                </div>

                <div class="text-end">
                        <form action="{{ route('menu.add', $menu->id) }}" method="POST" class="mb-2">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                        </form>
                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i>
                        </a>
                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin hapus menu ini?')" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                </button>
                        </form>
                </div>
        </div>
        @endforeach
</div>
@endsection