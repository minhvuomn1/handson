<?php namespace Unik\Component\Components;

use Unik\Component\Models\HomeContent as HomeContentModel;
use Cms\Classes\ComponentBase;
use ApplicationException;

class HomeContent extends ComponentBase
{
    public $records;
    public function componentDetails()
    {
        return [
            'name'        => 'Home Content',
            'description' => 'Implements list Home Content.'
        ];
    }
    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->records = $this->getContent();
    }

    protected function getContent()
    {
        return HomeContentModel::get()->sortByDesc('sort_order');
    }    
}
