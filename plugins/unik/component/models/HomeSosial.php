<?php namespace Unik\Component\Models;

use Model;

/**
 * Model
 */
class HomeSosial extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_component_sosial';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
