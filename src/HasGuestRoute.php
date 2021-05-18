<?php


namespace Tanthammar\LivewireAutoRoutes;

trait HasGuestRoute
{
    public function route(): RouteMaker
    {
        return new RouteMaker(route: $this->guestRoute, middleware: 'guest', component: static::class);
    }
}
