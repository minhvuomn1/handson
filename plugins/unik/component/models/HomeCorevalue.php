<?php namespace Unik\Component\Models;

use Model;

/**
 * Model
 */
class HomeCorevalue extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_component_corevalue';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
