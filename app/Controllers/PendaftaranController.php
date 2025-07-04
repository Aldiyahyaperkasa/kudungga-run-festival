<?php

namespace App\Controllers;
use App\Models\PesertaModel;

class PendaftaranController extends BaseController
{
    public function simpan()
    {

        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required',
            'nama_peserta' => 'required',
            'tanggal_lahir' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'kategori_lari' => 'required',
            'ukuran_baju' => 'required',
            'usia' => 'required|integer',
            'no_telepon_darurat_1' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new PesertaModel();
        $model->insert([
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'nama_peserta' => $this->request->getPost('nama_peserta'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'alamat' => $this->request->getPost('alamat'),
            'nik' => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'kategori_lari' => $this->request->getPost('kategori_lari'),
            'ukuran_baju' => $this->request->getPost('ukuran_baju'),
            'usia' => $this->request->getPost('usia'),
            'no_telepon_darurat_1' => $this->request->getPost('no_telepon_darurat_1'),
            'riwayat_penyakit' => $this->request->getPost('riwayat_penyakit'),
            'bukti_pembayaran' => '', // dikosongkan dulu
        ]);

        return redirect()->to('/#pendaftaran')->with('success', 'Pendaftaran berhasil! Silakan login dan lengkapi bukti pembayaran di dashboard.');
    }
}
