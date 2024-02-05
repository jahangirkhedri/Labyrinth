<?php

namespace App\Providers;

use App\Services\LabyrinthService;
use App\Services\LabyrinthServiceInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        App::bind(LabyrinthServiceInterface::class,LabyrinthService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
