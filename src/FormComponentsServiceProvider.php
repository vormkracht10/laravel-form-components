<?php

namespace Vormkracht10\FormComponents;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FormComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('form-components')
            ->hasViews('form-components')
            ->hasConfigFile();
    }

    public function packageRegistered()
    {
        if (
            $this->app->config['form-components.namespace.slug'] !== null &&
            $this->app->config['form-components.namespace.separator'] === '::'
        ) {
            Blade::componentNamespace('Vormkracht10\\FormComponents\\Components', $this->app->config['form-components.namespace.slug']);
        } else {
            collect(File::allFiles(__DIR__.'/Components'))->each(function ($file) {
                $component = Str::slug(str_replace('.php', '', pathinfo($file, PATHINFO_FILENAME)));
                $namespace = '';

                $namespace = $this->app->config['form-components.namespace.slug'];

                if ($namespace !== null) {
                    $namespace .= config('form-components.namespace.separator');
                }

                $this->app->config->set('form-components.prefix', $namespace);

                Blade::component($namespace.$component, '\\Vormkracht10\\FormComponents\\Components\\'.ucfirst($component));
            });
        }
    }
}
