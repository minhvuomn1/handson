<?php namespace Unik\Scholarshipmanagement\Components;

use Cms\Classes\ComponentBase;
use Unik\Scholarshipmanagement\Models\Student;
use Unik\Scholarshipmanagement\Models\Sponsors;
use Unik\Scholarshipmanagement\Models\School;
use Unik\Scholarshipmanagement\Models\Scholarships;
use Unik\Scholarshipmanagement\Models\ScholarshipStudent;
use Illuminate\Support\Facades\Log;

class ScholarshipComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Scholarship Component',
            'description' => 'Lấy dữ liệu từ các bảng và render'
        ];
    }

    public function onRun()
    {
        try {
      
            $students = Student::all();
            $sponsors = Sponsors::all();
            $schools = School::all();
            $scholarships = Scholarships::all();
            $scholarshipStudents = ScholarshipStudent::with(['student', 'scholarship'])->get();

          
            $this->page['students'] = $students;
            $this->page['sponsors'] = $sponsors;
            $this->page['schools'] = $schools;
            $this->page['scholarships'] = $scholarships;
            $this->page['scholarshipStudents'] = $scholarshipStudents;

          
            Log::info("Students: " . $students->count());
            Log::info("Sponsors: " . $sponsors->count());
            Log::info("Schools: " . $schools->count());
            Log::info("Scholarships: " . $scholarships->count());
            Log::info("ScholarshipStudents: " . $scholarshipStudents->count());

        } catch (\Exception $e) {
            Log::error('Lỗi khi lấy dữ liệu trong ScholarshipComponent: ' . $e->getMessage());
            $this->page['error_message'] = 'Không thể lấy dữ liệu. Vui lòng thử lại sau!';
        }
    }

    public function onGetScholarshipStudents()
    {
        try {
            // Lấy toàn bộ dữ liệu ScholarshipStudent kèm quan hệ
            $results = ScholarshipStudent::with([
                'student.school',
                'scholarship.sponsors'
            ])->get();

            Log::info("ScholarshipStudents found (no filter): " . $results->count());

            return ['data' => $results];
        } catch (\Exception $e) {
            Log::error('Lỗi khi lấy dữ liệu trong onGetScholarshipStudents: ' . $e->getMessage());
            return ['error' => 'Lỗi khi lấy dữ liệu. Vui lòng thử lại sau!'];
        }
    }
}