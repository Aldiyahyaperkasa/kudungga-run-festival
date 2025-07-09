<?php

namespace App\Controllers;
use App\Models\PesertaModel;

class PendaftaranController extends BaseController
{
    protected $kuotaKategori = [
        'Pelajar' => 200,
        'Umum' => 2000,
    ];

    protected $kuotaUkuran = [
        'S' => 500,
        'M' => 500,
        'L' => 500,
        'XL' => 500,
        'XXL' => 500,
    ];
        
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

        $kategori = $this->request->getPost('kategori_lari');
        $ukuran = $this->request->getPost('ukuran_baju');

        // Hitung total pendaftar kategori yang masih Menunggu atau Terkonfirmasi
        $pendaftarKategori = $model->where('kategori_lari', $kategori)
            ->whereIn('status_pendaftaran', ['Menunggu', 'Terkonfirmasi'])
            ->countAllResults();

        // Hitung total pendaftar ukuran baju yang masih Menunggu atau Terkonfirmasi
        $pendaftarUkuran = $model->where('ukuran_baju', $ukuran)
            ->whereIn('status_pendaftaran', ['Menunggu', 'Terkonfirmasi'])
            ->countAllResults();

        // Cek kuota kategori
        if ($pendaftarKategori >= $this->kuotaKategori[$kategori]) {
            return redirect()->back()->withInput()->with('errors', ['kategori_lari' => 'Kuota kategori ' . $kategori . ' sudah habis.']);
        }

        // Cek kuota ukuran
        if ($pendaftarUkuran >= $this->kuotaUkuran[$ukuran]) {
            return redirect()->back()->withInput()->with('errors', ['ukuran_baju' => 'Kuota ukuran baju ' . $ukuran . ' sudah habis.']);
        }

        // Insert data jika kuota masih ada
        $model->insert([
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'nama_peserta' => $this->request->getPost('nama_peserta'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'alamat' => $this->request->getPost('alamat'),
            'nik' => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'kategori_lari' => $kategori,
            'ukuran_baju' => $ukuran,
            'usia' => $this->request->getPost('usia'),
            'no_telepon_darurat_1' => $this->request->getPost('no_telepon_darurat_1'),
            'riwayat_penyakit' => $this->request->getPost('riwayat_penyakit'),
            'bukti_pembayaran' => '',
        ]);

        return redirect()->to('/#pendaftaran')->with('success', 'Pendaftaran berhasil! Silakan login dan lengkapi bukti pembayaran di dashboard.');
    }

}
