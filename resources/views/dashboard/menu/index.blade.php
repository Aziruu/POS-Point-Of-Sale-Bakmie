<?php
use Illuminate\Support\Str;
?>

@extends('layouts.app')

@section('content')
<div>
        <div class="page-header">
                <h3 class="page-title">Daftar Menu</h3>
        </div>
        <div class="card">
                <div class="card-body">
                        <!-- Tombol Buat Menu Baru -->
                        <h4 class="card-title">Daftar Menu yang Ada !</h2>
                                <p class="card-description d-flex mt-1 mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, eos consequuntur ipsa facilis vitae dolor?</p>
                                <a href="{{ route('menu.create') }}" class="btn btn-primary mb-4 mt-2">
                                        + Tambah Menu
                                </a>
                                <table class="table">
                                        <thead class="table">
                                                <tr>
                                                        <th>No</th>
                                                        <th>Nama Menu</th>
                                                        <th>Kategori</th>
                                                        <th>Deskripsi</th>
                                                        <th>Harga</th>
                                                        <th>Gambar</th>
                                                        <th>Aksi</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($menus as $index => $menu)
                                                <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $menu->name }}</td>
                                                        <td>{{ $menu->category->name ?? '-' }}</td>
                                                        <td>{{ $menu->description }}</td>
                                                        <td>Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                                                        <td>
                                                                @if($menu->image)
                                                                @php $cardImage = Str::startsWith($menu->image, 'menu_images/') @endphp
                                                                <img src="{{ $cardImage ? asset('storage/' . $menu->image) : asset($menu->image) }}" alt="gambar {{ $menu->name }}" width="80" height="60" style="object-fit: cover; border-radius: 6px;">
                                                                @else
                                                                <img src="https://via.placeholder.com/80x60?text=No+Image" width="80" height="60" style="object-fit: cover; border-radius: 6px;">
                                                                @endif
                                                        </td>
                                                        <td>
                                                                <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit <span class="p-1"></span>
                                                                        <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <form id="delete-form-{{ $menu->id }}" action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button" data-id="{{ $menu->id }}" onclick="confirmDelete(this)" class="btn btn-danger btn-sm">
                                                                                Hapus <span class="p-1"></span>
                                                                                <i class="fa fa-trash"></i>
                                                                        </button>
                                                                </form>
                                                        </td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                </table>
                </div>
        </div>
</div>
<script>
        function confirmDelete(button) {
        const menuId = button.getAttribute('data-id');
        Swal.fire({
                title: "Yakin ingin menghapus menu ini?",
                text: "Tindakan ini tidak bisa dibatalkan!",
                icon: "warning",
                showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#bfc1c2",
                confirmButtonText: "Ya, hapus!"
        }).then((result) => {
                if (result.isConfirmed) {
                document.getElementById(`delete-form-${menuId}`).submit();
                }
        });
        }
</script>
@endsection