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
</div>