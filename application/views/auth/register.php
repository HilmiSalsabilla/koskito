<div class="container mt-5">
  <h3>Daftar Pengguna</h3>
  <form method="post">
    <div class="mb-3">
      <label>Nama Lengkap</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Role</label>
      <select name="role" class="form-control" required>
        <option value="pencari">Pencari Kos</option>
        <option value="pemilik">Pemilik Kos</option>
      </select>
    </div>
    <button class="btn btn-success">Daftar</button>
  </form>
</div>