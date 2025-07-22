<div class="container mt-4">
  <h3><?= isset($kos) ? 'Edit Kos' : 'Tambah Kos' ?></h3>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama Kos</label>
      <input type="text" name="nama_kos" class="form-control" value="<?= isset($kos) ? $kos->nama_kos : '' ?>">
    </div>
    <div class="mb-3">
      <label>Harga</label>
      <input type="number" name="harga" class="form-control" value="<?= isset($kos) ? $kos->harga : '' ?>">
    </div>
    <div class="mb-3">
      <label>Fasilitas</label>
      <textarea name="fasilitas" class="form-control"><?= isset($kos) ? $kos->fasilitas : '' ?></textarea>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control"><?= isset($kos) ? $kos->deskripsi : '' ?></textarea>
    </div>
    <button class="btn btn-success">Simpan</button>
  </form>
</div>