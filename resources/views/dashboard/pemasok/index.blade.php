@extends('layouts.app')

@section('content')
<div class="page-header">
    <h3 class="page-title">Daftar Pemasok</h3>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Data Pemasok</h4>
        <p class="card-description">Berikut daftar pemasok aktif.</p>
        <a href="{{ route(auth()->user()->role . '.pemasok.create') }}" class="btn btn-primary mb-4 mt-2">+ Tambah Pemasok</a>
        <a href="{{ route(auth()->user()->role . '.pemasok.exportPdf') }}" class="btn btn-danger mb-4 mt-2">Export PDF</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemasok</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemasoks as $index => $pemasok)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pemasok->nama }}</td>
                    <td>{{ $pemasok->alamat }}</td>
                    <td>{{ $pemasok->telepon }}</td>
                    <td>
                        <a href="{{ route(auth()->user()->role . '.pemasok.edit', $pemasok->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route(auth()->user()->role . '.pemasok.destroy', $pemasok->id) }}" method="POST" style="display:inline-block;">
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
@endsection