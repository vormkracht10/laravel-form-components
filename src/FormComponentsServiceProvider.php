<?php

namespace Vormkracht10\FormComponents;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FormComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-form-components')
            ->hasConfigFile();

        $this->registerViewComponents();
    }

    public function registerViewComponents()
    {
        if (
            null !== $namespace = config('form-components.namespace.slug') &&
            config('form-components.namespace.separator') === '::'
        ) {
            dd($namespace);
            Blade::componentNamespace('Vormkracht10\\FormComponents\\Components', $namespace);
        } else {
            Storage::allFiles(__DIR__.'/Components')->each(function ($file) {
                $component = str_replace('.php', '', pathinfo($file, PATHINFO_FILENAME));

                $namespace = config('form-components.namespace.slug');

                if ($namespace !== null) {
                    $namespace .= config('form-components.namespace.separator');
                }

                Blade::component($namespace.$component, '\\Vormkracht10\\FormComponents\\Components\\'.$component);
            });
        }
    }
}
