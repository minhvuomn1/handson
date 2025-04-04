<?php namespace Unik\Creative\Models;

use Model;

/**
 * Model
 */
class Register extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_creative_register';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
