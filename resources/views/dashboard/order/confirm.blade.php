@extends('layouts.app')

@section('content')
<div>
        <div class="card">
                <div class="card-body">
                        <h3>Konfirmasi Pesanan</h3>
                        <table class="table">
                                <thead>
                                        <tr>
                                                <th>Menu</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        @foreach ($items as $id => $item)
                                        <tr>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['qty'] }}</td>
                                                <td>Rp{{ number_format($item['price']) }}</td>
                                                <td>Rp{{ number_format($item['subtotal']) }}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                        <h4 class="mt-3">Total Harga: Rp{{ number_format($total) }}</h4>

                        <form id="orderForm" action="{{ route('order.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="items" value="{{ json_encode($items) }}">
                                <input type="hidden" name="cash_amount" id="hidden_cash_amount">

                                <div class="form-group mt-3">
                                        <label for="payment_type">Pilih Metode Pembayaran:</label>
                                        <select name="payment_type" id="payment_type" class="form-control p-3" required>
                                                <option value="cash">Cash</option>
                                                <option value="qr">QR</option>
                                                <option value="other">Lainnya</option>
                                        </select>
                                </div>

                                <button type="submit" class="btn btn-success mt-3">Konfirmasi & Simpan</button>
                        </form>
                </div>
        </div>
</div>

<!-- Modal Cash -->
<div class="modal fade" id="cashModal" tabindex="-1" aria-labelledby="cashModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="cashModalLabel">Pembayaran Tunai</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                                <p>Total: <strong id="cash-total">Rp{{ number_format($total) }}</strong></p>
                                <div class="mb-3">
                                        <label for="uang_dibayar" class="form-label">Uang dari Pembeli:</label>
                                        <input type="number" class="form-control" id="uang_dibayar" placeholder="Masukkan nominal">
                                </div>
                                <button class="btn btn-success" onclick="submitForm()">Selesai</button>
                        </div>
                </div>
        </div>
</div>

<!-- Modal QR -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content text-center">
                        <div class="modal-header">
                                <h5 class="modal-title" id="qrModalLabel">Scan QR</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                                <img src="https://via.placeholder.com/250?text=QR+Code" class="img-fluid mb-3" alt="QR">
                                <button class="btn btn-success" onclick="submitForm()">Selesai</button>
                        </div>
                </div>
        </div>
</div>
<script>
        const form = document.getElementById('orderForm');

        form.addEventListener('submit', function(e) {
                e.preventDefault(); // Stop default submit
                const method = document.getElementById('payment_type').value;

                if (method === 'cash') {
                        new bootstrap.Modal(document.getElementById('cashModal')).show();
                } else if (method === 'qr') {
                        new bootstrap.Modal(document.getElementById('qrModal')).show();
                } else {
                        submitForm(); // langsung kirim kalau bukan cash/qr
                }
        });

        function submitForm() {
        const method = document.getElementById('payment_type').value;
        if (method === 'cash') {
                const uang = document.getElementById('uang_dibayar').value;
                if (!uang || uang <= 0) {
                alert('Masukkan jumlah uang tunai yang valid.');
                return;
                }
                document.getElementById('hidden_cash_amount').value = uang;
        }

        document.getElementById('orderForm').submit();
        }
</script>

@endsection