<?php

namespace App\Controllers;
use App\Models\PesertaModel;
use App\Models\AdminModel;

class AuthController extends BaseController
{
    public function loginForm()
    {
        return view('home/login');
    }

    public function login()
    {
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cek ke tabel peserta (login sebagai peserta)
        $pesertaModel = new PesertaModel();
        $peserta = $pesertaModel->where('email', $email)->first();
        if ($peserta) {
            if (password_verify($password, $peserta['password'])) {
                $session->set([
                    'isLoggedIn' => true,
                    'id_peserta' => $peserta['id_peserta'],
                    'nama' => $peserta['nama_peserta'],
                    'role' => 'peserta'
                ]);
                return redirect()->to('/dashboard-peserta');
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        }

        // Cek ke tabel admin (login sebagai admin)
        $adminModel = new AdminModel();
        $admin = $adminModel->where('email', $email)->first();
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $session->set([
                    'isLoggedIn' => true,
                    'id_admin' => $admin['id_admin'],
                    'nama' => $admin['nama_admin'],
                    'role' => 'admin'
                ]);
                return redirect()->to('/dashboard-admin');
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        }

        return redirect()->back()->with('error', 'Email tidak ditemukan.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
