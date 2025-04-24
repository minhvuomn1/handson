<?php namespace Unik\Scholarshipmanagement\Models;

use Model;

/**
 * Sponsor Model
 */
class Sponsor extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = false;

    public $table = 'unik_scholarshipmanagement_sponsors';

    public $rules = [
        'name' => 'required'
    ];

    public $hasMany = [
        'scholarships' => [
            'Unik\Scholarshipmanagement\Models\Scholarships'
        ]
    ];
}