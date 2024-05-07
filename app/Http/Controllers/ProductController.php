<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Toko;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function profile($userId)
    {
        $user = User::findOrFail($userId);
        $toko = Toko::all();

        return view('products.profile', compact('userId', 'user', 'toko'));
    }

    /**
     * Show list product user
     */
    public function user($userId)
    {
        $user = User::findOrFail($userId);
        $products = $user->products()->paginate(5);
        return view('products.list', compact('user', 'products', 'userId'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($userId)
    {
        return view('products.form', compact('userId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $userId)
    {
        //dd($request)->all();
        $request->validate([
            'foto' => 'required',
            'nama' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kondisi' => ['required', 'in:Baru,Bekas'],
            'deskripsi' => 'required',
        ], [
            'foto.required' => 'Kolom Gambar Produk wajib diisi.',
            'nama.required' => 'Kolom Nama Produk wajib diisi.',
            'berat.required' => 'Kolom Berat Produk wajib diisi.',
            'harga.required' => 'Kolom Harga Produk wajib diisi.',
            'stok.required' => 'Kolom Stok Produk wajib diisi.',
            'kondisi.required' => 'Kolom Kondisi Produk wajib diisi.',
            'deskripsi.required' => 'Kolom Deskripsi Produk wajib diisi.',
        ]);

        $product = new Product();
        $product->user_id = $userId;
        $product->foto = $request->foto;
        $product->nama = $request->nama;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->kondisi = $request->kondisi;
        $product->deskripsi = $request->deskripsi;
        $product->save();

        return redirect()->route('products.user', ['userId' => $userId])->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */

    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $userId)
    {
        $product = Product::find($userId);

        return view('products.edit', compact('product', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'required',
            'nama' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kondisi' => ['required', 'in:Baru,Bekas'],
            'deskripsi' => 'required',
        ], [
            'foto.required' => 'Kolom Gambar Produk wajib diisi.',
            'nama.required' => 'Kolom Nama Produk wajib diisi.',
            'berat.required' => 'Kolom Berat Produk wajib diisi.',
            'harga.required' => 'Kolom Harga Produk wajib diisi.',
            'stok.required' => 'Kolom Stok Produk wajib diisi.',
            'kondisi.required' => 'Kolom Kondisi Produk wajib diisi.',
            'deskripsi.required' => 'Kolom Deskripsi Produk wajib diisi.',
        ]);

        $product = Product::findOrFail($id);
        $product->foto = $request->foto;
        $product->nama = $request->nama;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->kondisi = $request->kondisi;
        $product->deskripsi = $request->deskripsi;
        $product->save();

        $userId = $product->user_id;

        return redirect()->route('products.user', ['userId' => $userId])->with('success', 'Produk berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $userId = $product->user_id;
        $product->delete();

        return redirect()->route('products.user', ['userId' => $userId])->with('success', 'Produk berhasil dihapus!');
    }
}
