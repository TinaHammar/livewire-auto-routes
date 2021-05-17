<?php


namespace Tanthammar\LivewireAutoRoutes;

use Illuminate\Support\Facades\Route;

trait HasGuestRoute
{
    public function route()
    {
        return Route::get($this->guestRoute, static::class)->middleware('guest')->name($this->guestRoute);
    }
}
