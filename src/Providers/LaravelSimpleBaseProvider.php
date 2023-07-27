<?php

namespace LaravelSimpleBases\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelSimpleBaseProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
