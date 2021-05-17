<?php

namespace Tanthammar\LivewireAutoRoutes;

use Illuminate\Support\ServiceProvider;

class LivewireAutoRoutesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
