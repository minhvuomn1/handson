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
        return \ScholarshipManagement\Models\Student::with('school')->get();
    });

    Route::get('/api/scholarships', function () {
        return \ScholarshipManagement\Models\Scholarships::with(['sponsor'])->get();
    });

    Route::get('/api/scholarship-students', function () {
        return \ScholarshipManagement\Models\ScholarshipStudent::with(['student', 'scholarship'])->get();
    });

    Route::get('/api/schools', function () {
        return \ScholarshipManagement\Models\School::all();
    });

    Route::get('/api/sponsors', function () {
        return \ScholarshipManagement\Models\Sponsors::all();
    });
    }
}