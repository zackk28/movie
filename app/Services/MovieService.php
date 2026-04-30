<?php

namespace App\Services;

use App\Interfaces\MovieRepositoryInterface;
use Illuminate\Support\Str;

class MovieService
{
    protected MovieRepositoryInterface $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    // Ambil semua data movie
    public function getAllMovies()
    {
        return $this->movieRepository->getAll(); // tidak perlu diubah
    }

    // Simpan movie baru
    public function storeMovie(array $data, $file): bool
    {
        $data['foto_sampul'] = $this->uploadPhoto($file);

        return $this->movieRepository->create($data);
    }

    // Upload foto sampul ke folder public/images
    private function uploadPhoto($file): string
    {
        $fileName = Str::uuid()->toString().'.jpg';
        $file->move(public_path('images'), $fileName);

        return $fileName;
    }
}
