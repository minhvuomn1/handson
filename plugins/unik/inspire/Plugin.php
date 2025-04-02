<?php namespace Unik\Inspire;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
        '\Unik\Inspire\Components\InspireView' => 'InspireView'
        ];
    }

    public function registerSettings()
    {
    }
}
