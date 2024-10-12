<?php

namespace App\Http\Controllers;

use App\Services\GenreService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GenreController extends Controller
{
    public function __construct(
        protected GenreService $genreService
    ) {}

    public function getAllGenres(Request $request)
    {
        return response()->json($this->genreService->getAllGenres($request->all()));
    }

    public function getGenre(int $id)
    {
        return response()->json(...$this->genreService->getGenre(["id" => $id]));
    }

    public function createGenre(Request $request)
    {
        return response()->json(...$this->genreService->createGenre($request->all()));
    }

    public function updateGenre(Request $request, int $id)
    {
        return response()->json(...$this->genreService->updateGenre([
            "id" => $id,
            ...$request->all()
        ]));
    }

    public function deleteGenre(int $id)
    {
        return response()->json(...$this->genreService->deleteGenre(["id" => $id]));
    }
}
