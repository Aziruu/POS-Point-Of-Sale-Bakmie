<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h3 class="text-center">Laporan Transaksi</h3>

    <table>
        <thead>
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
            @php $grandTotal = 0; @endphp
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
        <tfoot>
            <tr>
                <th colspan="2">Total Pendapatan:</th>
                <th colspan="9">Rp{{ number_format($grandTotal) }}</th>
            </tr>
        </tfoot>
    </table>
</body>
</html>
