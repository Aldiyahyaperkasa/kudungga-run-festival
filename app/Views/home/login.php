<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url('assets/gambar/icon.jpeg') ?>" type="image/x-icon">
  <title>Login - Kudungga Run Festival</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #ff6f00, #ffa726);
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
    }
    .text-orange 
    { 
      color: #fff; 
    }
    .login-card {
      background: white;
      border-radius: 1.5rem;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      padding: 3rem;
      max-width: 450px;
      width: 100%;
    }
    .logo-text {
      color: #ff6f00;
      font-weight: 900;
      font-size: 2rem;
      letter-spacing: 1px;
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
  </style>
</head>
<body class="d-flex justify-content-center align-items-center">
  <nav class="navbar navbar-expand-lg bg-transparent fixed-top" data-aos="fade-down">
    <div class="container">
      <a class="navbar-brand fw-bold text-orange" href="#">
          <img src="<?= base_url('assets/gambar/event logo 2.png') ?>" alt="Sponsor 1" class="img-fluid" style="max-height:50px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav gap-3">
          <li class="nav-item"><a class="nav-link text-orange fw-bold" href="<?= base_url('/'); ?>/#home">Beranda</a></li>
          <li class="nav-item"><a class="nav-link text-orange fw-bold" href="<?= base_url('/'); ?>/#denah">Denah</a></li>
          <li class="nav-item"><a class="nav-link text-orange fw-bold" href="<?= base_url('/'); ?>/#sponsor">Sponsor</a></li>
          <li class="nav-item"><a class="nav-link text-orange fw-bold" href="<?= base_url('/'); ?>/#galeri">Galeri</a></li>
          <li class="nav-item"><a class="nav-link text-orange fw-bold" href="<?= base_url('/'); ?>/#pendaftaran">Pendaftaran</a></li>
          <li class="nav-item">
            <a class="btn btn-login nav-link text-orange fw-bold" href="<?= base_url('login'); ?>">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>  
  <div class="login-card text-center py-5 my-5">
    <div class="mb-4">
      <img src="<?= base_url('assets/gambar/event logo 1.png') ?>" alt="Logo Kudungga Run" style="width: 100%;" class="mb-3">
    </div>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger text-start"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/login') ?>" method="post">
      <div class="form-floating mb-3 text-start">
        <input type="text" class="form-control" id="email" name="email" placeholder="Email / Username" required>
        <label for="email">Email</label>
      </div>

      <div class="form-floating mb-4 text-start">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password Anda" required>
        <label for="password">Password</label>
      </div>

      <button class="btn btn-orange w-100 py-3" type="submit">Masuk ke Dashboard</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
