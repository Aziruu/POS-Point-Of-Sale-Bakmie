<?php

namespace App\Http\Controllers;

use App\Models\Bakmie;
use Illuminate\Http\Request;

class BakmieController extends Controller
{
    public function index()
    {
        $bakmies = Bakmie::all();
        return view('bakmie.index', compact('bakmies'));
    }

    public function create()
    {
        return view('bakmie.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
        ]);

        Bakmie::create($request->all());

        return redirect()->route('bakmie.index')->with('success', 'Bakmie ditambahkan!');
    }

    public function edit(Bakmie $bakmie)
    {
        return view('bakmie.edit', compact('bakmie'));
    }

    public function update(Request $request, Bakmie $bakmie)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
        ]);

        $bakmie->update($request->all());

        return redirect()->route('bakmie.index')->with('success', 'Bakmie diperbarui!');
    }

    public function destroy(Bakmie $bakmie)
    {
        $bakmie->delete();

        return redirect()->route('bakmie.index')->with('success', 'Bakmie dihapus!');
    }
}

