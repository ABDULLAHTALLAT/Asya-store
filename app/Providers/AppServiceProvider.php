<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    // Nothing to register.
    public function register(): void {}

    // Use simple pagination markup that matches our CSS.
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
