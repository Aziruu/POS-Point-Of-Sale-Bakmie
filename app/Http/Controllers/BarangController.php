<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pemasok;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::with('pemasok')->get();
        return view('dashboard.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemasoks = Pemasok::all();
        return view('dashboard.barang.create', compact('pemasoks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'pemasok_id' => 'required|exists:pemasoks,id',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
        ]);


        Barang::create($request->only(['nama', 'harga', 'stok', 'pemasok_id']));
        return redirect()->route(Auth::user()->role . '.barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $pemasoks = Pemasok::all();
        return view('dashboard.barang.edit', compact('barang', 'pemasoks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $barang->update($request->all());
        return redirect()->route(Auth::user()->role . '.barang.index')->with('success', 'Barang diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route(Auth::user()->role . '.barang.index')->with('success', 'Barang dihapus');
    }

    public function exportPdf()
    {
        $barangs = Barang::all();

        $pdf = Pdf::loadView('dashboard.barang.pdf', compact('barangs'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('data_barang.pdf');
    }
}
