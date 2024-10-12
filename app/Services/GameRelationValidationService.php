<?php

namespace App\Services;

use App\Repositories\Interfaces\DeveloperRepositoryInterface;
use App\Repositories\Interfaces\GenreRepositoryInterface;

class GameRelationValidationService
{
    public function __construct(
        private DeveloperRepositoryInterface $developerRepository,
        private GenreRepositoryInterface $genreRepository,
    ) { }

    public function validateRelations(array $data)
    {
        if (!key_exists("developer_id", $data)) {
            return [
                "status" => 400,
                "data" => ["message" => "Developer ID is required"]
            ];
        }

        $developer = $this->developerRepository->getById($data["developer_id"]);
        if (!$developer) {
            return [
                "status" => 400,
                "data" => ["message" => "Developer ID {$data["developer_id"]} does not exist"]
            ];
        }

        if (key_exists("genre_ids", $data)) {
            foreach ($data["genre_ids"] as $genreId) {
                $genre = $this->genreRepository->getById($genreId);
                if (!$genre) {
                    return [
                        "status" => 400,
                        "data" => ["message" => "Genre ID $genreId does not exist"]
                    ];
                }
            }
        }

        return null;
    }
}
