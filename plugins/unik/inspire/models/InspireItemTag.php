<?php namespace Unik\Inspire\Models;

use Model;

/**
 * Model
 */
class InspireItemTag extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_inspire_item_tags';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
