<?php namespace Unik\Scholarshipmanagement\Models;

use Model;

/**
 * Model
 */
class ScholarshipStudent extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    public $table = 'unik_scholarshipmanagement_scholarship_student';

    public $rules = [
        'student_id' => 'required|exists:unik_scholarshipmanagement_students,id',
        'scholarship_id' => 'required|exists:unik_scholarshipmanagement_scholarships,id',
    ];

    public $belongsTo = [
        'student' => [
            'Unik\Scholarshipmanagement\Models\Student'
        ],
        'scholarship' => [
            'Unik\Scholarshipmanagement\Models\Scholarships'
        ]
    ];
}