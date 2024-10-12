<?php

namespace App\Services;

use App\Repositories\Interfaces\GenreRepositoryInterface;

class GenreService
{
    public function __construct(
        private GenreRepositoryInterface $genreRepository
    ) { }

    public function getAllGenres(array $data)
    {
        return $this->genreRepository->getAll();
    }

    public function getGenre(array $data)
    {
        $genre = $this->genreRepository->getById($data["id"]);
        if (!$genre) {
            return [
                "status" => 404,
                "data" => ["message" => "Not found"],
            ];
        }

        return [
            "data" => $genre
        ];
    }

    public function createGenre(array $data)
    {
        return [
            "data" => $this->genreRepository->create($data)
        ];
    }

    public function updateGenre(array $data)
    {
        $updatedGenre = $this->genreRepository->update($data["id"], $data);
        if (!$updatedGenre) {
            return [
                "status" => 404,
                "data" => ["message" => "Not found"],
            ];
        }

        return [
            "data" => $updatedGenre
        ];
    }

    public function deleteGenre(array $data)
    {
        $this->genreRepository->delete($data["id"]);
        return [
            "status" => 204,
            "data" => null
        ];
    }
}
