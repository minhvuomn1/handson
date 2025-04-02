<?php namespace Unik\Component\Components;

use Unik\Component\Models\Banner as HomeBannerModel;
use Cms\Classes\ComponentBase;
use ApplicationException;
use Config;
use Unik\Bloc\Models\BlocBanner;

class Banner extends ComponentBase
{
    public $records;
    public function componentDetails()
    {
        return [
            'name'        => 'Home Banner',
            'description' => 'Implements list Image.'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {        
        $url = $this->getRouter()->getUrl();

        //if (!strlen($url)) {
        //} 
        if ($url != '/') {
            $url = '/'.$url;
        }
            
        $this->records = $this->getContent($url); 
        // print_r($this->records[0]->attributes);die();
    }
    protected function getContent($url)
    {
        $data = BlocBanner::where('url',$url)->first();
        if ($data) {
            return $data->images;
        }
        return [];
        //return HomeBannerModel::get()->sortByDesc('sort_order');
    }      
}
