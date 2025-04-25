<?php namespace Unik\Scholarshipmanagement\Models;

use Model;

/**
 * Model
 */
class Sponsors extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_scholarshipmanagement_sponsors';

    /**
     * @var array Validation rules
     */
    public $rules = [
         'name' => 'required'
    ];
    public $hasMany = [
        'scholarships' => [
            'Unik\Scholarshipmanagement\Models\Scholarships'
        ]
    ];
}