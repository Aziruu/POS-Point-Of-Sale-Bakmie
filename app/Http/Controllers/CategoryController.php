<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Middleware\MiddlewareGroups;
use Illuminate\Routing\Controller as BaseController;

#[\Illuminate\Routing\Middleware\MiddlewareGroup('web')]
#[\Illuminate\Routing\Middleware\MiddlewareGroup('auth')]
#[\Illuminate\Routing\Middleware\Middleware('role:admin,kasir')]
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create($request->all());
        return redirect()->route(Auth::user()->role . '.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update($request->all());
        return redirect()->route(Auth::user()->role . '.categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route(Auth::user()->role . '.categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
