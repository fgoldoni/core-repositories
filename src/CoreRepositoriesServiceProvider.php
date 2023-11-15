<?php

namespace Goldoni\CoreRepositories;

use Illuminate\Support\ServiceProvider;

class CoreRepositoriesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/core-repositories.php', 'core-repositories');

        $this->publishes([
            __DIR__.'/../config/core-repositories.php' => config_path('core-repositories.php')
        ], 'core-repositories-config');
    }

    public function boot(): void
    {
        //
    }
}
