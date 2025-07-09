<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/gambar/event logo 1.png') ?>" type="image/x-icon">
    <title>Dashboard Admin - Kudungga Run Festival</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Vendor CSS Files -->
    <link
      href="<?= base_url() ?>assets/assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="<?= base_url() ?>assets/assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/assets/css/style.css" rel="stylesheet" />
  
  
  <style>    
    .text-orange { color: #ff6f00; }
    .btn-orange { background-color: #ff6f00; color: white; font-weight: bold; border-radius: 2rem; }
    .btn-orange:hover { background-color: #e65100; }
    .card { border-radius: 1rem; border: none; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
  </style>    
  </head>

  <body style="background-color: white;">
    <header id="header" class="header fixed-top d-flex align-items-center" style="background-color:#fff;">
      <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
        <img src="<?= base_url('assets/gambar/event logo 1.png') ?>" style="height: 100px;" alt="Logo">            
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>      
    </header>

    <aside id="sidebar" class="sidebar" style="background-color:#f97316;"> 
    <!-- pink = #f72585 -->
    <!-- biru muda = #0095D9 -->
    <!-- biru tua = #003366 -->
    <!-- kuning = #FFD700 -->
      <ul class="sidebar-nav" id="sidebar-nav">        
        <li class="nav-item" >
          <a class="nav-link" style="background-color:#f97316;" href="<?= site_url('/AdminController/index') ?>" >
            <i class="bi bi-grid text-light"></i>
            <span class="text-light">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" style="background-color:#f97316;" href="<?= base_url('/logout') ?>">
            <i class="bi bi-box-arrow-in-right text-light"></i>
            <span class="text-light">logout</span>
          </a>
        </li>
      </ul>
    </aside>

    <main id="main" class="main">
        <section class="section dashboard py-5">
            <div class="container">
            <h2 class="section-title text-center mb-5">Edit Data Peserta</h2>

            <div class="card p-4">
<form action="<?= base_url('dashboard-peserta/update-data') ?>" method="post">
  <?= csrf_field() ?>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label text-orange fw-bold">Nama Lengkap *</label>
      <input type="text" name="nama_peserta" class="form-control" value="<?= esc($peserta['nama_peserta']) ?>" required>
    </div>
    <div class="col-md-6">
      <label class="form-label text-orange fw-bold">Email *</label>
      <input type="email" name="email" class="form-control" value="<?= esc($peserta['email']) ?>" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label text-orange fw-bold">NIK *</label>
      <input type="text" name="nik" class="form-control" value="<?= esc($peserta['nik']) ?>" required>
    </div>
    <div class="col-md-6">
      <label class="form-label text-orange fw-bold">Tanggal Lahir *</label>
      <input type="date" name="tanggal_lahir" class="form-control" value="<?= esc($peserta['tanggal_lahir']) ?>" required>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label text-orange fw-bold">Jenis Kelamin *</label>
      <select name="jenis_kelamin" class="form-select" required>
        <option value="Laki-laki" <?= $peserta['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
        <option value="Perempuan" <?= $peserta['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label text-orange fw-bold">Usia *</label>
      <input type="number" name="usia" class="form-control" value="<?= esc($peserta['usia']) ?>" required>
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label text-orange fw-bold">Alamat Lengkap *</label>
    <textarea name="alamat" class="form-control" rows="2" required><?= esc($peserta['alamat']) ?></textarea>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label class="form-label text-orange fw-bold">No. Telepon *</label>
      <input type="text" name="no_telepon" class="form-control" value="<?= esc($peserta['no_telepon']) ?>" required>
    </div>
    <div class="col-md-6">
      <label class="form-label text-orange fw-bold">No. Telepon Darurat *</label>
      <input type="text" name="no_telepon_darurat_1" class="form-control" value="<?= esc($peserta['no_telepon_darurat_1']) ?>" required>
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label text-orange fw-bold">Riwayat Penyakit</label>
    <input type="text" name="riwayat_penyakit" class="form-control" value="<?= esc($peserta['riwayat_penyakit']) ?>">
  </div>

  <div class="mb-3">
    <label class="form-label text-orange fw-bold">Kategori Lari (tidak dapat diubah)</label>
    <input type="text" class="form-control" value="<?= esc($peserta['kategori_lari']) ?>" readonly>
  </div>

  <div class="mb-3">
    <label class="form-label text-orange fw-bold">Ukuran Baju (tidak dapat diubah)</label>
    <input type="text" class="form-control" value="<?= esc($peserta['ukuran_baju']) ?>" readonly>
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-orange w-50 py-3 mt-3">Simpan Perubahan</button>
  </div>
</form>
                
            </div>

            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/assets/js/main.js"></script>
  </body>
</html>
