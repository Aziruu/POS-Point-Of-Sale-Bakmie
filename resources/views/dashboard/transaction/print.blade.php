<!DOCTYPE html>
<html>
<head>
    <title>Invoice {{ $order->order_number }}</title>
    <style>
        body {
            font-family: monospace;
            font-size: 12px;
            width: 300px;
            margin: auto;
        }

        h3, p {
            margin: 0;
            padding: 0;
        }

        .text-center {
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            text-align: left;
            padding: 4px 0;
        }

        .line {
            border-top: 2px dashed #000;
            margin: 8px 0;
        }

        .text-right {
            text-align: right;
        }

        @media print {
            @page {
                margin: 0;
            }
            body {
                margin: 0;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="text-center">
        <h3>WarmieKu</h3>
        <small>{{ $order->created_at->format('d M Y H:i') }}</small>
    </div>

    <div class="line"></div>

    <p><strong>Invoice:</strong> {{ $order->order_number }}</p>
    <p><strong>Metode:</strong> {{ strtoupper($order->payment_type) }}</p>

    <div class="line"></div>

    <table>
        <thead>
            <tr>
                <th>Menu</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->menu->name }}</td>
                <td class="text-right">{{ $item->quantity }}</td>
                <td class="text-right">Rp{{ number_format($item->price * $item->quantity) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="line"></div>

    <p class="text-right"><strong>Total: Rp{{ number_format($order->total_price) }}</strong></p>

    @if ($order->payment_type === 'cash')
        <p class="text-right">Tunai: Rp{{ number_format($order->cash_amount) }}</p>
        <p class="text-right">Kembalian: Rp{{ number_format($order->change) }}</p>
    @endif

    <div class="line"></div>

    <p class="text-center">Terima kasih! 🍽️</p>
</body>
</html>
