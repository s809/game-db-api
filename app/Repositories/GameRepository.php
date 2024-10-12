<?php

namespace App\Repositories;

use App\Models\Game;
use App\Repositories\Interfaces\GameRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class GameRepository implements GameRepositoryInterface {
    public function getAll(): Collection {
        return Game::query()
            ->with(["developer", "genres"])
            ->get();
    }

    public function getById($id) {
        return Game::query()
            ->whereKey($id)
            ->with(["developer", "genres"])
            ->first();
    }

    public function findByGenre($genreId) {
        return Game::query()
            ->whereHas("genres", fn (Builder $q) => $q->whereKey($genreId))
            ->with(["developer", "genres"])
            ->get();
    }

    public function create(array $data) {
        $game = Game::query()
            ->create($data);

        if (key_exists("genre_ids", $data)) {
            $game->genres()->sync($data["genre_ids"]);
        }

        return $game->load(["developer", "genres"]);
    }

    public function update($id, array $data) {
        $game = tap(Game::firstWhere("id", $id))
            ->update($data);

        if (key_exists("genre_ids", $data)) {
            $game->genres()->sync($data["genre_ids"]);
        }

        return $game->load(["developer", "genres"]);
    }

    public function delete($id) {
        return Game::query()
            ->whereKey($id)
            ->delete();
    }
}
