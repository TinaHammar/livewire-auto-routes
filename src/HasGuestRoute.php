<?php


namespace Tanthammar\LivewireAutoRoutes;

trait HasGuestRoute
{
    public function route(): \Illuminate\Routing\Route|array
    {
        return \Illuminate\Support\Facades\Route::get($this->guestRoute, static::class)
            ->middleware('guest')
            ->name($this->guestRoute);
    }
}
