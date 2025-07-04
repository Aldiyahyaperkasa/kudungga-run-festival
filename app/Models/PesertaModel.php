<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table = 'peserta';
    protected $primaryKey = 'id_peserta';

    protected $allowedFields = [
        'email',
        'password',
        'nama_peserta',
        'tanggal_lahir',
        'no_telepon',
        'alamat',
        'nik',
        'jenis_kelamin',
        'kategori_lari',
        'ukuran_baju',
        'usia',
        'no_telepon_darurat_1',
        'riwayat_penyakit',
        'bukti_pembayaran',
        'status_pendaftaran',
        'kode_unik_peserta',
        'tanggal_daftar',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'tanggal_daftar';
    protected $updatedField = 'updated_at';
}
