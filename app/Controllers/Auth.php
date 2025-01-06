<?php

namespace App\Controllers;

session()->start(); // Pastikan session dimulai

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function loginView()
    {
        return view('auth/login');
    }

    public function login()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        // Ambil user berdasarkan username
        $user = $model->where('username', $username)->first();
    
        if ($user) {
            // Cek password
            if (password_verify($password, $user['password'])) {
                // Set session jika login berhasil
                session()->set(['username' => $user['username'], 'role' => $user['role'], 'id' => $user['id']]);
    
                // Redirect ke dashboard sesuai role
                switch ($user['role']) {
                    case 'student':
                        return redirect()->to('/dashboard/mahasiswa');
                    case 'admin':
                        return redirect()->to('/dashboard/admin');
                    case 'teacher':
                        return redirect()->to('/dashboard/teacher');
                    default:
                        return redirect()->to('/login')->with('error', 'Invalid role');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }
    

    public function signupView()
    {
        return view('auth/signup');
    }

    public function signup()
    {
        $model = new UserModel();

        $data = [
            'id' => $this->request->getPost('id'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role' => $this->request->getPost('role')
        ];

        // Simpan user baru
        if ($model->save($data)) {
            return redirect()->to('/login')->with('success', 'Account created successfully. Please log in.');
        } else {
            return redirect()->back()->with('error', 'Failed to create account.');
        }
    }

    public function logout()
    {
        // Hapus session
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to('/login');
    }
}