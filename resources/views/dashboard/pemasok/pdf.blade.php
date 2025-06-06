<!DOCTYPE html>
<html>
<head>
    <title>Data Pemasok</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Data Pemasok</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemasok</th>
                <th>Telepon</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemasoks as $index => $pemasok)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pemasok->nama }}</td>
                <td>{{ $pemasok->telepon }}</td>
                <td>{{ $pemasok->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
