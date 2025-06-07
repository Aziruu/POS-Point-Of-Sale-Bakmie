@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-body">
                <h2 class="card-title mb-4">Daftar Pengguna</h2>
                <a href="{{ route(auth()->user()->role . '.users.create') }}" class="btn btn-success mb-4 mt-2">
                        + Tambah User
                </a>

                <div class="table-responsive">
                        <table class="table table-striped">
                                <thead class="table">
                                        <tr>
                                                <th>User</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                {{-- <th>Password</th> --}} {{-- Jangan tampilkan password! --}}
                                                <th>Tanggal Dibuat</th>
                                                <th>Aksi</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        @foreach ($users as $index => $user)
                                        <tr>
                                                <td>
                                                        <img 
                                                        src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/default.png') }}"  
                                                        alt="Profile" 
                                                        width="40" 
                                                        height="40" 
                                                        class="rounded-circle" 
                                                        style="object-fit: cover;">
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ ucfirst($user->role) }}</td>
                                                {{-- <td>{{ $user->password }}</td> --}}
                                                <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                                                <td>
                                                        <a href="{{ route(auth()->user()->role . '.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                                        <form action="{{ route(auth()->user()->role . '.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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