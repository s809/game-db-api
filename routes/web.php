<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;


Route::controller(GameController::class)->group(function () {
    Route::get('/games', "getAllGames");
    Route::post('/games', "createGame");
    Route::get('/games/{id}', "getGame");
    Route::patch('/games/{id}', "updateGame");
    Route::delete('/games/{id}', "deleteGame");
    Route::get('/games/by-genre/{id}', "getGamesByGenre");
});

Route::controller(GenreController::class)->group(function () {
    Route::get('/genres', "getAllGenres");
    Route::post('/genres', "createGenre");
    Route::get('/genres/{id}', "getGenre");
    Route::patch('/genres/{id}', "updateGenre");
    Route::delete('/genres/{id}', "deleteGenre");
});

Route::controller(DeveloperController::class)->group(function () {
    Route::get('/developers', "getAllDevelopers");
    Route::post('/developers', "createDeveloper");
    Route::get('/developers/{id}', "getDeveloper");
    Route::patch('/developers/{id}', "updateDeveloper");
    Route::delete('/developers/{id}', "deleteDeveloper");
});
