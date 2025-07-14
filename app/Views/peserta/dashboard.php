<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/gambar/icon.jpeg') ?>" type="image/x-icon">
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
    body {
      background: #f5f5f5;
      font-family: 'Segoe UI', sans-serif;
    }
    .section-title {
      color: #ff6f00;
      font-weight: 800;
    }
    .btn-orange {
      background-color: #ff6f00;
      color: white;
      font-weight: bold;
      border-radius: 2rem;
      transition: 0.3s;
    }
    .btn-orange:hover {
      background-color: #e65100;
    }
    .card {
      border-radius: 1rem;
      border: 1px solid #ff6f00;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .text-orange {
      color: #ff6f00;
    }
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
          <h2 class="section-title text-center mb-5">Data Pendaftaran</h2>

          <?php if ($peserta['bukti_pembayaran'] == '' && $peserta['status_pendaftaran'] == 'Menunggu'): ?>
            <!-- Kondisi 1: Form Upload Bukti Pembayaran -->
            <div class="card p-4">
              <h4 class="mb-3 text-orange">Informasi Pembayaran</h4>
              <p class="text-muted">
                Silakan transfer biaya pendaftaran sebesar <strong>Rp50.000</strong> ke:
                <br><strong>Bank BCA 123456789 a.n Kudungga Run Festival</strong>
                <br>atau e-wallet <strong>DANA 081234567890</strong>.
                <br>Setelah transfer, segera upload bukti pembayaran Anda.
              </p>
              <form action="<?= base_url('dashboard-peserta/upload-bukti') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3">
                  <label class="form-label fw-bold text-orange">Upload Bukti Pembayaran *</label>
                  <input type="file" name="bukti_pembayaran" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-orange w-100 py-3">Upload Bukti Pembayaran</button>
              </form>
            </div>

          <?php elseif ($peserta['bukti_pembayaran'] != '' && $peserta['status_pendaftaran'] == 'Menunggu'): ?>
            <!-- Kondisi 2: Data Peserta + Tombol Edit -->
            <div class="card p-4">
              <h4 class="mb-4 text-orange">Informasi Data Anda</h4>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label text-orange fw-bold">Nama Lengkap</label>
                  <input type="text" class="form-control" value="<?= esc($peserta['nama_peserta']) ?>" readonly>
                </div>
                <div class="col-md-6">
                  <label class="form-label text-orange fw-bold">Email</label>
                  <input type="email" class="form-control" value="<?= esc($peserta['email']) ?>" readonly>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label text-orange fw-bold">NIK</label>
                  <input type="text" class="form-control" value="<?= esc($peserta['nik']) ?>" readonly>
                </div>
                <div class="col-md-6">
                  <label class="form-label text-orange fw-bold">Tanggal Lahir</label>
                  <input type="text" class="form-control" value="<?= esc(date('d-m-Y', strtotime($peserta['tanggal_lahir']))) ?>" readonly>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-4">
                  <label class="form-label text-orange fw-bold">Jenis Kelamin</label>
                  <input type="text" class="form-control" value="<?= esc($peserta['jenis_kelamin']) ?>" readonly>
                </div>
                <div class="col-md-4">
                  <label class="form-label text-orange fw-bold">Usia</label>
                  <input type="text" class="form-control" value="<?= esc($peserta['usia']) ?>" readonly>
                </div>
                <div class="col-md-4">
                  <label class="form-label text-orange fw-bold">Kategori Lari</label>
                  <input type="text" class="form-control" value="<?= esc($peserta['kategori_lari']) ?>" readonly>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label text-orange fw-bold">Alamat Lengkap</label>
                <textarea class="form-control" rows="2" readonly><?= esc($peserta['alamat']) ?></textarea>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label text-orange fw-bold">No. Telepon</label>
                  <input type="text" class="form-control" value="<?= esc($peserta['no_telepon']) ?>" readonly>
                </div>
                <div class="col-md-6">
                  <label class="form-label text-orange fw-bold">No. Telepon Darurat</label>
                  <input type="text" class="form-control" value="<?= esc($peserta['no_telepon_darurat_1']) ?>" readonly>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label text-orange fw-bold">Ukuran Baju</label>
                <input type="text" class="form-control" value="<?= esc($peserta['ukuran_baju']) ?>" readonly>
              </div>

              <div class="mb-3">
                <label class="form-label text-orange fw-bold">Riwayat Penyakit</label>
                <input type="text" class="form-control" value="<?= esc($peserta['riwayat_penyakit']) ?>" readonly>
              </div>

              <div class="text-center">
                <a href="<?= base_url('dashboard-peserta/edit') ?>" class="btn btn-orange w-50 py-3 mt-3">Edit Data</a>
              </div>
            </div>


