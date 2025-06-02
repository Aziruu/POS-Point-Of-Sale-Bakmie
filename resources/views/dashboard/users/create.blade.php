@extends('layouts.app')

@section('content')
<div class="card">
        <div class="card-body">
                <h2 class="card-title mb-4">Tambah User</h2>
                <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                        <label >Role</label>
                        <select name="role" class="form-control" required>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                        </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
        </div>
</div>
@endsection