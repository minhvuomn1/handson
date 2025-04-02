<?php namespace Unik\News\Components;

use Unik\News\Models\NewsCategory;
use Unik\News\Models\NewsItem;
use Cms\Classes\ComponentBase;
use ApplicationException;
use Request;

class NewsView extends ComponentBase
{
    public $records;
    public function componentDetails()
    {
        return [
            'name'        => 'News',
            'description' => 'Implements list News.'
        ];
    }
    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $page = Request::get('page', 1);
        $this->records = $this->getData($page);
    }

    protected function getContent()
    {
        $NewsCategory = NewsCategory::get()->sortByDesc('sort_order');
        foreach ($NewsCategory as $key => &$value) {
            $value->items = NewsItem::where('category_id',$value->id)->get()->sortByDesc('sort_order')->take(4);
        }
        return $NewsCategory;
    }    
    protected function getData($page = 1)
    {
        // $Inspires = InspireItem::paginate(9, $page)->sortByDesc('sort_order');
        $News = NewsItem::paginate(9, $page);
        return $News;
    }    

    public function getHotNews()
    {
        $NewsItem = NewsItem::where('is_hot',1)->get()->take(4);
        return $NewsItem;
    }

}
