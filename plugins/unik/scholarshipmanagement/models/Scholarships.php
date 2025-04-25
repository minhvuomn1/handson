<?php namespace Unik\Scholarshipmanagement\Models;

use Model;
/**
 * Model
 */
class Scholarships extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

 
    public $table = 'unik_scholarshipmanagement_scholarships';


    public $rules = [
        'name' => 'required',
        'type' => 'required',
        
        'sponsors_id' => 'required|exists:unik_scholarshipmanagement_sponsors,id',
    ];

    public $belongsTo = [
        'sponsors' => [
            'Unik\Scholarshipmanagement\Models\Sponsors',
            'key' => 'sponsors_id',
        ],
    ];

    public $belongsToMany = [
        'students' => [
            'Unik\Scholarshipmanagement\Models\Student',
            'table' => 'unik_scholarshipmanagement_scholarship_student',
            'pivot' => ['received_at', 'note'],
            'key' => 'scholarship_id',
            'otherKey' => 'student_id',
        ],
    ];
}