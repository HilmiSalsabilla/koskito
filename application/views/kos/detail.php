<div class="container mt-4">
  <h2><?= htmlspecialchars($kos->nama_kos) ?></h2>
  <div class="row">
    <div class="col-md-6">
      <img src="<?= base_url('uploads/kos/' . $kos->foto) ?>"
           alt="<?= htmlspecialchars($kos->nama_kos) ?>"
           class="img-fluid mb-3"
           onerror="this.src='<?= base_url('assets/images/noimage.jpg') ?>'">
    </div>
    <div class="col-md-6">
      <h5>Lokasi</h5>
      <p><?= htmlspecialchars($kos->alamat) ?><br>
         <?= htmlspecialchars("$kos->nama_kecamatan, $kos->nama_kota, $kos->nama_provinsi") ?>
      </p>
      <h5>Harga</h5>
      <p><strong>Rp<?= number_format($kos->harga, 0, ',', '.') ?>/bulan</strong></p>

      <h5>Fasilitas</h5>
      <p><?= nl2br(htmlspecialchars($kos->fasilitas)) ?></p>

      <h5>Deskripsi</h5>
      <p><?= nl2br(htmlspecialchars($kos->deskripsi)) ?></p>

      <?php if ($this->session->userdata('logged_in')): ?>
        <a href="<?= site_url('kos/pesan/' . $kos->id) ?>" class="btn btn-success">
          Pesan Kos
        </a>
      <?php else: ?>
        <a href="<?= site_url('login') ?>" class="btn btn-primary">
          Login untuk Pesan
        </a>
      <?php endif; ?>

      <a href="<?= site_url('kos') ?>" class="btn btn-secondary">Kembali</a>
    </div>
  </div>
</div>
