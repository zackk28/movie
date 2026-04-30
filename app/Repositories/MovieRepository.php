<?php

namespace App\Repositories;

use App\Interfaces\MovieRepositoryInterface;
use App\Models\Movie;

class MovieRepository implements MovieRepositoryInterface
{
    public function getAll()
    {
        return Movie::paginate(10); // ← ganti dari all() ke paginate(10)
    }

    public function findById($id)
    {
        return Movie::findOrFail($id);
    }

    public function create(array $data): bool
    {
        return (bool) Movie::create($data);
    }

    public function update($id, array $data): bool
    {
        return (bool) Movie::where('id', $id)->update($data);
    }

    public function delete($id): bool
    {
        return (bool) Movie::destroy($id);
    }
}
