<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../static/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../static/css/registrasi.css">
  <title>Pelayanan Masyarakat - Registrasi</title>
</head>
<body class="bg-dark">
  <div class="container mt-5 text-white">
    <h1 class="text-center mb-4">Registrasi</h1>
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item" role="presentation">
        <a href="#tab-masyarakat" role="tab" data-bs-toggle="tab" class="nav-link active">
          Masyarakat
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a href="#tab-petugas" role="tab" data-bs-toggle="tab" class="nav-link">
          Petugas
        </a>
      </li>
    </ul>
    <div class="tab-content">
      <div id="tab-masyarakat" class="tab-pane active" role="tabpanel">
        <form class="mt-3" action="handler-masyarakat.php" method="post">
          <div class="mb-3 row">
            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="nik" id="nik" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" id="username" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" id="password" minlength="8" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="cpassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="cpassword" id="cpassword" minlength="8" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="telp" class="col-sm-2 col-form-label">Telp</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" name="telp" id="telp" required>
            </div>
          </div>
          <div class="float-end">
            <button class="btn btn-primary" type="submit">Registrasi</button>
          </div>
          <a href="../login/">Sudah punya akun?</a>
        </form>
      </div>
      <div id="tab-petugas" class="tab-pane" role="tabpanel">
        <form class="mt-3" action="handler-petugas.php" method="post">
          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" id="username" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" id="password" minlength="8" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="cpassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="cpassword" id="cpassword" minlength="8" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="telp" class="col-sm-2 col-form-label">Telp</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" name="telp" id="telp" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="level" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
              <select class="form-select" name="level" id="level">
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
              </select>
            </div>
          </div>
          <div class="float-end">
            <button class="btn btn-primary" type="submit">Registrasi</button>
          </div>
          <a href="../login/">Sudah punya akun?</a>
        </form>
      </div>
    </div>
  </div>
  <script src="../static/js/bootstrap/bootstrap.min.js"></script>
  <script src="../static/js/registrasi.js"></script>
</body>
</html>