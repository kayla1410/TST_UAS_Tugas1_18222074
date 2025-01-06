<?php

namespace App\Controllers\Pendaftaran;

use App\Controllers\BaseController;
use App\Models\CoursesModel;
use App\Models\StudentsCoursesModel;

class MataKuliahController extends BaseController
{
    // 1. Melihat daftar mata kuliah
    public function index()
    {
        $model = new CoursesModel();
        $data = $model->findAll();

        return $this->response->setJSON($data);
    }

    // 2. Mendaftarkan mata kuliah
    public function tambah()
    {
        $studentId = $this->request->getPost('student_id');
        $courseId = $this->request->getPost('course_id');
        $semester = $this->request->getPost('semester');
    
        // Validasi field wajib
        if (!$studentId || !$courseId || !$semester) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Semua field wajib diisi'
            ])->setStatusCode(400);
        }
    
        $model = new StudentsCoursesModel();
        $model->insert([
            'student_id' => $studentId,
            'course_id' => $courseId,
            'semester' => $semester,
        ]);
    
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Mata kuliah berhasil ditambahkan'
        ]);
    }    

    // 3. Menghapus mata kuliah dari daftar pribadi
    public function hapus($id)
    {
        $enrollmentModel = new StudentsCoursesModel(); // Pastikan menggunakan model yang benar
        $data = $enrollmentModel->find($id);
    
        // Periksa apakah data ada
        if (!$data) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ])->setStatusCode(404);
        }
    
        // Hapus data
        $enrollmentModel->delete($id);
    
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Mata kuliah berhasil dihapus'
        ]);
    }
    
}
