<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../static/css/bootstrap/bootstrap.min.css">
  <title>Pelayanan Masyarakat - Masyarakat | Pengaduan</title>
</head>
<body class="bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Pelayanan Masyarakat</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="index.php" role="tab" class="nav-link">
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="pengaduan.php" role="tab" class="nav-link active">
              Tulis Pengaduan
            </a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-danger" href="../logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5 text-white">
    <h1 class="text-center mb-4">Tulis Pengaduan</h1>
    <form action="handler-pengaduan.php" method="POST" class="form-inline">
      <div class="form-floating">
        <textarea class="form-control" name="pengaduan" id="pengaduan"></textarea>
        <label class="text-muted" for="pengaduan">Pengaduan</label>
      </div>
      <div class="float-end mt-3">
        <button class="btn btn-primary btn-md" type="submit">Kirim</button>
      </div>
    </form>
  </div>
  <script src="../static/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>