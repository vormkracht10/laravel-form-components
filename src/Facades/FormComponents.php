<?php

namespace Vormkracht10\FormComponents\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vormkracht10\FormComponents\FormComponents
 */
class FormComponents extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Vormkracht10\FormComponents\FormComponents::class;
    }
}
