<?php
namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\CoursesModel;
use App\Models\StudentsCoursesModel;

class IPController extends BaseController
{
    public function generatorView()
    {
        $coursesModel = new CoursesModel();
        $studentId = session()->get('id'); // ID mahasiswa dari session

        // Ambil mata kuliah yang diambil mahasiswa
        $courses = $coursesModel->select('courses.id, courses.course_name, courses.credits')
                                ->join('students_courses', 'students_courses.course_id = courses.id')
                                ->where('students_courses.student_id', $studentId)
                                ->findAll();

        return view('mahasiswa/ip_generator', ['courses' => $courses]);
    }

    public function generateIP()
    {
        $grades = $this->request->getPost('grades');
        $totalCredits = 0;
        $totalWeightedGrade = 0;
    
        foreach ($grades as $courseId => $grade) {
            $course = (new CoursesModel())->find($courseId);
            if ($course) {
                $credits = $course['credits'];
                $totalCredits += $credits;
                $totalWeightedGrade += $grade * $credits;
            }
        }
    
        $ip = $totalWeightedGrade / $totalCredits;
    
        return view('mahasiswa/ip_result', ['ip' => number_format($ip, 2)]);
    }
}