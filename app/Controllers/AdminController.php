<?php

namespace App\Controllers;

use App\Models\StudentsModel;
use App\Models\TeachersModel;

class AdminController extends BaseController
{
    public function inputMahasiswaView()
    {
        $studentsModel = new StudentsModel();
        $students = $studentsModel->findAll();
    
        return view('admin/input_mahasiswa', ['students' => $students]);
    }

    public function simpanMahasiswa()
    {
        $studentsModel = new StudentsModel();

        $data = [
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'semester' => $this->request->getPost('semester'),
        ];

        $studentsModel->insert($data);
        return redirect()->to('admin/input-mahasiswa');
    }

    public function deleteMahasiswa($no)
    {
        $studentsModel = new StudentsModel();
        $studentsModel->delete($no);

        return redirect()->to('admin/input-mahasiswa');
    }

    public function inputDosenView()
    {
        $teachersModel = new TeachersModel();
        $teachers = $teachersModel->findAll();
    
        return view('admin/input_dosen', ['teachers' => $teachers]);
    }

    public function simpanDosen()
    {
        $teacherModel = new TeachersModel();

        $data = [
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
        ];

        if ($teacherModel->insert($data)) {
            return redirect()->to('admin/input-dosen')->with('success', 'Data dosen berhasil disimpan.');
        } else {
            return redirect()->to('admin/input-dosen')->with('error', 'Gagal menyimpan data dosen.');
        }
        
    }

    public function deleteDosen($no)
    {
        $teachersModel = new TeachersModel();
        $teachersModel->delete($no);

        return redirect()->to('admin/input-dosen');
    }

    public function inputNilai()
    {
        $studentsModel = new StudentsModel();

        // Ambil semua data mahasiswa
        $students = $studentsModel->findAll();

        $data = [
            'students' => $students
        ];

        return view('admin/input_nilai', $data);
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
        return redirect()->to('/admin/input-nilai')->with('success', 'Nilai IP berhasil disimpan.');
    }
}
