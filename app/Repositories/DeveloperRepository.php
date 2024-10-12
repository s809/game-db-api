<?php

namespace App\Repositories;

use App\Models\Developer;
use App\Repositories\Interfaces\DeveloperRepositoryInterface;

class DeveloperRepository implements DeveloperRepositoryInterface {
    public function getAll() {
        return Developer::query()->get();
    }

    public function getById($id) {
        return Developer::query()
            ->whereKey($id)
            ->first();
    }

    public function create(array $data) {
        return Developer::query()->create($data);
    }

    public function update($id, array $data) {
        return tap(Developer::firstWhere("id", $id))
            ->update($data)
            ->first();
    }

    public function delete($id) {
        return Developer::query()
            ->whereKey($id)
            ->delete();
    }
}
