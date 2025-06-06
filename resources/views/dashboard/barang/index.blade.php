@extends('layouts.app')

@section('content')
<h2>Lorem ipsum dolor sit amet.</h2>
<a href="{{ route('barang.create' )}}">+ Tambah Barang</a>
<table>
        <tr>
                <th>Nama</th>
                <th>Pemasok</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
        </tr>
        @foreach($barangs as $brg)
        <tr>
                <td>{{ $brg->nama }}</td>
                <td>{{ $brg->pemasok->nama }}</td>
                <td>{{ $brg->stok }}</td>
                <td>{{ $brg->harga }}</td>
                <td>
                        <a href="{{ route('barang.edit', $brg->id) }}">Edit</a>
                        <form action="{{ route('barang.destroy', $brg->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button type="submit">Hapus</button>
                        </form>
                </td>
        </tr>
        @endforeach
</table>
@endsection