@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="row">
                <!-- Kolom Kanan: Card Menu -->
                <div class="col-md-7">
                        <h4 class="mb-3">Pilih Menu</h4>
                        <div class="row gx-4">
                                @foreach($menus as $menu)
                                <div class="col-md-4 mb-4">
                                        <div class="card h-100 menu-card shadow" data-id="{{ $menu->id }}" data-name="{{ $menu->name }}" data-price="{{ $menu->price }}">
                                                @if($menu->image)
                                                <img src="{{ asset('storage/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->name }}" style="height: 150px; object-fit: cover;">
                                                @else
                                                <img src="https://via.placeholder.com/150x150?text=No+Image" class="card-img-top" alt="No image">
                                                @endif
                                                <div class="card-body py-4 px-3 text-start">
                                                        <h5 class="card-title mb-1">{{ $menu->name }}</h5>
                                                        <p class="card-text mb-0 mt-1" style="font-size: 1rem;">
                                                                Rp{{ number_format($menu->price, 0, ',', '.') }}
                                                        </p>
                                                        <div class="text-warning py-2">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                        </div>
                                                        <button type="button" class="btn btn-success btn-sm w-100 mt-2">Pesan</button>
                                                </div>
                                        </div>
                                </div>
                                @endforeach
                        </div>
                </div>

                <!-- Kolom Kiri: Tabel Checkout -->
                <div class="col-md-5">
                        <h4 class="mb-3">Checkout</h4>
                        <div class="bg-white p-3">
                                <h4 class="py-2">List Checkout :</h4>
                                <table class="table table mr-5">
                                        <thead>
                                                <tr>
                                                        <th>Menu</th>
                                                        <th>Qty</th>
                                                        <th>Harga</th>
                                                        <th>Total</th>
                                                        <th>Aksi</th>
                                                </tr>
                                        </thead>
                                        <tbody id="checkout-body">
                                                <!-- List item yang ditambahkan akan muncul di sini -->
                                        </tbody>
                                </table>
                                <div class="d-flex justify-content-between mt-3">
                                        <strong>Total Harga:</strong>
                                        <strong id="grand-total">Rp0</strong>
                                </div>
                                <form action="{{ route($confirmRoute) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="items" id="checkout-items">
                                        <button type="submit" class="btn btn-primary mt-3 w-100">Pesan Sekarang</button>
                                </form>
                        </div>
                </div>
        </div>
</div>

<script>
        const checkoutBody = document.getElementById('checkout-body');
        const grandTotalEl = document.getElementById('grand-total');
        const checkoutItemsInput = document.getElementById('checkout-items');
        let orderItems = {};

        document.querySelectorAll('.menu-card').forEach(card => {
                card.addEventListener('click', () => {
                        const id = card.dataset.id;
                        const name = card.dataset.name;
                        const price = parseInt(card.dataset.price);

                        if (orderItems[id]) {
                                orderItems[id].qty++;
                        } else {
                                orderItems[id] = {
                                        name,
                                        price,
                                        qty: 1
                                };
                        }

                        renderCheckout();
                });
        });

        function truncate(str, maxLength) {
                return str.length > maxLength ? str.slice(0, maxLength) + "..." : str;
        }


        function renderCheckout() {
                checkoutBody.innerHTML = '';
                let total = 0;

                for (const id in orderItems) {
                        const item = orderItems[id];
                        const itemTotal = item.qty * item.price;
                        total += itemTotal;

                        checkoutBody.innerHTML += `
                <tr>
                    <td title="${item.name}">${truncate(item.name, 6)}</td>
                    <td>
                        <button class="btn btn-sm btn-inverse-danger" onclick="changeQty('${id}', -1)">−</button>
                        <span class="mx-1">${item.qty}</span>
                        <button class="btn btn-sm btn-inverse-info" onclick="changeQty('${id}', 1)">+</button>
                    </td>
                    <td>${item.price.toLocaleString()}</td>
                    <td style="max-width: 64px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="Rp${itemTotal.toLocaleString()}">${itemTotal.toLocaleString()}</td>
                    <td><button class="btn btn-inverse-danger btn-sm" onclick="removeItem('${id}')"><i class="fa fa-bitbucket"></i></button></td>
                </tr>
            `;
                }

                grandTotalEl.innerText = 'Rp' + total.toLocaleString();
                checkoutItemsInput.value = JSON.stringify(orderItems);
        }

        function removeItem(id) {
                delete orderItems[id];
                renderCheckout();
        }

        function changeQty(id, delta) {
                if (orderItems[id]) {
                        orderItems[id].qty += delta;

                        if (orderItems[id].qty <= 0) {
                                delete orderItems[id];
                        }

                        renderCheckout();
                }
        }
</script>
@endsection