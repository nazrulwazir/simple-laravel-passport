<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
    }

    /**
     * Register services.
     */
    public function register()
    {
        $repositories = config('repositories');

        foreach ($repositories as $key => $value) {
            $this->app
                ->when($value['when'])
                ->needs($value['needs'])
                ->give($value['give']);
        }
    }
}
