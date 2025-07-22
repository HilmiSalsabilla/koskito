<div class="container mt-4">
  <h2 class="mb-4">Daftar Kos</h2>

  <div class="row">
    <?php foreach ($kos_list as $kos): ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="<?= base_url('uploads/kos/' . $kos->foto) ?>" 
              onerror="this.scr='<?= base_url('assets/image/noimage.jpg') ?>'"
              class="card-img-top" 
              alt="<?= $kos->nama_kos ?>" 
              style="height:200px;object-fit:cover;">
          <div class="card-body">
            <h5 class="card-title"><?= $kos->nama_kos ?></h5>
            <p class="card-text">
              <?= $kos->alamat ?><br>
              <?= $kos->nama_kecamatan ?>, <?= $kos->nama_kota ?><br>
              <strong>Rp<?= number_format($kos->harga, 0, ',', '.') ?>/bulan</strong>
            </p>
            <a href="<?= site_url('kos/detail/' . $kos->id) ?>" class="btn btn-primary btn-small">Lihat Detail</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>