<p class="container mt-4">Selamat datang, <strong><?= htmlspecialchars($user->name) ?></strong> (<?= $user->role ?>)</p>
  <a href="<?= site_url('user/edit_profil') ?>">Edit Profil</a></p>