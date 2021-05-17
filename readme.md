# livewire-auto-routes
Auto generate routes for Laravel Livewire Components.

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://img.shields.io/travis/tanthammar/livewire-auto-routes.svg?style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/tanthammar/livewire-auto-routes.svg?style=flat-square)](https://packagist.org/packages/tanthammar/livewire-auto-routes)

## Installation
``` 
composer require tanthammar/livewire-auto-routes
``` 

## Usage
You generate routes via traits or by adding a `route()` method to your Livewire component.


### Guest route
Applies the `guest` middleware.
<br>**The property is used to generate both the route name and url.**

```php 
use Tanthammar\LivewireAutoRoutes\HasGuestRoute;

class FooComponent 
{
    use HasGuestRoute;
    protected string $guestRoute = 'foo';
}
```

### Auth route
Applies the `auth` middleware.
<br>**The property is used to generate both the route name and url.**

```php 
use Tanthammar\LivewireAutoRoutes\HasAuthRoute;

class FooComponent 
{
    use HasAuthRoute;
    protected string $authRoute = 'foo';
}
```

### Custom route
* `use Illuminate\Support\Facades\Route`
* `route()`

```php
use Illuminate\Support\Facades\Route;

class FooComponent 
{
    public function route() //do not add any return type
    {
        return Route::get('foo', static::class)
            ->middleware('auth') //default middleware is 'web'
            ->name('foo');
    }
}
```


## Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security
If you discover any security-related issues, please open an issue.

## License
The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.
