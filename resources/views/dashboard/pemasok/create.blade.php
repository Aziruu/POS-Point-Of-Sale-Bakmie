@extends('layouts.app')

@section('content')
<h2>lorem</h2>
<form action="{{ route('pemasok.store') }}" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama"><br>
        <input type="text" name="telepon" placeholder="Telepon"><br>
        <textarea name="alamat" placeholder="Alamat"></textarea><br>
        <button type="sumbit">Simpan</button>
</form>
@endsection