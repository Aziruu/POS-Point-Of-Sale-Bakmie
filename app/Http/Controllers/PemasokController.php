<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemasoks = Pemasok::all();
        return view('dashboard.pemasok.index', compact('pemasoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pemasok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'telepon' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

        Pemasok::create($data);
        return redirect('/pemasok')->with('success', 'pemasok di tambahkan !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasok $pemasok)
    {
        return view('dashboard.pemasok.edit', compact('pemasok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemasok $pemasok)
    {
        $pemasok->update($request->only(['nama', 'telepon', 'alamat']));
        return redirect('/pemasok')->with('success', 'pemasok berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasok $pemasok)
    {
        $pemasok->delete();
        return redirect('/pemasok')->with('success', 'pemasok dihapus');
    }
}
