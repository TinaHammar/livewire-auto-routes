# livewire-auto-routes
Auto generate routes for Laravel Livewire Components.

[![Latest Stable Version](https://poser.pugx.org/tanthammar/livewire-auto-routes/v)](//packagist.org/packages/tanthammar/livewire-auto-routes)
[![GitHub issues](https://img.shields.io/github/issues/TinaHammar/livewire-auto-routes)](https://github.com/TinaHammar/livewire-auto-routes/issues)
[![GitHub stars](https://img.shields.io/github/stars/TinaHammar/livewire-auto-routes)](https://github.com/TinaHammar/livewire-auto-routes/stargazers)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/tanthammar/livewire-auto-routes.svg?style=flat-square)](https://packagist.org/packages/tanthammar/livewire-auto-routes)

# Installation
``` 
composer require tanthammar/livewire-auto-routes
``` 

# Routes in `web.php` takes precedence!
You can use web.php as normal. Routes declared in your Livewire components are registered after the routes in web.php. 

# Routes are registered in alphabetical order!
Livewire component **FILES** are looped in alphabetical order in the `app namespace`. One way to control the load order is to group your components in subfolders with suitable names like `routeGroupA`, `routeGroupB`, where routes in "routeGroup**A**" would be registered before "routeGroup**B**".

# Usage
* You generate routes via traits or by adding a `route()` method to your Livewire component.
* Your Livewire components can exist in any folder inside the `app` namespace.
* If you don't add any of the traits or the `route()` method, the Livewire component is treated just as a normal component, thus ignored by this package.



### Guest route Trait
* Applies the `guest` middleware.
*  **The property is used to generate both the route name and url.**
* Used for "plainly" named routes like 'users'

```php 
use Tanthammar\LivewireAutoRoutes\HasGuestRoute;

class FooComponent extends \Livewire\Component
{
    use HasGuestRoute;
    
    protected string $guestRoute = 'foo';
}
```

### Auth route Trait
* Applies the `auth` middleware.
* **The property is used to generate both the route name and url.** 
* Used for "plainly" named routes like 'users'

```php 
use Tanthammar\LivewireAutoRoutes\HasAuthRoute;

class FooComponent extends \Livewire\Component
{
    use HasAuthRoute;
    
    protected string $authRoute = 'foo';
}
```

### Custom route
* `use Illuminate\Support\Facades\Route` and add a `route()` method to your component. 
* Use this method when you need  `/` slashes or `{optional?}` parameters.

```php
use Illuminate\Support\Facades\Route;

class FooComponent extends \Livewire\Component
{
    public function route(): \Illuminate\Routing\Route|array
    {
        return Route::get('foo', static::class)
            ->middleware('auth') //default middleware is 'web'
            ->name('foo');
    }
}
```

### 💬 Let's connect
Discuss with other tall-form users on the official Livewire Discord channel.
You'll find me in the "partners/tall-forms" channel.

* [🔗 **Discord**](https://discord.gg/livewire)
* [🔗 **Twitter**](https://twitter.com/TinaHammar)
* [🔗 **Youtube**](https://www.youtube.com/channel/UCRPTsZ2OduwzGq3EdiynY2Q)
* [🔗 **Devdojo**](https://devdojo.com/tinahammar)

### Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security
If you discover any security-related issues, please open an issue.

### License
The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.
