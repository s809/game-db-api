<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface GameRepositoryInterface {
    public function getAll(): Collection;

    public function getById($id);

    public function findByGenre($genreId);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
