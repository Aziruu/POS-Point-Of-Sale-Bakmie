@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-body">
                <h2 class="card-title mb-4">Edit User</h2>

                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                                <label for="photo" class="form-label">Foto Profile</label>
                                <input type="file" class="form-control" name="photo">
                        </div>

                        <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                                <label>Role</label>
                                <select name="role" class="form-control" required>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                        <option value="user"  {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
        </div>
</div>
@endsection