<?php


namespace Tanthammar\LivewireAutoRoutes;


class RouteMaker
{
    public function __construct(
        public string $route,
        public array|string $middleware,
        public mixed $component,
        public string $name = '',
    )
    {
        return $this->makeRoute();
    }

    protected function makeRoute(): \Illuminate\Routing\Route|array
    {
        if(empty($this->name)) {
            $routeName = $this->route;

            //remove first forward slash
            if (\Str::startsWith($routeName, '/')) $routeName = \Str::replaceFirst('/', '', $routeName);

            //convert to .dot-named route
            $routeName = str_replace('/', '.', $routeName);
            $routeName = str_replace(['?', '{', '}'], '', $routeName);

        } else {
            $routeName = $this->name;
        }

        return \Illuminate\Support\Facades\Route::get($this->route, $this->component)
            ->middleware($this->middleware)
            ->name($routeName);
    }
}
