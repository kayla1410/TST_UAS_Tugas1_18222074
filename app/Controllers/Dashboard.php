<?php

namespace App\Controllers;

use App\Models\StudentsModel;

class Dashboard extends BaseController
{
    public function mahasiswa()
    {
        $session = session();
        $username = $session->get('username');
        $id = $session->get('id');

        // Ambil data mahasiswa berdasarkan ID
        $studentsModel = new StudentsModel();
        $student = $studentsModel->find($id);

        if (!$student) {
            return redirect()->to('/login')->with('error', 'Mahasiswa tidak ditemukan');
        }

        $data = [
            'nama' => $student['nama'], // Ambil nama dari database students
            'nim' => $student['id'],
            'semester' => $student['semester']
        ];

        return view('dashboard/mahasiswa', $data);
    }

    public function admin()
    {
        $session = session();
        $data = [
            'username' => $session->get('username')
        ];

        return view('dashboard/admin', $data);
    }

    public function teacher()
    {
        $session = session();
        $data = [
            'username' => $session->get('username')
        ];

        return view('dashboard/teacher', $data);
    }
}
