# livewire-auto-routes
Auto generate routes for Laravel Livewire Components.

[![Latest Stable Version](https://poser.pugx.org/tanthammar/livewire-auto-routes/v)](//packagist.org/packages/tanthammar/livewire-auto-routes)
[![Latest Unstable Version](https://poser.pugx.org/tanthammar/livewire-auto-routes/v/unstable)](//packagist.org/packages/tanthammar/livewire-auto-routes)
[![Total Downloads](https://poser.pugx.org/tanthammar/livewire-auto-routes/downloads)](//packagist.org/packages/tanthammar/livewire-auto-routes)
[![GitHub issues](https://img.shields.io/github/issues/TinaHammar/livewire-auto-routes)](https://github.com/TinaHammar/livewire-auto-routes/issues)
[![GitHub stars](https://img.shields.io/github/stars/TinaHammar/livewire-auto-routes)](https://github.com/TinaHammar/livewire-auto-routes/stargazers)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

# Requirements
* Livewire 2
* Laravel 8
* php 8

# Installation
``` 
composer require tanthammar/livewire-auto-routes
``` 

# Routes in `web.php` takes precedence!
You can use web.php as normal. Routes declared in your Livewire components are registered after the routes in web.php.

# Usage
* You generate routes via traits or by adding a `route()` method to your Livewire component.
* Your Livewire components can exist in any folder inside the `app` namespace.
* If you don't add any of the traits or the `route()` method, the Livewire component is treated just as a normal component, thus ignored by this package.



### Guest route Trait
* Applies the `guest` middleware.
*  **The property is used to generate both the route name and url.**

```php 
use Tanthammar\LivewireAutoRoutes\HasGuestRoute;

class FooComponent extends \Livewire\Component
{
    use HasGuestRoute;
    
    protected string $guestRoute = '/foo/{id}/edit'; //route name becomes 'foo.id.edit'
}
```

### Auth route Trait
* Applies the `auth` middleware.
* **The property is used to generate both the route name and url.**

```php 
use Tanthammar\LivewireAutoRoutes\HasAuthRoute;

class FooComponent extends \Livewire\Component
{
    use HasAuthRoute;
    
    protected string $authRoute = '/foo/{name?}'; //route name becomes 'foo.name'
}
```

# Custom routes

### Option 1
Declare the route just like you would in `web.php`
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

### Option 2, use the RouteMaker
The RouteMaker can auto-generate the route name from the route definition, but it's optional.
```php
use Tanthammar\LivewireAutoRoutes\RouteMaker;

class FooComponent extends \Livewire\Component
{
    public function route(): RouteMaker
    {
        return new RouteMaker(
            route: 'users/{id}/edit', //if you omit $name, this route name will become 'users.id.edit'
            middleware: ['auth:sanctum', 'verified'],
            component: static::class,
            name: 'users.edit' //OPTIONAL, else $name will be generated from $route
        );
    }
}
```

# Routes are registered in alphabetical order!
Livewire component **FILES** are looped in alphabetical order in the `app namespace`.
One way to control the load order is to group your components in subfolders with suitable names
like `routeGroupA`, `routeGroupB`, where routes in _"routeGroup**A**"_ would be registered before _"routeGroup**B**"_.

# Example using the Traits
It's recommended to keep a controlled naming structure to avoid route conflicts. Use the `RouteMaker` if you want better naming.
<table>
<tr>
<th>Directory(asc) = load order</th><th>$authRoute or $guestRoute</th><th>Generated route name</th>
</tr>
<tr>
<td>App/Foo/Users/Create.php</td><th>users/create</th><td>users.create</td>
</tr>
<tr>
<td>App/Foo/Users/CustomStuff.php</td><th>users/custom-stuff/{id}</th><td>users.custom-stuff.id</td>
</tr>
<tr>
<td>App/Foo/Users/Delete.php</td><th>users/delete/{id}</th><td>users.delete.id</td>
</tr>
<tr>
<td>App/Foo/Users/Edit.php</td><th>users/edit/{id}</th><td>users.edit.id</td>
</tr>
<tr>
<td>App/Foo/Users/Index.php</td><th>users</th><td>users</td>
</tr>
<tr>
<td>App/Foo/Users/Show.php</td><th>users/{id}</th><td>users.id</td>
</tr>
</table>



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
