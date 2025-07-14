<?php
$background_path = FCPATH . 'assets/gambar/bg-tiket3.png';
$logo_path = FCPATH . 'assets/gambar/event logo 2.png';

function imageToBase64($path) {
  $type = pathinfo($path, PATHINFO_EXTENSION);
  $data = file_get_contents($path);
  return 'data:image/' . $type . ';base64,' . base64_encode($data);
}

$background_base64 = imageToBase64($background_path);
$logo_base64 = imageToBase64($logo_path);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <style>
 @page { margin: 0; }
  body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    font-size: 12px;
    color: #000;
    background-image: url('<?= $background_base64 ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: top center;
  }

  .ticket-wrapper {
    width: 100%;
    max-width: 680px;
    margin: 0 auto;
    padding: 40px 30px 120px;
    box-sizing: border-box;
    position: relative;
  }

    /* Logo di pojok kiri atas */
    .logo {
      position: absolute;
      top: 40px;
      left: 60px;
      width: 120px;
    }

    /* Baris QR - Event Info - Ticket Type */
    .top-row {
      position: absolute;
      top: 200px;
      left: 60px;
      right: 60px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .qr-box {
      width: 140px;
      text-align: center;
    }

    .qr-box img {
      width: 120px;
      height: 120px;
      border: 2px solid #ff6f00;
      border-radius: 8px;
    }

    .qr-code-text {
      font-size: 13px;
      font-weight: bold;
      margin-top: 5px;
      color: #000;
    }

    .event-info {
      text-align: center;
      font-size: 13px;
      line-height: 1.5;
      flex-grow: 1;
    }

    .ticket-type {
      background-color: #ff6f00;
      color: #fff;
      font-weight: bold;
      font-size: 14px;
      padding: 10px 20px;
      border-radius: 20px;
      white-space: nowrap;
    }

    /* Grid dua baris */
    .info-grid {
      position: absolute;
      left: 60px;
      right: 60px;
      top: 360px;
      display: flex;
      justify-content: space-between;
      gap: 30px;
    }

    .bottom-grid {
      position: absolute;
      left: 60px;
      right: 60px;
      top: 590px;
      display: flex;
      justify-content: space-between;
      gap: 30px;
    }

    .box {
      width: 48%;
      background: rgba(255,255,255,0.95);
      padding: 12px 16px;
      border-radius: 10px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }

    .box-title {
      font-weight: bold;
      color: #ff6f00;
      font-size: 13px;
      margin-bottom: 8px;
      border-bottom: 1px solid #ff6f00;
      padding-bottom: 4px;
    }

    .box p {
      margin: 6px 0;
    }

    .footer {
    position: fixed;
    bottom: 30px;
    left: 60px;
    right: 60px;
    font-size: 10px;
    text-align: justify;
    color: #555;
    background: rgba(255,255,255,0.85);
    padding: 10px;
    border-radius: 8px;
    }

  </style>
</head>
<body>
  <div class="ticket-wrapper">

    <!-- Logo -->
    <img src="<?= $logo_base64 ?>" class="logo" alt="Logo Kudungga">

    <!-- Baris Atas: QR - Event Info - Ticket Type -->
    <div style="position:absolute; top:140px; left:60px; right:40px;">
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr valign="top">
          <td width="160" align="center">
            <img src="data:image/png;base64,<?= $qr_base64 ?>" style="width:120px; height:120px; border:2px solid #ff6f00; border-radius:8px;"><br>
            <div style="font-weight:bold; font-size:13px; margin-top:4px; color:#000"><?= esc($kode_qr) ?></div>
          </td>
          <td align="center">
            <div style="font-size:13px; line-height:1.5;">
              <strong>Kudungga Run Festival 2025</strong><br>
              Kudungga Sport Center<br>
              Jl. Soekarno Hatta, Bukit Pelangi, Sangatta<br>
              13 September 2025
            </div>
          </td>
          <td align="right" width="160">
            <div style="background:#ff6f00; color:#fff; padding:10px 20px; font-size:14px; font-weight:bold; border-radius:20px; display:inline-block;">
              <?= esc($kategori_lari) ?> Ticket
            </div>
          </td>
        </tr>
      </table>
    </div>

    <!-- Event & Billing Details -->
    <div style="position:absolute; top:360px; left:60px; right:40px;">
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr valign="top">
          <td width="48%" style="background:rgba(255,255,255,0.95); padding:15px 20px; border-radius:10px; box-shadow:0 3px 5px rgba(0,0,0,0.1);">
            <div style="font-weight:bold; color:#ff6f00; font-size:13px; border-bottom:1px solid #ff6f00; padding-bottom:4px; margin-bottom:8px;">Event Details</div>
            <p><strong>Tanggal:</strong> 13 September 2025</p>
            <p><strong>Waktu:</strong> 06.00 – 11.00 WITA</p>
            <p><strong>Race Pack:</strong> 10 September 2025</p>
          </td>
          <td width="4%"></td>
          <td width="48%" style="background:rgba(255,255,255,0.95); padding:15px 20px; border-radius:10px; box-shadow:0 3px 5px rgba(0,0,0,0.1);">
            <div style="font-weight:bold; color:#ff6f00; font-size:13px; border-bottom:1px solid #ff6f00; padding-bottom:4px; margin-bottom:8px;">Billing Details</div>
            <p><strong>Nama:</strong> <?= esc($nama) ?></p>
            <p><strong>Email:</strong> <?= esc($email) ?></p>
            <p><strong>Kategori:</strong> <?= esc($kategori_lari) ?></p>
            <p><strong>Order ID:</strong> <?= esc($kode_qr) ?></p>
            <p><strong>Daftar:</strong> <?= date('d M Y', strtotime($tanggal_daftar)) ?></p>
            <p><strong>Total Bayar:</strong> <?= esc($harga) ?></p>
          </td>
        </tr>
      </table>
    </div>

    <!-- Venue & Informasi Penting -->
    <div style="position:absolute; top:590px; left:60px; right:40px;">
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr valign="top">
          <td width="48%" style="background:rgba(255,255,255,0.95); padding:15px 20px; border-radius:10px; box-shadow:0 3px 5px rgba(0,0,0,0.1);">
            <div style="font-weight:bold; color:#ff6f00; font-size:13px; border-bottom:1px solid #ff6f00; padding-bottom:4px; margin-bottom:8px;">Venue</div>
            <p>Kudungga Sport Center</p>
            <p>Jl. Soekarno Hatta, Bukit Pelangi, Sangatta, Kutai Timur</p>
          </td>
          <td width="4%"></td>
          <td width="48%" style="background:rgba(255,255,255,0.95); padding:15px 20px; border-radius:10px; box-shadow:0 3px 5px rgba(0,0,0,0.1);">
            <div style="font-weight:bold; color:#ff6f00; font-size:13px; border-bottom:1px solid #ff6f00; padding-bottom:4px; margin-bottom:8px;">Informasi Penting</div>
            <p>Harap tunjukkan tiket ini saat pengambilan race pack.</p>
            <p>QR code harus dapat dibaca dengan jelas.</p>
            <p>Tiket ini berlaku hanya untuk 1 orang dan tidak dapat dipindahtangankan.</p>
          </td>
        </tr>
      </table>
    </div>
    
    <!-- Footer -->
    <div class="footer" >
      Dengan memiliki tiket ini, peserta menyetujui seluruh peraturan Kudungga Run Festival 2025. Tiket tidak dapat ditukar, diuangkan kembali, atau dipindahkan kepemilikannya. Segala keputusan panitia bersifat final.
    </div>

  </div>
</body>
