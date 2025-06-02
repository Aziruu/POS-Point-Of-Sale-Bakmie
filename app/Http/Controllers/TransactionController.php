<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{
    public function history()
    {
        $orders = Order::with(['items.menu'])->latest()->get();
        return view('dashboard.transaction.history', compact('orders'));
    }

    public function print($id)
    {
        $order = Order::with('items.menu')->findOrFail($id);
        return view('dashboard.transaction.print', compact('order'));
    }

    public function pdf($id)
    {
        $order = Order::with('items.menu')->findOrFail($id);

        $pdf = PDF::loadView('dashboard.transaction.print', compact('order'));

        return $pdf->download('inovice-' . $order->order_number . '.pdf');
    }

    public function laporan(Request $request)
    {
        $query = Order::with('items.menu');

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        if ($request->filled('payment_type')) {
            $query->where('payment_type', $request->payment_type);
        }

        $orders = $query->orderBy('created_at', 'desc')->get();

        return view('dashboard.transaction.laporan', compact('orders'));
    }
}
