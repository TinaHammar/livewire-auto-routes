<?php


namespace Tanthammar\LivewireAutoRoutes;

trait HasAuthRoute
{
    public function route(): RouteMaker
    {
        return new RouteMaker(route: $this->authRoute, middleware: 'auth', component: static::class);
    }
}
