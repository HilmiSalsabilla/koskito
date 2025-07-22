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
          <td><?= ucfirst($order->status) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>