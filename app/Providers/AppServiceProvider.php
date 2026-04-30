<?php

namespace App\Providers;

use App\Interfaces\MovieRepositoryInterface;
use App\Repositories\MovieRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bind Interface ke Implementasi
        $this->app->bind(
            MovieRepositoryInterface::class,
            MovieRepository::class,
        );
    }

    public function boot(): void
    {
        //
    }
}
