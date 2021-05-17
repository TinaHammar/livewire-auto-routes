<?php


namespace Tanthammar\LivewireAutoRoutes;

trait HasAuthRoute
{
    public function route(): \Illuminate\Routing\Route|array
    {
        return \Illuminate\Support\Facades\Route::get($this->authRoute, static::class)
            ->middleware('auth')
            ->name($this->authRoute);
    }
}
