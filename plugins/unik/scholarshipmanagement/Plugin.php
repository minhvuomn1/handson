<?php namespace Unik\Scholarshipmanagement;

use Unik\Scholarshipmanagement\Models\ScholarshipStudent;
use Unik\Scholarshipmanagement\Models\Student;
use Unik\Scholarshipmanagement\Models\Scholarships;
use Unik\Scholarshipmanagement\Models\School;
use Unik\Scholarshipmanagement\Models\Sponsors;
use Illuminate\Support\Facades\Route;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {  
    }

    public function registerSettings()
    {
    }
    public function boot()
    {
        Route::get('/api/students', function () {
            return Student::with('school')->get();
        });
        
        Route::get('/api/scholarships', function () {
            return Scholarships::with(['sponsors'])->get();
        });
        
        Route::get('/api/scholarship-students', function () {
            return ScholarshipStudent::with(['student.school', 'scholarship.sponsors'])->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                    'deleted_at' => $item->deleted_at,
                    'student_id' => $item->student_id,
                    'scholarship_id' => $item->scholarship_id,
                    'result_activity' => $item->result_activity,
                    'images' => $item->images->map(function ($img) {
                        return [
                            'url' => $img->getPath(),
                            'thumb' => $img->getThumb(300, 200, 'crop'),
                        ];
                    }),
                    'student' => [
                        'id' => $item->student->id,
                        'name' => $item->student->name,
                        'dob' => $item->student->dob,
                        'grade' => $item->student->grade,
                        'location' => $item->student->location,
                        'generation' => $item->student->generation,
                        'school_year' => $item->student->school_year,
                        'sex' => $item->student->sex,
                        'family_manner' => $item->student->family_manner,
                        'school' => $item->student->school, // Now includes full school info
                        'avt' => $item->student->avt ? $item->student->avt->getPath() : null,
                    ],
                    'scholarship' => [
                        'id' => $item->scholarship->id,
                        'name' => $item->scholarship->name,
                        'type' => $item->scholarship->type,
                        'sponsors_id' => $item->scholarship->sponsors_id,
                        'created_at' => $item->scholarship->created_at,
                        'updated_at' => $item->scholarship->updated_at,
                        'sponsors' => $item->scholarship->sponsors, // Now includes full sponsor info
                    ],
                ];
            });
        });
        
        Route::get('/api/schools', function () {
            return School::all();
        });
        
        Route::get('/api/sponsors', function () {
            return Sponsors::all();
        });
    }
}