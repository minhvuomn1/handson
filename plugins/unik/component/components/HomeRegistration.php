<?php namespace Unik\Component\Components;

// use Unik\Component\Models\HomeRegistration as HomeRegistrationModel;
use Cms\Classes\ComponentBase;
use ApplicationException;
use Unik\Component\Models\Settings as ComponentSettings;

class HomeRegistration extends ComponentBase
{
    public $record;
    public function componentDetails()
    {
        return [
            'name'        => 'Home Registration',
            'description' => 'Implements Home Registration.'
        ];
    }
    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->record = $this->getContent();
    }

    protected function getContent()
    {
        $settings = ComponentSettings::instance();
        // print($settings->image);die();
        return $settings;        
        // return HomeRegistrationModel::get()->sortByDesc('sort_order');
    }    
}
