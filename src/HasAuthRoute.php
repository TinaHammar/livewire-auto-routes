<?php


namespace Tanthammar\LivewireAutoRoutes;

use Illuminate\Support\Facades\Route;

trait HasAuthRoute
{
    public function route()
    {
        return Route::get($this->authRoute, static::class)->middleware('auth')->name($this->authRoute);
    }
}
