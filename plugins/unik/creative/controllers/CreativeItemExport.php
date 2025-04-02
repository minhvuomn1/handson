<?php namespace Unik\Creative\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class CreativeItemExport extends Controller
{
    public $implement = [
        'Backend.Behaviors.ImportExportController'
    ];

    public $importExportConfig = 'config_import_export.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Unik.Creative', 'main-menu-item');
    }

}
