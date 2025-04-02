<?php namespace Unik\Creative\Components;

use Unik\Creative\Models\CreativeItem;
use Cms\Classes\ComponentBase;
use ApplicationException;
use Request;

class Items extends ComponentBase
{
    public $records;
    public $sort;
    public $order;
    public $q;
    public $currentUrl;
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
        $page = Request::get('page', 1);
        $this->sort = Request::get('sort', 'DESC');
        $this->order = Request::get('order', 'name');
        $this->q = Request::get('q', '');
        $this->currentUrl = $this->pageUrl('');
        $this->records = $this->getData($page);
        // $this->records.appends(sort: $sort});
        // print_r($this->records);die();
    }

    protected function getContent()
    {
        return CreativeItem::get()->sortByDesc('sort_order')->take(4);
    }  
    protected function getData($page = 1)
    {
        if ($this->q) {
            $CreativeItem = CreativeItem::where('name', 'like', '%'.$this->q.'%')
            ->orWhere('description', 'like', '%'.$this->q.'%')
            ->orderBy($this->order, $this->sort)
            ->paginate(2, $page);
        }else{
            $CreativeItem = CreativeItem::orderBy($this->order, $this->sort)->paginate(6, $page);
        }
        
        return $CreativeItem;
    }       
}
