<?php

namespace App\Http\Controllers;

use App\Services\GameService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GameController extends Controller
{
    public function __construct(
        protected GameService $gameService
    ) {}

    public function getAllGames(Request $request)
    {
        return response()->json($this->gameService->getAllGames($request->all()));
    }

    public function getGamesByGenre(int $genreId)
    {
        return response()->json($this->gameService->getGamesByGenre($genreId));
    }

    public function getGame(int $id)
    {
        return response()->json(...$this->gameService->getGame(["id" => $id]));
    }

    public function createGame(Request $request)
    {
        return response()->json(...$this->gameService->createGame($request->all()));
    }

    public function updateGame(Request $request, int $id)
    {
        return response()->json(...$this->gameService->updateGame([
            "id" => $id,
            ...$request->all()
        ]));
    }

    public function deleteGame(int $id)
    {
        return response()->json(...$this->gameService->deleteGame(["id" => $id]));
    }
}
