<?php namespace Unik\News\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class NewsItem extends Controller
{
    public $implement = [        
        'Backend\Behaviors\ListController',        
        'Backend\Behaviors\FormController',
        // \Backend\Behaviors\RelationController::class    
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Unik.News', 'main-menu-item', 'side-menu-item2');
    }
}
