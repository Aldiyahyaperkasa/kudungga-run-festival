<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PesertaModel;
use App\Models\AdminModel;
use App\Models\KodeQRModel;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Dompdf\Dompdf;
use Dompdf\Options;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class AdminController extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }

public function konfirmasiPeserta()
{
    $model = new PesertaModel();

    // Ambil parameter page dari query string (?page=2)
    $currentPage = $this->request->getVar('page_peserta') ?? 1;

    // Data pagination (5 data per halaman, misalnya)
    $data['peserta'] = $model
        ->where('status_pendaftaran', 'Menunggu')
        ->paginate(10, 'peserta');

    $data['pager'] = $model->pager;
    $data['currentPage'] = $currentPage;

    return view('admin/konfirmasi_peserta/konfirmasi_peserta', $data);
}


public function konfirmasi($id)
{
    // ⏱️ Tambah waktu eksekusi maksimum agar tidak timeout saat Dompdf & Email
    set_time_limit(180);

    $pesertaModel = new PesertaModel();
    $qrModel = new KodeQRModel();

    $peserta = $pesertaModel->find($id);
    if (!$peserta) {
        session()->setFlashdata('error', 'Peserta tidak ditemukan.');
        return redirect()->to('/admin/konfirmasi-peserta');
    }

    $nama_event = "Kudungga Run Festival";

    // 🔢 Generate kode unik peserta
    $jumlahTerkonfirmasi = $pesertaModel
        ->where('kategori_lari', $peserta['kategori_lari'])
        ->where('status_pendaftaran', 'Terkonfirmasi')
        ->countAllResults();

    $nomorUrut = str_pad($jumlahTerkonfirmasi + 1, 4, '0', STR_PAD_LEFT);
    $kategori = strtoupper($peserta['kategori_lari']);
    $kodeUnik = "KRF-$kategori-$nomorUrut";

    // ✅ Update status dan kode unik
    $pesertaModel->update($id, [
        'status_pendaftaran' => 'Terkonfirmasi',
        'kode_unik_peserta' => $kodeUnik,
    ]);

    // 📸 Generate QR Code
    $qrFileName = "qr_$kodeUnik.png";
    $qrPath = FCPATH . "kodeqr/$qrFileName";
    $qrImageRelative = 'kodeqr/' . $qrFileName;

    $result = Builder::create()
        ->writer(new PngWriter())
        ->data($kodeUnik)
        ->encoding(new Encoding('UTF-8'))
        ->size(300)
        ->margin(10)
        ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
        ->build();

    file_put_contents($qrPath, $result->getString());

    // Simpan QR ke DB
    $qrModel->save([
        'id_peserta' => $id,
        'kode_qr' => 'QR-' . $kodeUnik,
        'qr_code_path' => $qrImageRelative,
        'status_pengambilan' => 'Belum Diambil'
    ]);

    // 🧾 Generate PDF Tiket (pakai gambar base64 agar lebih cepat)
    $options = new \Dompdf\Options();
    $options->set('isRemoteEnabled', true); // 🔥 WAJIB untuk load gambar background

    $dompdf = new \Dompdf\Dompdf($options);


    // Ambil gambar logo dan qr sebagai base64
    $logoPath = FCPATH . 'assets/gambar/event logo 1.png';
  
    $logoBase64 = base64_encode(file_get_contents(FCPATH . 'assets/gambar/event logo 1.png'));
    $qrBase64 = base64_encode(file_get_contents($qrPath));
    $background_path = FCPATH . 'assets/gambar/bg-tiket3.png';
    $type = pathinfo($background_path, PATHINFO_EXTENSION);
    $data = file_get_contents($background_path);
    $background_base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


    $html = view('admin/tiket_lampiran_pdf', [
        'nama' => $peserta['nama_peserta'],
        'email' => $peserta['email'],
        'kategori_lari' => ucfirst($peserta['kategori_lari']),
        'kode_qr' => 'QR-' . $kodeUnik,
        'harga' => ($peserta['kategori_lari'] == 'Pelajar') ? 'Rp 50.000' : 'Rp 100.000',
        'tanggal_daftar' => $peserta['tanggal_daftar'],
        'qr_base64' => $qrBase64,
        'logo_base64' => $logoBase64,
        'background_base64' => $background_base64,
    ]);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $tiketPath = FCPATH . 'tiket/tiket_' . $kodeUnik . '.pdf';
    file_put_contents($tiketPath, $dompdf->output());
    


    // Kirim Email menggunakan PHPMailer (SMTP Gmail)
    $mail = new PHPMailer(true);

    try {
        // Konfigurasi SMTP Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'festivalrunsangatta@gmail.com'; // Email pengirim
        $mail->Password   = 'qhzjrspyzhktiaqp'; // App Password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Pengirim dan penerima
        $mail->setFrom('festivalrunsangatta@gmail.com', 'Sangatta Festival Run 2025');
        $mail->addAddress($peserta['email'], $peserta['nama_peserta']);

        $mail->AddEmbeddedImage(FCPATH . 'assets/gambar/event logo 1.png', 'logo_event', 'eventlogo.png');
        $mail->AddEmbeddedImage($qrPath, 'qrcode', $qrFileName, 'base64', 'image/jpeg');


        $kodeQrText = 'QR-' . $kodeUnik;


        // Konten email
        $mail->isHTML(true);
        $mail->Subject = 'Tiket Kudungga Run Festival';
        $mail->Body = '
        <div style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 30px;">
          <div style="max-width: 600px; background-color: #fff; margin: auto; padding: 20px; border-radius: 8px;">
            <img src="cid:logo_event" alt="Kudungga Run" style="height: 40px; margin-bottom: 20px;">
            <h2 style="color: #333;">Halo ' . $peserta['nama_peserta'] . ',</h2>
            <p>Terima kasih telah mendaftar pada <strong>Kudungga Run Festival 2025</strong>! Tiket kamu telah terlampir dan rincian pesanan kamu ada di bawah ini.</p>

            <div style="background-color: #e9f5ff; padding: 15px; border-left: 4px solid #007BFF; margin: 20px 0;">
              <h3 style="margin: 0; color: #007BFF;">' . $nama_event . '</h3>
              <p style="margin: 5px 0;"><strong>Start Time:</strong> 2025-07-21 06:00</p>
              <p style="margin: 5px 0;"><strong>End Time:</strong> 2025-07-21 11:00</p>
              <p style="margin: 5px 0;"><strong>Location:</strong> Lapangan Kudungga, Sangatta</p>
              <p style="margin: 5px 0;"><strong>Order Number:</strong> ' . $kodeUnik . '</p>
            </div>

            <h4>Tax Invoice</h4>
            <p><strong>Order Number:</strong> ' . $kodeUnik . '<br>
              <strong>Payment Type:</strong> Transfer<br>
              <strong>Invoice Date:</strong> ' . date('Y-m-d') . '</p>

            <table style="width:100%; border-collapse: collapse;">
              <thead>
                <tr style="background-color:#007BFF; color: white;">
                  <th style="padding: 10px;">Ticket Type</th>
                  <th style="padding: 10px;">Qty</th>
                  <th style="padding: 10px;">Price</th>
                </tr>
              </thead>
              <tbody>
                <tr style="border-bottom: 1px solid #ddd;">
                  <td style="padding: 10px;">' . ucfirst($peserta['kategori_lari']) . '</td>
                  <td style="padding: 10px;">1</td>
                  <td style="padding: 10px;">Rp 100.000</td>
                </tr>
                <tr>
                  <td colspan="2" style="text-align: right; padding: 10px;"><strong>Total</strong></td>
                  <td style="padding: 10px;"><strong>Rp 100.000</strong></td>
                </tr>
              </tbody>
            </table>

            <div style="text-align: center; margin-top: 30px;">
              <p>Scan kode berikut saat pengambilan Race Pack:</p>
              <img src="cid:qrcode" alt="QR Code" style="width: 150px; height: 150px;"><br>
              <p style="margin-top: 10px; font-weight: bold; font-size: 14px; color: #555;">' . $kodeQrText   . '</p>
            </div>

            <p style="margin-top: 30px;">Salam,<br><strong>Panitia Kudungga Run Festival</strong></p>
          </div>
        </div>';
        $mail->addAttachment($tiketPath);


        $mail->send();
        session()->setFlashdata('success', 'Peserta berhasil dikonfirmasi dan email tiket berhasil dikirim.');
    } catch (Exception $e) {
        session()->setFlashdata('error', 'Peserta dikonfirmasi, tapi email gagal dikirim: ' . $mail->ErrorInfo);
    }

    return redirect()->to('/admin/konfirmasi-peserta');
}



    public function tolak($id)
    {
        $model = new PesertaModel();
        $model->delete($id);
        session()->setFlashdata('success', 'Peserta berhasil ditolak & data dihapus!');
        return redirect()->to('/admin/konfirmasi-peserta');
    }

}
