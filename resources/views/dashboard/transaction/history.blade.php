@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Riwayat Transaksi</h3>

        <table class="table table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Pesanan</th>
                    <th>Jumlah Item</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->items->sum('quantity') }}</td>
                    <td>Rp{{ number_format($order->total_price) }}</td>
                    <td>
                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'kasir')
                        <a href="{{ route(auth()->user()->role . '.transaction.print', $order->id) }}" target="_blank" class="btn btn-sm btn-primary">Cetak</a>
                        <a href="{{ route(auth()->user()->role . '.transaction.pdf', $order->id) }}" class="btn btn-sm btn-danger">PDF</a>
                        @endif
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $order->id }}">Detail</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- MODALS --}}
@foreach ($orders as $order)
<div class="modal fade" id="detailModal{{ $order->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $order->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel{{ $order->id }}">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                {{-- Ini isi dari “history transaksi old” --}}
                <h5 class="card-title">Nomor Pesanan: {{ $order->order_number }}</h5>
                <p><strong>Tanggal :</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
                <p><strong>Metode Pembayaran :</strong> {{ strtoupper($order->payment_type) }}</p>
                <p><strong>Status :</strong><span class="ps-2"></span><label class="badge badge-gradient-success">DONE</label></p>

                @if ($order->payment_type === 'cash')
                <p><strong>Uang Tunai:</strong> Rp{{ number_format($order->cash_amount) }}</p>
                <p><strong>Kembalian:</strong> Rp{{ number_format($order->change) }}</p>
                @endif

                <table class="table table mt-3">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->menu->name ?? 'Menu sudah dihapus' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp{{ number_format($item->price) }}</td>
                            <td>Rp{{ number_format($item->price * $item->quantity) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h5 class="text-end mt-3">Total: Rp{{ number_format($order->total_price) }}</h5>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
