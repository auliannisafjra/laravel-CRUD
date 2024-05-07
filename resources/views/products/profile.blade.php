@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="container my-3">
        <div class="d-flex align-items-center justify-content-center">
            <a href="{{ route('products.user', ['userId' => $userId]) }}" class="btn btn-success text-center"
                style="font-weight: bold">Kembali ke Halaman Admin</a>
        </div>

        <div class="row justify-content-center" style="margin-top: 50px">
            <div class="col-auto">
                <div class="border border-2 border-dark rounded p-3" style="width: 500px; height: 300px">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="d-flex flex-column">
                                <p class="m-0 py-1" style="font-weight: bold;">Nama Akun</p>
                                <p class="m-0 py-1" style="font-weight: bold;">Email</p>
                                <p class="m-0 py-1" style="font-weight: bold;">Gender</p>
                                <p class="m-0 py-1" style="font-weight: bold;">Umur</p>
                                <p class="m-0 py-1" style="font-weight: bold;">Tanggal Lahir</p>
                                <p class="m-0 py-1" style="font-weight: bold;">Alamat</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex flex-column">
                                <p class="m-0 py-1">{{ $user->nama }}</p>
                                <p class="m-0 py-1">{{ $user->email }}</p>
                                <p class="m-0 py-1">{{ $user->gender }}</p>
                                <p class="m-0 py-1">{{ $user->umur }} Tahun</p>
                                <p class="m-0 py-1">{{ $user->tgl_lahir }}</p>
                                <p class="m-0 py-1">{{ $user->alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                @foreach ($toko as $item)
                    <div class="border border-2 border-dark rounded p-3" style="width: 500px; height: 300px">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="m-0 py-1" style="font-weight: bold;">Nama Toko</p>
                                <p class="m-0 py-1" style="font-weight: bold;">Rate</p>
                                <p class="m-0 py-1" style="font-weight: bold;">Produk Terbaik</p>
                                <p class="m-0 py-1" style="font-weight: bold;">Deskripsi</p>
                            </div>
                            <div class="col-md-8">
                                <p class="m-0 py-1">{{ $item->nama_toko }}</p>
                                <p class="m-0 py-1">{{ $item->rate }}</p>
                                <p class="m-0 py-1">{{ $item->product->nama }}</p>
                                <p class="m-0 py-1">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
