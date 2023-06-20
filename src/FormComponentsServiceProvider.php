<?php

namespace Vormkracht10\FormComponents;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Vormkracht10\FormComponents\Commands\FormComponentsCommand;

class FormComponentsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-form-components')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-form-components_table')
            ->hasCommand(FormComponentsCommand::class);
    }
}
