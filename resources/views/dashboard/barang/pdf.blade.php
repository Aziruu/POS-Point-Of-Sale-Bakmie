<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Data Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Pemasok</th>
                <th>Stok Barang</th>
                <th>Harga Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $index => $brg)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $brg->nama }}</td>
                <td>{{ $brg->pemasok->nama ?? '-'  }}</td>
                <td>{{ $brg->stok }}</td>
                <td>Rp{{ number_format($brg->harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
