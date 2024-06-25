<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::orderBy('id', 'desc')->get();
        return view('brand.index', compact('brand'));
    }

    public function create()
    {
        return view('brand.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_brand' => 'required|max:255',
            'email' => 'required',
        ]);

        $brand = new Brand();
        $brand->nama_brand = $request->nama_brand;
        $brand->email = $request->email;
        $brand->save();

        return redirect()->route('brand.index')
            ->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $brand = brand::findOrFail($id);
        return view('brand.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = brand::findOrFail($id);
        return view('brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_brand' => 'required|max:255',
            'email' => 'required',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->nama_brand = $request->nama_brand;
        $brand->email = $request->email;
        $brand->save();

        return redirect()->route('brand.index')
            ->with('success', 'data berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brand.index')
            ->with('success', 'data berhasil dihapus');
    }
}
