<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Services\MovieService;

class MovieController extends Controller
{
    protected MovieService $movieService;

    // Inject MovieService lewat constructor
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    // Tampilkan semua movie
    public function index()
    {
        $movies = $this->movieService->getAllMovies();

        return view('homepage', compact('movies'));
    }

    // Form tambah movie
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('input', compact('categories'));
    }

    // Simpan movie baru
    public function store(StoreMovieRequest $request)
    {
        $this->movieService->storeMovie(
            $request->except('foto_sampul'),
            $request->file('foto_sampul')
        );

        return redirect('/')->with('success', 'Film berhasil ditambahkan.');
    }
}
