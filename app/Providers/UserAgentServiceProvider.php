<?php

namespace App\Providers;

use App\Models\UserAgentStatistic;
use Illuminate\Support\ServiceProvider;

class UserAgentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('templates.user-agent', function ($view) {
            $view->with('data', UserAgentStatistic::get());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
