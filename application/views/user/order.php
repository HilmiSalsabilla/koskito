<div class="container mt-4">
  <h3>Riwayat Pemesanan Kos</h3>
  <table class="table table-bordered mt-3">
    <thead class="table-light">
      <tr>
        <th>Nama Kos</th>
        <th>Tanggal Pesan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $order): ?>
        <tr>
          <td><?= htmlspecialchars($order->nama_kos) ?></td>
          <td><?= $order->tanggal_pesan ?></td>
          <td>
            <?= ucfirst($order->status) ?>
            <?php if ($order->status == 'pending'): ?>
              <br>
              <a href="<?= site_url('user/upload_bukti/' . $order->id) ?>" class="btn btn-sm btn-warning mt-1">Upload Bukti</a>
              <a href="<?= base_url('user/batal/' . $order->id) ?>" onclick="return confirm('Yakin batalkan?')" class="btn btn-danger btn-sm">Batalkan</a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>