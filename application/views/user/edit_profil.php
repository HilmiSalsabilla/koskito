<div class="container mt-4">
  <h3>Edit Profil</h3>
  <form method="post">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user->name) ?>">
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user->email) ?>">
    </div>
    <button class="btn btn-primary">Simpan Perubahan</button>
  </form>
</div>