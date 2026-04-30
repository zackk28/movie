<?php

namespace AppHttpRequests;

class StoreMovieRequest extends FormRequest
{
    // Bolehkan semua user akses request ini
    public function authorize(): bool
    {
        return true;
    }

    // Aturan validasi data movie
    public function rules(): array
    {
        return [
            'id' => ['required', 'string', 'max:255',
                Rule::unique('movies', 'id')],
            'judul' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'sinopsis' => 'required|string',
            'tahun' => 'required|integer',
            'pemain' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    // Pesan error dalam Bahasa Indonesia
    public function messages(): array
    {
        return [
            'judul.required' => 'Judul film wajib diisi.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori tidak ditemukan.',
            'sinopsis.required' => 'Sinopsis wajib diisi.',
            'tahun.required' => 'Tahun rilis wajib diisi.',
            'tahun.integer' => 'Tahun harus berupa angka.',
            'pemain.required' => 'Nama pemain wajib diisi.',
            'foto_sampul.required' => 'Foto sampul wajib diupload.',
            'foto_sampul.image' => 'File harus berupa gambar.',
            'foto_sampul.mimes' => 'Format gambar: jpeg, png, jpg, gif, svg.',
            'foto_sampul.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
