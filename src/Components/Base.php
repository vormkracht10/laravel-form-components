<?php

namespace Vormkracht10\FormComponents\Components;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use ReflectionClass;

class Base extends Component
{
    public function __construct()
    {
    }

    public function getViewFile(): string
    {
        return Str::slug((new ReflectionClass($this))->getShortName());
    }

    public function render()
    {
        $view = $this->getViewFile();

        if (! File::exists(__DIR__.'/../../resources/views/components/'.$view.'.blade.php')) {
            return 'Component view not found';
        }

        return view('form-components::components.'.$view);
    }
}
