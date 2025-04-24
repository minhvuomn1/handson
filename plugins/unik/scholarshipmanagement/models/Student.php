<?php namespace Unik\Scholarshipmanagement\Models;

use Model;

/**
 * Model
 */
class Student extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_scholarshipmanagement_students';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'dob' => 'required|date',
        'grade' => 'required|integer',
        'generation' => 'required',
        'location' => 'required',
    ];
     /**
     * @var array Relations
     */
    public $belongsTo = [
        'school' => [
            'Unik\Scholarshipmanagement\Models\School'
        ],
    ];

    public $belongsToMany = [
        'scholarships' => [
            'Unik\Scholarshipmanagement\Models\Scholarship',
            'table' => 'unik_scholarshipmanagement_scholarship_student',
            'pivot' => ['received_at', 'note'],
            'key' => 'student_id',
            'otherKey' => 'scholarship_id',
        ],
    ];
}