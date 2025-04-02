<?php namespace Unik\Inspire\Components;

use Unik\Inspire\Models\InspireCategory;
use Unik\Inspire\Models\InspireItem;
use Cms\Classes\ComponentBase;
use ApplicationException;
use Request;

class InspireView extends ComponentBase
{
    public $records;
    public $categories;
    public $category_id;
    public function componentDetails()
    {
        return [
            'name'        => 'Inspire',
            'description' => 'Implements list Inspire.'
        ];
    }
    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $page = Request::get('page', 1);
        $category = Request::get('category', null);
        $this->categories = $this->getCategories();
        if ($category == null && count($this->categories) > 0) {
            foreach ($this->categories as $key => $item) {
                $category = $item->id;
                break;
            }
        }
        $this->category_id = $category;
        $this->records = $this->getData($page,$category);
    }

    protected function getContent()
    {
        $InspireCategory = InspireCategory::get()->sortByDesc('sort_order');
        foreach ($InspireCategory as $key => &$value) {
            $value->items = InspireItem::where('category_id',$value->id)->get()->sortByDesc('sort_order')->take(4);
        }
        return $InspireCategory;
    }    

    protected function getCategories()
    {
        $InspireCategory = InspireCategory::get()->sortByDesc('sort_order');
        return $InspireCategory;
    }        
    protected function getData($page = 1,$category)
    {
        // $Inspires = InspireItem::paginate(9, $page)->sortByDesc('sort_order');
        $Inspires = InspireItem::where('category_id',$category)->paginate(9, $page);
        return $Inspires;
    }     
}
