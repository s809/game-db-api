<?php

namespace App\Repositories;

use App\Models\Genre;
use App\Repositories\Interfaces\GenreRepositoryInterface;

class GenreRepository implements GenreRepositoryInterface {
    public function getAll() {
        return Genre::query()->get();
    }

    public function getById($id) {
        return Genre::query()
            ->whereKey($id)
            ->first();
    }

    public function create(array $data) {
        return Genre::query()->create($data);
    }

    public function update($id, array $data) {
        return tap(Genre::firstWhere("id", $id))
            ->update($data);
    }

    public function delete($id) {
        return Genre::query()
            ->whereKey($id)
            ->delete();
    }
}
