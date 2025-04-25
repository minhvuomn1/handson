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

    /**
     * @var string The database table used by the model.
     */
    public $table = 'unik_scholarshipmanagement_scholarships';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'type' => 'required',
        'sponsors_id' => 'required|exists:unik_scholarshipmanagement_sponsors,id',
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'sponsors' => [
            'Unik\Scholarshipmanagement\Models\Sponsors'
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