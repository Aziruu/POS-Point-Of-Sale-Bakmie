<?php

// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $menus = Menu::all(); // Untuk ditampilkan di sebelah kanan sebagai card
        $cart = session()->get('cart', []); // Checkout kiri

        return view('dashboard.order.index', compact('menus', 'cart'));
    }

    public function add(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $menu->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['success' => true]);
    }

    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back();
    }

    public function checkout(Request $request)
    {
        // Di sini kamu bisa proses simpan ke DB (transaksi)
        session()->forget('cart');
        return redirect()->route('order.index')->with('success', 'Pesanan berhasil!');
    }

    public function confirm(Request $request)
    {
        $items = json_decode($request->items, true);

        if (!$items || count($items) === 0) {
            return redirect()->route('order.index')->with('error', 'Tidak ada item yang dipilih.');
        }

        $total = 0;
        foreach ($items as $id => $item) {
            $items[$id]['subtotal'] = $item['qty'] * $item['price'];
            $total += $items[$id]['subtotal'];
        }

        return view('dashboard.order.confirm', [
            'items' => $items,
            'total' => $total
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'payment_type' => 'required|in:cash,qr,other',
            'items' => 'required',
            'cash_amount' => 'nullable|numeric|min:0', // hanya dipakai jika cash
        ]);

        $items = json_decode($request->items, true);

        if (!$items || count($items) === 0) {
            return redirect()->route('dashboard.order.index')->with('error', 'Item kosong.');
        }

        $totalPrice = array_reduce($items, fn($sum, $item) => $sum + $item['qty'] * $item['price'], 0);
        $paymentType = $request->payment_type;

        // Jika cash, validasi jumlah uang masuk
        $cashAmount = null;
        if ($paymentType === 'cash') {
            if (!$request->filled('cash_amount') || $request->cash_amount < $totalPrice) {
                return back()->with('error', 'Uang tidak cukup atau belum diisi.');
            }
            $cashAmount = $request->cash_amount;
        }

        // Buat order baru
        $order = Order::create([
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'total_price' => $totalPrice,
            'payment_type' => $paymentType,
            'paid' => true,
            'cash_amount' => $cashAmount,
            'change' => $paymentType === 'cash' ? $cashAmount - $totalPrice : null
        ]);

        // Simpan item satu per satu
        foreach ($items as $id => $item) {
            $order->items()->create([
                'menu_id' => $id,
                'quantity' => $item['qty'],
                'price' => $item['price'],
                'note' => $item['note'] ?? null
            ]);
        }

        return redirect()->route('order.index')->with('success', 'Pesanan berhasil dibuat.');
    }
}
