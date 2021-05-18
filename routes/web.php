<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Finder\Finder;

Route::middleware('web')->group(function () {
    $finder = new Finder();

    // find all files in app
    $finder->files()
        ->in(app_path())->name('*.php')
        ->contains('public function route()')
        ->contains('$authRoute')
        ->contains('$guestRoute');

    if ($finder->hasResults()) {
        foreach ($finder as $file) {

            $fileNameWithExtension = $file->getRelativePathname();

            //fix forward slash and remove .php file extension
            $component = str_replace(
                    ['/', '.php'],
                    ['\\', ''],
                    $fileNameWithExtension);

            //convert to class
            $component = resolve(app()->getNamespace() . $component);

            //add the route if it's a Livewire component
            if ($component instanceof \Livewire\Component && method_exists($component, 'route')) $component->route();
        }
    }
});
