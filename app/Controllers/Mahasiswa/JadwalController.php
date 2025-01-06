<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;

class JadwalController extends BaseController
{
    public function jadwalKuliah($studentId)
    {
        $studentsCoursesModel = new \App\Models\StudentsCoursesModel();

        // Ambil data jadwal mata kuliah berdasarkan mahasiswa
        $jadwal = $studentsCoursesModel
            ->where('students_courses.student_id', $studentId)
            ->join('courses', 'students_courses.course_id = courses.id')
            ->select('courses.course_name, courses.day, courses.start_time, courses.duration')
            ->findAll();

        // Kirim data ke view
        return view('jadwal_kuliah', ['jadwal' => $jadwal]);
    }
}
