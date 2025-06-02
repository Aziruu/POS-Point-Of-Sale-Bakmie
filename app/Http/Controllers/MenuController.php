<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('dashboard.menu.index', compact('menus'));
    }

    public function addToOrder(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $menu->name,
                'price' => $menu->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('menu.index')->with('success', 'Menu ditambahkan ke pesanan.');
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.menu.create', compact('categories'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.menu.edit', compact('menu', 'categories'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload image kalau ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('menu_images', 'public');
        }

        Menu::create($validated);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu = Menu::findOrFail($id);

        // Update field basic
        $menu->name = $validated['name'];
        $menu->price = $validated['price'];
        $menu->category_id = $validated['category_id'];
        $menu->description = $validated['description'] ?? null;

        // Kalau ada image baru
        if ($request->hasFile('image')) {
            // Hapus image lama dulu
            if ($menu->image) {
                Storage::disk('public')->delete($menu->image);
            }

            $menu->image = $request->file('image')->store('menu_images', 'public');
        }

        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        if ($menu->image) {
            Storage::disk('public')->delete($menu->image);
        }

        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }
}
