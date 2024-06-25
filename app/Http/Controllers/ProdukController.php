<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $brand = brand::all();
        return view('produk.create', compact( 'brand'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required',
            'stock'=>'required',
            'harga' => 'required',
            'deskripsi_produk' => 'required',
            'id_brand' => 'required',
        ]);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->stock = $request->stock;
        $produk->harga = $request->harga;
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->id_brand = $request->id_brand;

        $produk->save();
        return redirect()->route('produk.index')
            ->with('success', 'data berhasil ditambahkan');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $brand = brand::all();
        return view('produk.edit', compact('produk',  'brand'));

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_produk' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'id_brand' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->stock = $request->stock;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->id_brand = $request->id_brand;

        $produk->save();
        return redirect()->route('produk.index')
            ->with('success', 'data berhasil diperbarui');

    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')
            ->with('success', 'data berhasil dihapus');
    }
}
