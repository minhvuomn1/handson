<?php namespace Unik\Component\Models;

use Model;

/**
 * Model
 */
class HomeContent extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    
    // const SORT_ORDER = 'sort_order';
    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_component_home_content';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
