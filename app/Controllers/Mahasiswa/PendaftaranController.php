<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\StudentsCoursesModel;
use App\Models\CoursesModel;

class PendaftaranController extends BaseController
{
    public function index()
    {
        $coursesModel = new CoursesModel();
        $courses = $coursesModel->findAll(); // Ambil semua data mata kuliah

        return view('pendaftaran_mata_kuliah', ['courses' => $courses]);
    }

    public function pilih()
    {
        $studentsCoursesModel = new StudentsCoursesModel();

        // Ambil ID mahasiswa dari session
        $studentId = session()->get('id');
        if (!$studentId) {
            return redirect()->back()->with('error', 'Anda belum login');
        }

        $courseId = $this->request->getPost('course_id');
        $semester = $this->request->getPost('semester');

        // Validasi data
        if (!$courseId || !$semester) {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        // Cek apakah mata kuliah sudah dipilih sebelumnya
        $exists = $studentsCoursesModel->where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->first();

        if ($exists) {
            return redirect()->back()->with('error', 'Mata kuliah sudah dipilih');
        }

        // Simpan data
        $data = [
            'student_id' => $studentId,
            'course_id' => $courseId,
            'semester' => $semester,
        ];

        if ($studentsCoursesModel->insert($data)) {
            return redirect()->back()->with('success', 'Mata kuliah berhasil dipilih');
        } else {
            return redirect()->back()->with('error', 'Gagal memilih mata kuliah');
        }
    }

    public function batal()
    {
        $studentsCoursesModel = new StudentsCoursesModel();

        // Ambil ID mahasiswa dari session
        $studentId = session()->get('id');
        if (!$studentId) {
            return redirect()->back()->with('error', 'Anda belum login');
        }

        $courseId = $this->request->getPost('course_id');

        if (!$courseId) {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        // Hapus data
        $studentsCoursesModel->where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->delete();

        return redirect()->back()->with('success', 'Mata kuliah berhasil dibatalkan');
    }
}
