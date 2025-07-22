<div class="container mt-4">
  <h3>Pesan Kos: <?= htmlspecialchars($kos->nama_kos ?? '-') ?></h3>

  <form method="post">
    <div class="mb-3">
      <label for="durasi" class="form-label">Durasi Sewa (bulan)</label>
      <select name="durasi" class="form-select" required>
        <option value="">Pilih Durasi</option>
        <?php for ($i = 1; $i <= 12; $i++): ?>
          <option value="<?= $i ?>"><?= $i ?> bulan</option>
        <?php endfor; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
  </form>
</div>