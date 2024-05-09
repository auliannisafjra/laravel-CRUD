<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
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
    public function store(ProductCreateRequest $request, $userId)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('katalog', 'public');
        }

        $product = new Product();
        $product->user_id = $userId;
        $product->foto = $imagePath;
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
    public function update(ProductCreateRequest $request, $id)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('katalog', 'public');
        }

        $product = Product::findOrFail($id);
        $product->foto = $imagePath;
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
