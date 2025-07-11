<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
  <h1>Konfirmasi Peserta Kudungga Run Festival</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= site_url('/dashboard-admin') ?>">Dashboard</a></li>
      <li class="breadcrumb-item active">Konfirmasi Peserta</li>
    </ol>
  </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-12">

      <div class="card " style="border-top: 5px solid #f97316;">
        <div class="card-body">
          <h5 class="card-title" style="color: #003366;">
            <i class="bi bi-people-fill me-2" style="color: #f97316;"></i>
            Data Konfirmasi Peserta
          </h5>

          <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('success') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          <?php elseif(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('error') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
          <?php endif; ?>

          <div class="table-responsive mt-4">
            <table class="table table-striped align-middle table-sm">
              <thead style="background-color:#f97316;" class="text-white text-center">
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No. Telepon</th>
                  <th>Alamat</th>
                  <!-- <th>NIK</th> -->
                  <!-- <th>Tgl Lahir</th> -->
                  <th>Jenis Kelamin</th>
                  <th>Kategori</th>
                  <th>Ukuran</th>
                  <!-- <th>Usia</th> -->
                  <th>Telp Darurat</th>
                  <th>Riwayat Penyakit</th>
                  <th>Status</th>
                  <th>Kode Unik</th>
                  <th>Bukti Pembayaran</th>
                  <th>Tgl Daftar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php if (!empty($peserta)) : ?>
                  <?php foreach ($peserta as $key => $p) : ?>
                    <tr class="<?= $p['status_pendaftaran'] === 'Terkonfirmasi' ? 'table-success' : ($p['status_pendaftaran'] === 'Ditolak' ? 'table-danger' : '') ?>">
                      <td><?= $key + 1 ?></td>
                      <td class="text-start fw-semibold"><?= esc($p['nama_peserta']) ?></td>
                      <td><?= esc($p['email']) ?></td>
                      <td><?= esc($p['no_telepon']) ?></td>
                      <td class="text-start"><?= esc($p['alamat']) ?></td>
                      <!-- <td><?= esc($p['nik']) ?></td> -->
                      <!-- <td><?= date('d-m-Y', strtotime($p['tanggal_lahir'])) ?></td> -->
                      <td><?= esc($p['jenis_kelamin']) ?></td>
                      <td>
                        <span class="badge <?= $p['kategori_lari'] === 'Pelajar' ? 'bg-success' : 'bg-primary' ?>">
                          <?= esc($p['kategori_lari']) ?>
                        </span>
                      </td>
                      <td><span class="badge bg-dark"><?= esc($p['ukuran_baju']) ?></span></td>
                      <!-- <td><?= esc($p['usia']) ?></td> -->
                      <td><?= esc($p['no_telepon_darurat_1']) ?></td>
                      <td><?= esc($p['riwayat_penyakit'] ?: '-') ?></td>
                      <td>
                        <span class="badge <?= $p['status_pendaftaran'] === 'Terkonfirmasi' ? 'bg-success' : ($p['status_pendaftaran'] === 'Ditolak' ? 'bg-danger' : 'bg-warning') ?>">
                          <?= esc($p['status_pendaftaran']) ?>
                        </span>
                      </td>
                      <td><?= esc($p['kode_unik_peserta'] ?: '-') ?></td>
                      <td>
                        <?php if ($p['bukti_pembayaran']) : ?>
                          <a href="<?= base_url('uploads/bukti/' . $p['bukti_pembayaran']) ?>" target="_blank" class="btn btn-sm btn-primary rounded-pill">
                            <i class="bi bi-file-earmark-image"></i> Lihat
                          </a>
                        <?php else: ?>
                          <span class="text-muted fst-italic">Belum upload</span>
                        <?php endif; ?>
                      </td>
                      <td><?= date('d-m-Y H:i', strtotime($p['tanggal_daftar'])) ?></td>
                      <td>
                        <?php if ($p['status_pendaftaran'] === 'Menunggu') : ?>
                          <a href="<?= site_url('/admin/konfirmasi-peserta/konfirmasi/' . $p['id_peserta']) ?>"
                            class="btn btn-sm btn-success rounded-pill mb-1">
                            <i class="bi bi-check-circle"></i> Konfirmasi
                          </a>
                          <a href="<?= site_url('/admin/konfirmasi-peserta/tolak/' . $p['id_peserta']) ?>"
                            class="btn btn-sm btn-danger rounded-pill mb-1"
                            onclick="return confirm('Yakin tolak peserta ini?')">
                            <i class="bi bi-x-circle"></i> Tolak
                          </a>
                        <?php else: ?>
                          <span class="text-muted fst-italic">Tidak ada aksi</span>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else : ?>
                  <tr>
                    <td colspan="18" class="text-center text-muted py-4">
                      <i class="bi bi-info-circle fs-4"></i><br>
                      Belum ada data peserta terdaftar.
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

          <div class="d-flex justify-content-center mt-5">
            <?= $pager->links('peserta', 'peserta_pagination') ?>
          </div>



        </div>
      </div>

    </div>
  </div>
</section>

<?= $this->endSection(); ?>
