<?php namespace Unik\Scholarshipmanagement\Models;

use Model;

/**
 * School Model
 */
class School extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    public $table = 'unik_scholarshipmanagement_school';

    public $rules = [
        'name' => 'required'
    ];

    public $hasMany = [
        'students' => [
            'Unik\Scholarshipmanagement\Models\Student'
            
        ]
    ];
}