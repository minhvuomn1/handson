<?php namespace Unik\Component\Components;

use Unik\Creative\Models\CreativeItem;
use Cms\Classes\ComponentBase;
use ApplicationException;

class HomeCreative extends ComponentBase
{
    public $records;
    public $title;
    public $description;
    public function componentDetails()
    {
        return [
            'name'        => 'Home Content',
            'description' => 'Implements list Home Creative.'
        ];
    }
    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->title = $this->property('title');
        $this->description = $this->property('description')?$this->property('description'):'Không gian trải nghiệm kết nối cho gia đình ở thành phố';
        $this->records = $this->getContent();
    }

    protected function getContent()
    {
        return CreativeItem::get()->sortByDesc('sort_order')->take(3);
    }    
}
