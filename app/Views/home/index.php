<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kudungga Run Festival 2025</title>
  <link rel="icon" href="<?= base_url('assets/gambar/icon.jpeg') ?>" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

  <style>
    body 
    { 
      font-family: 'Poppins', sans-serif; 
      margin: 0;
      padding: 0;
    }
    .bg-orange 
    { 
      background-color: #f97316; 
    }
    .text-orange 
    { 
      color: #f97316; 
    }


  .hero {
    position: relative;
    background: url('<?= base_url("assets/gambar/bg-banner.png") ?>') top center / cover no-repeat;
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    overflow: hidden;
    z-index: 1;
  }
  .hero img {
    max-height: 250px;
    margin-bottom: 20px;
  }
  .countdown-card {
    position: absolute;
    bottom: 20px; /* lebih ke bawah untuk menjorok ke section berikutnya */
    left: 50%;
    transform: translateX(-50%);
    background: white;
    color: black;
    padding: 30px;
    border-radius: 20px;
    max-width: 90%;
    width: 600px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    text-align: center;
    z-index: 2;
  }
  .countdown-card .btn-orange {
    background-color: #f97316;
    color: white;
    font-weight: bold;
    margin-top: 20px;
    border: none;
    transition: background-color 0.3s;
  }
  .countdown-card .btn-orange:hover {
    background-color: #fb923c;
  }
  .section-denah {
    background-color: #f97316;
    padding: 160px 20px 60px; /* padding atas besar agar card tidak terpotong */
    text-align: center;
    color: white;
    position: relative;
    z-index: 0;
  }
  .section-denah .card {
    max-width: 800px;
    margin: 0 auto;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
  }





    .btn-orange 
    {
      background-color: #f97316;
      border: none;
      transition: background-color 0.3s;
    }
    .btn-orange:hover {
      background-color: #fb923c;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-white shadow fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold text-orange" href="#">
          <img src="<?= base_url('assets/gambar/event logo 1.png') ?>" alt="Sponsor 1" class="img-fluid" style="max-height:50px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav gap-3">
          <li class="nav-item"><a class="nav-link text-orange fw-bold" href="#home">Jadwal</a></li>
          <li class="nav-item"><a class="nav-link text-orange fw-bold" href="#sponsor">Sponsor</a></li>
          <li class="nav-item"><a class="nav-link text-orange fw-bold" href="#galeri">Galeri</a></li>
          <li class="nav-item"><a class="nav-link text-orange fw-bold" href="#pendaftaran">Pendaftaran</a></li>
          <li class="nav-item">
            <a class="btn btn-login nav-link text-orange fw-bold" href="<?= base_url('login'); ?>">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
<!-- HERO BANNER -->
<section class="hero">
  <div class="container">
    <img src="<?= base_url('assets/gambar/event logo 2.png') ?>" alt="Logo Kudungga Run" class="img-fluid">
  </div>
</section>

<!-- CARD COUNTDOWN DI LUAR SECTION HERO, AGAR TIDAK TERPOTONG -->
<div class="countdown-card">
  <p class="fw-bold fs-4 mb-3">Sangatta, 01 September 2025</p>
  <div id="countdown" class="fs-2 fw-bold mb-3">00:00:00</div>
  <a href="#pendaftaran" class="btn btn-orange btn-lg">Daftar Sekarang</a>
</div>

<!-- DENAH LOKASI -->
<section class="section-denah bg-white" id="denah">
  <div class="container">
    <h2 class="fw-bold mb-4 text-orange">Denah Lokasi</h2>
    <div class="card shadow">
      <img src="<?= base_url('assets/gambar/denah.png') ?>" alt="Denah Lokasi Kudungga Run" class="img-fluid">
    </div>
  </div>
</section>

  <!-- Sponsor -->
  <section class="py-5 bg-white text-center" id="sponsor">
    <div class="container">
      <h2 class="fw-bold mb-4 text-orange">Sponsor</h2>
      <div class="row justify-content-center align-items-center g-4">
        <div class="col-6 col-md-2"><img src="<?= base_url('assets/gambar/event logo 1.png') ?>" alt="Sponsor 1" class="img-fluid"></div>
        <div class="col-6 col-md-2"><img src="<?= base_url('assets/gambar/event logo 1.png') ?>" alt="Sponsor 2" class="img-fluid"></div>
        <div class="col-6 col-md-2"><img src="<?= base_url('assets/gambar/event logo 1.png') ?>" alt="Sponsor 3" class="img-fluid"></div>
      </div>
    </div>
  </section>

  <!-- Galeri -->
  <section class="py-5 bg-orange text-white text-center" id="galeri">
    <div class="container">
      <h2 class="fw-bold mb-4">Galeri Event</h2>
      <div class="row g-3">
        <div class="col-6 col-md-4"><img src="<?= base_url('assets/gambar/event logo 2.png') ?>" class="img-fluid rounded shadow"></div>
        <div class="col-6 col-md-4"><img src="<?= base_url('assets/gambar/event logo 2.png') ?>" class="img-fluid rounded shadow"></div>
        <div class="col-6 col-md-4"><img src="<?= base_url('assets/gambar/event logo 2.png') ?>" class="img-fluid rounded shadow"></div>
      </div>
    </div>
  </section>

  <!-- Racepack (Swiper Slider) -->
  <section class="py-5 bg-white text-center" id="racepack">
    <div class="container">
      <h2 class="fw-bold mb-4 text-orange">Race Pack</h2>
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img src="<?= base_url('assets/gambar/event logo 1.png') ?>" class="img-fluid" alt="Racepack 1"></div>
          <div class="swiper-slide"><img src="<?= base_url('assets/gambar/event logo 1.png') ?>" class="img-fluid" alt="Racepack 2"></div>
          <div class="swiper-slide"><img src="<?= base_url('assets/gambar/event logo 1.png') ?>" class="img-fluid" alt="Racepack 3"></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <!-- Pendaftaran -->
  <section class="py-5 bg-orange text-white text-center" id="pendaftaran">
    <div class="container">
      <h2 class="fw-bold mb-4">Formulir Pendaftaran</h2>
      <form action="<?= base_url('pendaftaran/simpan') ?>" method="post" enctype="multipart/form-data" class="bg-white rounded-4 p-5 shadow-lg mx-auto text-start" style="max-width: 700px;">
        <div class="mb-4">
          <label class="form-label fw-bold text-orange">Email *</label>
          <input type="email" name="email" class="form-control form-control-lg border-2" placeholder="contoh@email.com" required>
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold text-orange">Password *</label>
          <input type="password" name="password" class="form-control form-control-lg border-2" placeholder="Password aman Anda" required>
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold text-orange">Nama Lengkap *</label>
          <input type="text" name="nama_peserta" class="form-control form-control-lg border-2" placeholder="Nama lengkap sesuai KTP" required>
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold text-orange">Tanggal Lahir *</label>
          <input type="date" name="tanggal_lahir" class="form-control form-control-lg border-2" required>
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold text-orange">No. Telepon *</label>
          <input type="tel" name="no_telepon" class="form-control form-control-lg border-2" placeholder="08XXXXXXXXXX" required>
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold text-orange">Alamat Lengkap *</label>
          <textarea name="alamat" class="form-control form-control-lg border-2" rows="3" placeholder="Alamat lengkap Anda" required></textarea>
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold text-orange">NIK *</label>
          <input type="text" name="nik" class="form-control form-control-lg border-2" placeholder="Nomor Induk Kependudukan" required>
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold text-orange">Jenis Kelamin *</label>
          <select name="jenis_kelamin" class="form-select form-select-lg border-2" required>
            <option value="" selected disabled>Pilih Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>

    <div class="mb-4">
      <label class="form-label fw-bold text-orange">Kategori Lari *</label>
      <select name="kategori_lari" class="form-select form-select-lg border-2" required>
        <option value="" selected disabled>Pilih Kategori</option>
        <?php foreach ($sisaKategori as $kategori => $sisa): ?>
          <option value="<?= $kategori ?>">
            <?= $kategori ?> (Tersisa <?= $sisa ?>)
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-4">
      <label class="form-label fw-bold text-orange">Ukuran Baju *</label>
      <select name="ukuran_baju" class="form-select form-select-lg border-2" required>
        <option value="" selected disabled>Pilih Ukuran</option>
        <?php foreach ($sisaUkuran as $ukuran => $sisa): ?>
          <option value="<?= $ukuran ?>">
            <?= $ukuran ?> (Tersisa <?= $sisa ?>)
          </option>
        <?php endforeach; ?>
      </select>
    </div>


        <div class="mb-4">
          <label class="form-label fw-bold text-orange">Usia *</label>
          <input type="number" name="usia" class="form-control form-control-lg border-2" placeholder="Usia Anda" required>
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold text-orange">No. Telepon Darurat *</label>
          <input type="tel" name="no_telepon_darurat_1" class="form-control form-control-lg border-2" placeholder="Nomor yang dapat dihubungi dalam keadaan darurat" required>
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold text-orange">Riwayat Penyakit (Opsional)</label>
          <input type="text" name="riwayat_penyakit" class="form-control form-control-lg border-2" placeholder="Contoh: Asma, Alergi">
        </div>

        <button type="submit" class="btn btn-orange text-white fw-bold w-100 py-3 rounded-pill fs-5">Daftar Sekarang</button>
      </form>
    </div>
  </section>


  <!-- Footer -->
  <footer class="py-4 bg-white text-center">
    <p class="m-0 text-orange">&copy; 2025 Kudungga Run Festival. All rights reserved.</p>
  </footer>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script>
    // Countdown
    const countdown = document.getElementById('countdown');
    const target = new Date("2025-09-01T00:00:00").getTime();
    setInterval(() => {
      const now = new Date().getTime();
      const distance = target - now;
      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);
      countdown.innerHTML = `${days} HARI ${hours} JAM ${minutes} MENIT ${seconds} DETIK`;
    }, 1000);

    // Swiper
    const swiper = new Swiper(".mySwiper", {
      loop: true,
      pagination: { el: ".swiper-pagination", clickable: true },
      autoplay: { delay: 2500, disableOnInteraction: false },
    });
  </script>

</body>
</html>
