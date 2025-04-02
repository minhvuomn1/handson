<?php namespace Unik\News;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
        '\Unik\News\Components\NewsView' => 'NewsView'
        ];        
    }

    public function registerSettings()
    {
    }
}
