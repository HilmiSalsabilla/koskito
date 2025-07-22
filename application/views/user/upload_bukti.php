<div class="container mt-4">
  <h3>Upload Bukti Pembayaran</h3>
  <p>Pesanan: <?= $order->id ?> | Kos: <?= $order->id_kos ?> | Tanggal Mulai: <?= $order->tanggal_mulai ?></p>

  <?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="bukti" class="form-label">Upload Bukti Transfer (jpg, png, pdf)</label>
      <input type="file" name="bukti" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Upload</button>
  </form>
</div>
