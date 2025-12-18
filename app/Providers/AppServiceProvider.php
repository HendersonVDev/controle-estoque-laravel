<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 🔹 Força o uso do estilo Bootstrap na paginação
        Paginator::useBootstrapFive();
        // Se seu template for Bootstrap 4, use:
        // Paginator::useBootstrapFour();
    }
}
