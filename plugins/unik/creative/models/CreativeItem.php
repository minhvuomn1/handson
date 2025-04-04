<?php namespace Unik\Creative\Models;

use Model;

/**
 * Model
 */
class CreativeItem extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_creative_item';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
