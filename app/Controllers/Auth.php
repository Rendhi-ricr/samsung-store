<?php

namespace App\Controllers;

use App\Models\UserModels;

class Auth extends BaseController
{
    public function index()
    {
        return view('login.php');
    }

    public function login()
    {
        // Ambil data dari form login
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Panggil model untuk melakukan pengecekan login
        $usermodel = new UserModels();
        $user = $usermodel->where('email', $email)->first();

        // Jika user ditemukan
        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Simpan data user ke dalam session
                $session = session();
                $session->set([
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'alamat' => $user['alamat'],
                    'role' => $user['role'],
                    'isLoggedIn' => true
                ]);

                $session->setFlashdata('welcome', 'Selamat Datang, ' . $user['nama']);

                // Cek role dan arahkan ke halaman yang sesuai
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin'); // Halaman dashboard untuk admin
                } elseif ($user['role'] === 'pelanggan') {
                    return redirect()->to('/home'); // Halaman home untuk pelanggan
                }
            } else {
                // Password salah
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            // User tidak ditemukan
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }


    public function tambah()
    {
        // Tampilkan halaman registrasi
        return view('register.php');
    }

    public function register()
    {
        $userModel = new UserModels();

        // Ambil data dari form registrasi
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role'     => 2, // Default role
        ];

        // Validasi password dan confirm password
        $confirmPassword = $this->request->getPost('confirm_password');
        if ($data['password'] !== $confirmPassword) {
            return redirect()->back()->withInput()->with('error', 'Password dan konfirmasi password tidak cocok.');
        }

        // Enkripsi password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Simpan data ke database
        if ($userModel->save($data)) {
            return redirect()->to('/auth')->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            // Ambil error dari validasi model
            $errors = $userModel->errors();
            return redirect()->back()->withInput()->with('error', implode(', ', $errors));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth');
    }
}
