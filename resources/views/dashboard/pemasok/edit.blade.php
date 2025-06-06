@extends('layouts.app')

@section('content')
<h2>lorem</h2>
<form action="{{ route('pemasok.update', $pemasok->id) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="nama" placeholder="Nama" value="{{ $pemasok->nama }}"><br>
        <input type="text" name="telepon" placeholder="Telepon" value="{{ $pemasok->telepon }}"><br>
        <textarea name="alamat" placeholder="Alamat" value="{{ $pemasok->alamat }}"></textarea><br>
        <button type="sumbit">Update</button>
</form>
@endsection