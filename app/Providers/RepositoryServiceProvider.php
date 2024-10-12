<?php

namespace App\Providers;

use App\Repositories\DeveloperRepository;
use App\Repositories\GameRepository;
use App\Repositories\GenreRepository;
use App\Repositories\Interfaces\DeveloperRepositoryInterface;
use App\Repositories\Interfaces\GameRepositoryInterface;
use App\Repositories\Interfaces\GenreRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GameRepositoryInterface::class, GameRepository::class);
        $this->app->bind(GenreRepositoryInterface::class, GenreRepository::class);
        $this->app->bind(DeveloperRepositoryInterface::class, DeveloperRepository::class);
    }
}
