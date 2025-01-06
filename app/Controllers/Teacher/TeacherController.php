<?php

namespace App\Controllers\Teacher;

use App\Controllers\BaseController;
use App\Models\StudentsModel;

class TeacherController extends BaseController
{
    public function inputNilai()
    {
        $studentsModel = new StudentsModel();

        // Ambil semua data mahasiswa
        $students = $studentsModel->findAll();

        $data = [
            'students' => $students
        ];

        return view('teacher/input_nilai', $data);
    }

    public function simpanNilai()
    {
        $studentsModel = new \App\Models\StudentsModel();
    
        // Ambil data input dari form
        $studentsData = $this->request->getPost('students');
    
        // Validasi input
        if (!is_array($studentsData)) {
            return redirect()->back()->with('error', 'Tidak ada data yang dikirim.');
        }
    
        foreach ($studentsData as $studentId => $data) {
            // Validasi bahwa semester dan IP diisi
            if (!empty($data['semester']) && !empty($data['ip'])) {
                $semesterKey = 'ip_sem' . $data['semester']; // Tentukan kolom berdasarkan semester
    
                // Update database
                $studentsModel->update($studentId, [
                    $semesterKey => $data['ip'] // Masukkan IP ke kolom yang sesuai
                ]);
            }
        }
    
        // Redirect dengan pesan sukses
        return redirect()->to('/teacher/input-nilai')->with('success', 'Nilai IP berhasil disimpan.');
    }    
    
}
