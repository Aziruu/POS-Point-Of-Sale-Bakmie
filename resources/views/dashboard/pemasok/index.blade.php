@extends('layouts.app')

@section('content')
<h2>Daftar Pemasok</h2>
<a href="{{ route('pemasok.create') }}">+ Tambah Pemasok</a>

<table>
        <tr>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
        </tr>
        @foreach($pemasoks as $p)
        <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->telepon }}</</td>
                <td>{{ $p->alamat }}</</td>
                <td>
                        <a href="{{ route('pemasok.edit', $p->id )}}">Edit</a>
                        <form action="{{ route('pemasok.destroy', $p->id )}}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit">Hapus</button>
                        </form>
                </td>
        </tr>
        @endforeach
</table>
@endsection