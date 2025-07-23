<div class="container mt-4">
  <h3>Dashboard Admin</h3>
  <h5 class="mt-4">Data Kos</h5>

  <table class="table table-bordered">
    <thead class="table-light">
      <tr>
        <th>Nama Kos</th>
        <th>Alamat</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($kos_list as $kos): ?>
        <tr>
          <td><?= htmlspecialchars($kos->nama_kos) ?></td>
          <td><?= htmlspecialchars($kos->alamat) ?></td>
          <td>Rp<?= number_format($kos->harga, 0, ',', '.') ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <h5 class="mt-4">Data Pengguna</h5>
  <table class="table table-bordered">
    <thead class="table-light">
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($user_list as $u): ?>
        <tr>
          <td><?= htmlspecialchars($u->name) ?></td>
          <td><?= htmlspecialchars($u->email) ?></td>
          <td><?= $u->role ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <h5 class="mt-4">Daftar Pemesanan</h5>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama User</th>
        <th>Nama Kos</th>
        <th>Status</th>
        <th>Bukti</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $order): ?>
        <tr>
          <td><?= htmlspecialchars($order->nama_user) ?></td>
          <td><?= htmlspecialchars($order->nama_kos) ?></td>
          <td><?= $order->status ?></td>
          <td>
            <?php if ($order->file_bukti): ?>
              <a href="<?= base_url('uploads/bukti/' . $order->file_bukti) ?>" target="_blank" class="btn btn-sm btn-info">Lihat Bukti</a>
            <?php else: ?>
              <span class="text-muted">Belum ada</span>
            <?php endif; ?>
          </td>
          <td>
            <?php if ($order->status == 'pending' && $order->file_bukti): ?>
              <a href="<?= site_url('admin/verifikasi_pembayaran/' . $order->id) ?>" class="btn btn-success btn-sm">Verifikasi</a>
              <a href="<?= site_url('admin/tolak_pembayaran/' . $order->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin tolak bukti pembayaran ini?')">Tolak</a>
            <?php else: ?>
              <span class="text-muted">-</span>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>