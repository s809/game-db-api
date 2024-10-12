<?php

namespace App\Http\Controllers;

use App\Services\DeveloperService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DeveloperController extends Controller
{
    public function __construct(
        protected DeveloperService $developerService
    ) {}

    public function getAllDevelopers(Request $request) {
        return response()->json($this->developerService->getAllDevelopers($request->all()));
    }

    public function getDeveloper(int $id) {
        return response()->json(...$this->developerService->getDeveloper(["id" => $id]));
    }

    public function createDeveloper(Request $request) {
        return response()->json(...$this->developerService->createDeveloper($request->all()));
    }

    public function updateDeveloper(Request $request, int $id) {
        return response()->json(...$this->developerService->updateDeveloper([
            "id" => $id,
            ...$request->all()
        ]));
    }

    public function deleteDeveloper(int $id) {
        return response()->json(...$this->developerService->deleteDeveloper(["id" => $id]));
    }
}
