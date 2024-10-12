<?php

namespace App\Services;

use App\Repositories\Interfaces\DeveloperRepositoryInterface;

class DeveloperService
{
    public function __construct(
        private DeveloperRepositoryInterface $developerRepository
    ) { }

    public function getAllDevelopers(array $data)
    {
        return $this->developerRepository->getAll();
    }

    public function getDeveloper(array $data)
    {
        $developer = $this->developerRepository->getById($data["id"]);
        if (!$developer) {
            return [
                "status" => 404,
                "data" => ["message" => "Not found"],
            ];
        }

        return [
            "data" => $developer
        ];
    }

    public function createDeveloper(array $data)
    {
        return [
            "data" => $this->developerRepository->create($data)
        ];
    }

    public function updateDeveloper(array $data)
    {
        $updatedDeveloper = $this->developerRepository->update($data["id"], $data);
        if (!$updatedDeveloper) {
            return [
                "status" => 404,
                "data" => ["message" => "Not found"],
            ];
        }

        return [
            "data" => $updatedDeveloper
        ];
    }

    public function deleteDeveloper(array $data)
    {
        $this->developerRepository->delete($data["id"]);
        return [
            "status" => 204,
            "data" => null
        ];
    }
}
