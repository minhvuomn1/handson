<?php namespace Unik\Bloc\Models;

use Model;

/**
 * Model
 */
class XSTPhuongphap extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_bloc_xst_phuong_phap';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
