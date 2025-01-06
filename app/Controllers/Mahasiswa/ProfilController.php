<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\StudentsModel;
use App\Models\StudentsCoursesModel;
use App\Models\CoursesModel;

class ProfilController extends BaseController
{
    public function index($studentId)
    {
    
        $studentsModel = new StudentsModel();
        $studentsCoursesModel = new StudentsCoursesModel();
        $mataKuliah = new CoursesModel();

        // Ambil data mahasiswa
        $student = $studentsModel->find($studentId);

        if (!$student) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Mahasiswa tidak ditemukan'
            ])->setStatusCode(404);
        }

        // Ambil data mata kuliah yang dipilih mahasiswa
        $mataKuliah = $studentsCoursesModel
            ->where('students_courses.student_id', $studentId)
            ->join('courses', 'students_courses.course_id = courses.id')
            ->select('courses.id, courses.course_name, courses.day, courses.start_time, courses.duration, courses.credits, students_courses.semester')
            ->findAll();
        
        // Data IPK berdasarkan semester
        $ip_per_semester = [];
        for ($i = 1; $i <= 8; $i++) {
            if ($student['ip_sem' . $i] > 0) {
                $ip_per_semester[] = [
                    'semester' => $i,
                    'ip' => $student['ip_sem' . $i]
                ];
            }
        }

        // Perhitungan IPK
        $totalIP = array_sum(array_column($ip_per_semester, 'ip'));
        $totalSemester = count($ip_per_semester);
        $ipk = $totalSemester > 0 ? round($totalIP / $totalSemester, 2) : 0;

        $data = [
            'student' => $student,
            'ip_per_semester' => $ip_per_semester,
            'ipk' => $ipk,
            'mataKuliah' => $mataKuliah
        ];

        return view('/profil', $data);
    }

       // Fungsi tambahan untuk menghitung IPK
    private function calculateIPK($student)
    {
        $totalSKS = 0;
        $totalPoints = 0;

        for ($i = 1; $i <= 8; $i++) {
            $ipKey = 'ip_sem' . $i;
            if (!empty($student[$ipKey])) {
                $totalPoints += $student[$ipKey] * 24; // Asumsi setiap semester 24 SKS
                $totalSKS += 24;
            }
        }

        return $totalSKS > 0 ? round($totalPoints / $totalSKS, 2) : 0;
    }     
    
    public function getGrafikIP($studentId)
    {
        $studentsModel = new StudentsModel();
        $student = $studentsModel->find($studentId);

        if (!$student) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Mahasiswa tidak ditemukan'
            ]);
        }

        $ipData = [];
        for ($i = 1; $i <= 8; $i++) {
            if ($student['ip_sem' . $i] > 0) {
                $ipData[] = [
                    'semester' => $i,
                    'ip' => $student['ip_sem' . $i]
                ];
            }
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $ipData
        ]);
    }
}