<?php elseif ($peserta['status_pendaftaran'] == 'Terkonfirmasi'): ?>
  <!-- Kondisi 3: Terkonfirmasi - Tampilkan Data Lengkap + QR + Tiket -->
  <div class="card p-4">
    <div class="text-center">
      <p class="text-orange fw-bold mb-2">Scan Kode QR Saat Pengambilan Race Pack</p>
      <img src="<?= base_url('kodeqr/qr_' . $peserta['kode_unik_peserta'] . '.png') ?>" alt="QR Code"
           style="width:150px; height:150px; border: 2px solid #ff6f00; border-radius: 8px;">
      <p class="fw-bold mt-2"><?= esc('QR-' . $peserta['kode_unik_peserta']) ?></p>

      <a href="<?= base_url('tiket/tiket_' . $peserta['kode_unik_peserta'] . '.pdf') ?>" 
         class="btn btn-orange w-50 py-3 mt-3" target="_blank">
        Download Tiket
      </a>
    </div>

    <hr class="my-4">

    <h4 class="mb-4 text-orange">Informasi Data Anda</h4>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label text-orange fw-bold">Nama Lengkap</label>
        <input type="text" class="form-control" value="<?= esc($peserta['nama_peserta']) ?>" readonly>
      </div>
      <div class="col-md-6">
        <label class="form-label text-orange fw-bold">Email</label>
        <input type="email" class="form-control" value="<?= esc($peserta['email']) ?>" readonly>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label text-orange fw-bold">NIK</label>
        <input type="text" class="form-control" value="<?= esc($peserta['nik']) ?>" readonly>
      </div>
      <div class="col-md-6">
        <label class="form-label text-orange fw-bold">Tanggal Lahir</label>
        <input type="text" class="form-control" value="<?= esc(date('d-m-Y', strtotime($peserta['tanggal_lahir']))) ?>" readonly>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-4">
        <label class="form-label text-orange fw-bold">Jenis Kelamin</label>
        <input type="text" class="form-control" value="<?= esc($peserta['jenis_kelamin']) ?>" readonly>
      </div>
      <div class="col-md-4">
        <label class="form-label text-orange fw-bold">Usia</label>
        <input type="text" class="form-control" value="<?= esc($peserta['usia']) ?>" readonly>
      </div>
      <div class="col-md-4">
        <label class="form-label text-orange fw-bold">Kategori Lari</label>
        <input type="text" class="form-control" value="<?= esc($peserta['kategori_lari']) ?>" readonly>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label text-orange fw-bold">Alamat Lengkap</label>
      <textarea class="form-control" rows="2" readonly><?= esc($peserta['alamat']) ?></textarea>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label text-orange fw-bold">No. Telepon</label>
        <input type="text" class="form-control" value="<?= esc($peserta['no_telepon']) ?>" readonly>
      </div>
      <div class="col-md-6">
        <label class="form-label text-orange fw-bold">No. Telepon Darurat</label>
        <input type="text" class="form-control" value="<?= esc($peserta['no_telepon_darurat_1']) ?>" readonly>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label text-orange fw-bold">Ukuran Baju</label>
      <input type="text" class="form-control" value="<?= esc($peserta['ukuran_baju']) ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label text-orange fw-bold">Riwayat Penyakit</label>
      <input type="text" class="form-control" value="<?= esc($peserta['riwayat_penyakit']) ?>" readonly>
    </div>
  </div>
<?php else: ?>
  <div class="alert alert-success text-center">
    Status Pendaftaran: <?= esc($peserta['status_pendaftaran']) ?>
  </div>
<?php endif; ?>



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
