@extends('layouts.app')

@section('content')
<div>
    <div class="page-header">
        <h3 class="page-title">Daftar Barang</h3>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Barang yang Tersedia</h4>
            <p class="card-description d-flex mt-1 mb-2">
                Daftar lengkap stok barang dan pemasok yang terdaftar.
            </p>
            <a href="{{ route('barang.create') }}" class="btn btn-primary mb-4 mt-2">
                + Tambah Barang
            </a>
            <a href="{{ route('barang.exportPdf') }}" class="btn btn-danger mb-4 mt-2">Export PDF</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Pemasok</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangs as $index => $brg)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $brg->nama }}</td>
                        <td>{{ $brg->pemasok->nama ?? '-' }}</td>
                        <td>{{ $brg->stok }}</td>
                        <td>Rp{{ number_format($brg->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $brg->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form id="delete-form-{{ $brg->id }}" action="{{ route('barang.destroy', $brg->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" data-id="{{ $brg->id }}" onclick="confirmDelete(this)" class="btn btn-danger btn-sm">
                                    Hapus
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
        const barangId = button.getAttribute('data-id');
        Swal.fire({
            title: "Yakin ingin menghapus barang ini?",
            text: "Tindakan ini tidak bisa dibatalkan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#bfc1c2",
            confirmButtonText: "Ya, hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${barangId}`).submit();
            }
        });
    }
</script>
@endsection
