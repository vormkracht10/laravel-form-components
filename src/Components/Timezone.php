<?php

namespace Vormkracht10\FormComponents\Components;

class Timezone extends Base
{
    public string $prefix;

    public array $timezones;

    public function __construct()
    {
        $this->prefix = config('form-components.prefix');
        $this->timezones = $this->getTimezones();
    }

    public function getTimezones()
    {
        $zones = [];
        $timestamp = time();

        foreach (timezone_identifiers_list() as $zone) {
            date_default_timezone_set($zone);

            $zones[$zone] = $zone.' (GMT '.date('P', $timestamp).')';
        }

        return $zones;
    }
}
