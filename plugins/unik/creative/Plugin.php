<?php namespace Unik\Creative;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            '\Unik\Creative\Components\Items' => 'CreativeItems'
        ];          
    }

    public function registerSettings()
    {
    }
}
