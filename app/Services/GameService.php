<?php

namespace App\Services;

use App\Repositories\Interfaces\GameRepositoryInterface;

class GameService
{
    public function __construct(
        private GameRepositoryInterface $gameRepository,
        private GameRelationValidationService $gameRelationValidationService
    ) { }

    public function getAllGames(array $data)
    {
        return $this->gameRepository->getAll();
    }

    public function getGamesByGenre($genreId) {
        return $this->gameRepository->findByGenre($genreId);
    }

    public function getGame(array $data)
    {
        $game = $this->gameRepository->getById($data["id"]);
        if (!$game) {
            return [
                "status" => 404,
                "data" => ["message" => "Not found"],
            ];
        }

        return [
            "data" => $game
        ];
    }

    public function createGame(array $data)
    {
        $relationValidationError = $this->gameRelationValidationService->validateRelations($data);
        if ($relationValidationError)
            return $relationValidationError;

        return [
            "data" => $this->gameRepository->create($data)
        ];
    }

    public function updateGame(array $data)
    {
        $relationValidationError = $this->gameRelationValidationService->validateRelations($data);
        if ($relationValidationError)
            return $relationValidationError;

        $updatedGame = $this->gameRepository->update($data["id"], $data);
        if (!$updatedGame) {
            return [
                "status" => 404,
                "data" => ["message" => "Not found"],
            ];
        }

        return [
            "data" => $updatedGame
        ];
    }

    public function deleteGame(array $data)
    {
        $this->gameRepository->delete($data["id"]);
        return [
            "status" => 204,
            "data" => null
        ];
    }
}
