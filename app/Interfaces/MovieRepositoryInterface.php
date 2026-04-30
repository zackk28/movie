<?php

namespace App\Interfaces;

interface MovieRepositoryInterface
{
    public function getAll();

    public function findById($id);

    public function create(array $data): bool;

    public function update($id, array $data): bool;

    public function delete($id): bool;
}
