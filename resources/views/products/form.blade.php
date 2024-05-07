@extends('layouts.master')
@section('title', 'Form Product')
@section('content')
    <div class="container" style="max-width: 400px;">
        <div class="row">
            <div class="col rounded-3 bg-info p-3 my-2">
                <h2 class="text-center">Tambah Data Produk</h2>
                <form action="{{ route('products.store', ['userId' => $userId]) }}" method="POST">
                    @csrf()
                    <input type="hidden" name="userId" value="{{ $userId }}">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Gambar Produk</label>
                        <input type="text" class="form-control @if ($errors->has('foto')) is-invalid @endif"
                            id="foto" name="foto" placeholder="Masukkan Gambar Produk">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @if ($errors->has('nama')) is-invalid @endif"
                            id="nama" name="nama" placeholder="Masukkan Nama Produk">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="berat" class="form-label">Berat</label>
                        <input type="number" class="form-control @if ($errors->has('berat')) is-invalid @endif"
                            id="berat" name="berat" placeholder="Masukkan Berat Produk">
                        @error('berat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control @if ($errors->has('harga')) is-invalid @endif"
                            id="harga" name="harga" placeholder="Masukkan Harga Produk">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control @if ($errors->has('stok')) is-invalid @endif"
                            id="stok" name="stok" placeholder="Masukkan Stok Produk">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select @if ($errors->has('kondisi')) is-invalid @endif" name="kondisi"
                            id="kondisi">
                            <option value="0" disabled selected>Pilih kondisi Barang</option>
                            <option value="Baru">Baru</option>
                            <option value="Bekas">Bekas</option>
                        </select>
                        @error('kondisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @if ($errors->has('deskripsi')) is-invalid @endif" id="deskripsi"
                            rows="3"name="deskripsi" placeholder="Tuliskan Deskripsi Produk Yang Akan Dijual"></textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
