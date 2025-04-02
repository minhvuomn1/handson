<?php namespace Unik\Component\Components;

use Unik\Inspire\Models\InspireCategory;
use Unik\Inspire\Models\InspireItem;
use Cms\Classes\ComponentBase;
use ApplicationException;

class HomeInspire extends ComponentBase
{
    public $records;
    public $orderRecords;
    public function componentDetails()
    {
        return [
            'name'        => 'Home Inspire',
            'description' => 'Implements list Home Inspire.'
        ];
    }
    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->records = $this->getContent();
        $this->orderRecords = $this->getContentOrder();
        
        // var_dump($this->orderRecords);die();
        // var_dump($this->records[1]->items );die();
    }

    protected function getContent()
    {
        // $InspireCategory = InspireCategory::get()->sortByDesc('sort_order');
        // foreach ($InspireCategory as $key => &$value) {
        //     $value->items = InspireItem::where('category_id',$value->id)->get()->sortByDesc('sort_order')->take(4);
        // }
        // return $InspireCategory;
        
        return InspireItem::whereIN('category_id',[2,4])->get()->sortByDesc('sort_order')->take(4);
        // return InspireItem::get()->sortByDesc('sort_order')->take(4);
    } 

    protected function getContentOrder()
    {
        $InspireCategory = InspireCategory::whereNotIn('id',[2,4])->get()->sortByDesc('sort_order');
        // $InspireCategory = InspireCategory::get()->sortByDesc('sort_order');
        foreach ($InspireCategory as $key => &$value) {
            $value->items = InspireItem::where('category_id',$value->id)->get()->sortByDesc('sort_order')->take(4);
        }
        return $InspireCategory;
    }      
}
