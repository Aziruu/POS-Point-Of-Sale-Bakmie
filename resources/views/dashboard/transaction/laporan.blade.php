@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
            <h3 class="mb-4">Laporan Transaksi</h3>

    {{-- Filter Form --}}
    <form method="GET" class="row g-3 mb-3">
        <div class="col-md-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" id="date" name="date" value="{{ request('date') }}" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="payment_type" class="form-label">Metode Pembayaran</label>
            <select name="payment_type" id="payment_type" class="form-control">
                <option value="">Semua</option>
                <option value="cash" {{ request('payment_type') == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="qr" {{ request('payment_type') == 'qr' ? 'selected' : '' }}>QR</option>
                <option value="other" {{ request('payment_type') == 'other' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>
        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route(auth()->user()->role . '.transaction.laporan') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    {{-- Table Data --}}
    <div class="table-responsive">
        @php $grandTotal = 0; @endphp
            <table class="table table-hover table">
                <thead class="table">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Invoice</th>
                        <th>Menu</th>
                        <th>Qty</th>
                        <th>Harga 1 Menu</th>
                        <th>Subtotal</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
                        <th>Metode</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $i => $order)
                        @php $grandTotal += $order->total_price ?? 0; @endphp
                        @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ optional($item->menu)->name ?? 'Menu dihapus' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp{{ number_format($item->price) }}</td>
                            <td>Rp{{ number_format($item->price * $item->quantity) }}</td>
                            @if ($loop->first)
                                <td rowspan="{{ $order->items->count() }}">Rp{{ number_format($order->total_price) }}</td>
                                <td rowspan="{{ $order->items->count() }}">Rp{{ number_format($order->cash_amount) }}</td>
                                <td rowspan="{{ $order->items->count() }}">
                                    Rp{{ number_format(max(0, $order->cash_amount - $order->total_price)) }}
                                </td>
                                <td rowspan="{{ $order->items->count() }}">{{ strtoupper($order->payment_type) }}</td>
                            @endif
                        </tr>
                        @endforeach
                    @empty
                    <tr>
                        <td colspan="11" class="text-center">Tidak ada data transaksi.</td>
                    </tr>
                    @endforelse
                </tbody>

                @if (count($orders))
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-end">Total Pendapatan Hari Ini:</th>
                        <th colspan="9" class="">Rp{{ number_format($grandTotal) }}</th>
                    </tr>
                </tfoot>
                @endif
            </table>

        </div>
    </div>
</div>
@endsection
