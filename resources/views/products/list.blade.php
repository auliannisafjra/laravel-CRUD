@extends('layouts.master')
@section('title', 'List Products')
@section('content')
    <div class="container bg-info p-3 my-5 rounded-3">
        <div class="row mx-3">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="d-flex justify-content-between align-items-center">
                <h2 style="border-bottom: 2px solid rgb(73, 73, 73);">Daftar Produk</h2>
                <div>
                    <a href="{{ route('products.profile', ['userId' => $userId]) }}" class="btn btn-primary ms-3"
                        style="font-weight: bold">Lihat
                        Profil</a>
                    <a href="{{ route('products.create', ['userId' => $userId]) }}" class="btn btn-dark ms-3"
                        style="font-weight: bold">Tambah
                        Produk</a>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary ms-3" style="font-weight: bold">Kembali
                        Ke Laman
                        Produk</a>
                </div>
            </div>

            <table class="table table-bordered table-striped bg-light text-center" style="margin-top: 20px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Stok</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration + $products->firstItem() - 1 }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->berat }}</td>
                            <td>Rp.
                                {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>
                                <button
                                    class="btn 
                                        {{ $item->kondisi == 'Baru' ? 'btn-outline-primary' : 'btn-outline-dark' }}">
                                    {{ $item->kondisi }}
                                </button>
                            </td>
                            </td>
                            <td>
                                <a href="{{ route('products.edit', ['userId' => $userId, 'id' => $item->id]) }}"
                                    class="btn btn-outline-warning">Edit</a>
                                <form action="{{ route('products.destroy', ['userId' => $userId, 'id' => $item->id]) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
