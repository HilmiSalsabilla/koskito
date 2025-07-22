<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="<?= base_url() ?>">KosKito</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('kos') ?>">Home</a></li>

        <?php if ($this->session->userdata('logged_in')): ?>
          <?php if ($this->session->userdata('role') === 'pencari'): ?>
            <li class="nav-item"><a class="nav-link" href="<?= site_url('riwayat') ?>">Riwayat</a></li>
          <?php elseif ($this->session->userdata('role') === 'pemilik'): ?>
            <li class="nav-item"><a class="nav-link" href="#">Kelola Kos</a></li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('profil') ?>">
              <?= htmlspecialchars($this->session->userdata('name')) ?>
            </a>
          </li>
          <li class="nav-item"><a class="nav-link text-danger" href="<?= site_url('logout') ?>">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('login') ?>">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('register') ?>">Daftar</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
