<?php

namespace App\Controllers;
use App\Models\PesertaModel;

class PesertaController extends BaseController
{
    public function index()
    {
        $session = session();
        $id_peserta = $session->get('id_peserta');

        $model = new PesertaModel();
        $peserta = $model->find($id_peserta);

        return view('peserta/dashboard', [
            'peserta' => $peserta,
        ]);
    }

public function edit()
{
    $session = session();
    $id_peserta = $session->get('id_peserta');

    $model = new PesertaModel();
    $peserta = $model->find($id_peserta);

    return view('peserta/edit', [
        'peserta' => $peserta,
    ]);
}


    public function uploadBukti()
    {
        $session = session();
        $id_peserta = $session->get('id_peserta');
        $file = $this->request->getFile('bukti_pembayaran');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/bukti', $newName);

            $model = new PesertaModel();
            $model->update($id_peserta, [
                'bukti_pembayaran' => $newName,
            ]);

            return redirect()->to('/dashboard-peserta')->with('success', 'Bukti pembayaran berhasil diupload.');
        }
        return redirect()->back()->with('error', 'Upload gagal.');
    }

    public function updateData()
    {
        $session = session();
        $id_peserta = $session->get('id_peserta');

        $model = new PesertaModel();
        $model->update($id_peserta, [
            'nama_peserta'         => $this->request->getPost('nama_peserta'),
            'email'                => $this->request->getPost('email'),
            'nik'                  => $this->request->getPost('nik'),
            'tanggal_lahir'        => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin'        => $this->request->getPost('jenis_kelamin'),
            'usia'                 => $this->request->getPost('usia'),
            'alamat'               => $this->request->getPost('alamat'),
            'no_telepon'           => $this->request->getPost('no_telepon'),
            'no_telepon_darurat_1' => $this->request->getPost('no_telepon_darurat_1'),
            'riwayat_penyakit'     => $this->request->getPost('riwayat_penyakit'),
        ]);

        return redirect()->to('/dashboard-peserta')->with('success', 'Data berhasil diperbarui.');
    }

}
