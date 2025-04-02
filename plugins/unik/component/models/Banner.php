<?php namespace Unik\Component\Models;

use Model;

/**
 * Model
 */
class Banner extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_component_banner';

    // public $attachOne = [
    // 'image' => 'System\Models\File',
    // ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
