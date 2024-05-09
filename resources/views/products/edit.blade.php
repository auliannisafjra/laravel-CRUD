@extends('layouts.master')
@section('title', 'Edit Product')
@section('content')
    <div class="container" style="max-width: 400px;">
        <div class="row">
            <div class="col rounded-3 bg-info p-3 my-2">
                <h2 class="text-center">Edit Data Produk</h2>
                <form action="{{ route('products.update', ['userId' => $userId, 'id' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf()
                    {{-- <input type="hidden" name="userId" value="{{ $userId }}"> --}}
                    <div class="mb-3">
                        <label for="foto" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                            name="foto" value="{{ old('foto', $product->foto) }}" placeholder="Masukkan Gambar Produk">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama', $product->nama) }}" placeholder="Masukkan Nama Produk">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="berat" class="form-label">Berat</label>
                        <input type="number" class="form-control @error('berat') is-invalid @enderror" id="berat"
                            name="berat" value="{{ old('berat', $product->berat) }}" placeholder="Masukkan Berat Produk">
                        @error('berat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                            name="harga" value="{{ old('harga', $product->harga) }}" placeholder="Masukkan Harga Produk">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok"
                            name="stok" value="{{ old('stok', $product->stok) }}" placeholder="Masukkan Stok Produk">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select @error('kondisi') is-invalid @enderror" name="kondisi" id="kondisi">
                            <option value="0" {{ old('kondisi', $product->kondisi) == '0' ? 'selected' : '' }}
                                disabled selected>Pilih kondisi Barang</option>
                            <option value="Baru" {{ old('kondisi', $product->kondisi) == 'Baru' ? 'selected' : '' }}>Baru
                            </option>
                            <option value="Bekas" {{ old('kondisi', $product->kondisi) == 'Bekas' ? 'selected' : '' }}>
                                Bekas</option>
                        </select>
                        @error('kondisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3" name="deskripsi"
                            placeholder="Tuliskan Deskripsi Produk Yang Akan Dijual">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
