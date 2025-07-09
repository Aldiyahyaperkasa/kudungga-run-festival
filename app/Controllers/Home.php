<?php

namespace App\Controllers;
use App\Models\PesertaModel;


class Home extends BaseController
{
    public function index(): string
    {
        $model = new PesertaModel();

        // Kuota awal kategori dan ukuran
        $kuotaKategori = [
            'Pelajar' => 200,
            'Umum' => 2000,
        ];

        $kuotaUkuran = [
            'S' => 500,
            'M' => 500,
            'L' => 500,
            'XL' => 500,
            'XXL' => 500,
        ];

        // Hitung sisa kuota kategori
        $sisaKategori = [];
        foreach ($kuotaKategori as $kategori => $kuotaAwal) {
            $terpakai = $model->where('kategori_lari', $kategori)
                ->whereIn('status_pendaftaran', ['Menunggu', 'Terkonfirmasi'])
                ->countAllResults();
            $sisaKategori[$kategori] = max(0, $kuotaAwal - $terpakai);
        }

        // Hitung sisa kuota ukuran
        $sisaUkuran = [];
        foreach ($kuotaUkuran as $ukuran => $kuotaAwal) {
            $terpakai = $model->where('ukuran_baju', $ukuran)
                ->whereIn('status_pendaftaran', ['Menunggu', 'Terkonfirmasi'])
                ->countAllResults();
            $sisaUkuran[$ukuran] = max(0, $kuotaAwal - $terpakai);
        }

        return view('home/index', [
            'sisaKategori' => $sisaKategori,
            'sisaUkuran' => $sisaUkuran,
        ]);
    }
}
