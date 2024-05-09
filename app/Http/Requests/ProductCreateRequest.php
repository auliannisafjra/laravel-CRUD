<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kondisi' => ['required', 'in:Baru,Bekas'],
            'deskripsi' => 'required|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'foto.required' => 'Kolom Gambar Produk wajib diisi.',
            'foto.image' => 'Kolom Gambar Produk harus berupa gambar.',
            'foto.mimes' => 'Kolom Gambar Produk harus berupa file dengan format jpeg, png, atau jpg.',
            'foto.max' => 'Ukuran Gambar Produk tidak boleh lebih dari 2 MB.',
            'nama.required' => 'Kolom Nama Produk wajib diisi.',
            'berat.required' => 'Kolom Berat Produk wajib diisi.',
            'harga.required' => 'Kolom Harga Produk wajib diisi.',
            'stok.required' => 'Kolom Stok Produk wajib diisi.',
            'kondisi.required' => 'Kolom Kondisi Produk wajib diisi.',
            'kondisi.in' => 'Kolom Kondisi Produk harus diisi dengan Baru atau Bekas.',
            'deskripsi.required' => 'Kolom Deskripsi Produk wajib diisi.',
            'deskripsi.max' => 'Kolom Deskripsi Produk tidak boleh lebih dari 2000 karakter.',
        ];
    }
}
