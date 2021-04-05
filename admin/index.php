<?php
  include "../koneksi.php";

  if (!isset($_SESSION["username"])) {
    echo "<script>
      if (!alert('Anda belum login!'))
        window.location.href = '../login';
    </script>";
  }

  if ($_SESSION["data"]["level"] != "admin") {
    echo "<script>
      if (!alert('Anda tidak punya akses ke halaman ini!'))
        window.location.href = './';
    </script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../static/css/bootstrap/bootstrap.min.css">
  <title>Pelayanan Masyarakat - Admin</title>
</head>
<body class="bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Pelayanan Masyarakat</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="index.php" role="tab" class="nav-link active">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="pengaduan.php" role="tab" class="nav-link">Pengaduan</a>
          </li>
          <li class="nav-item">
            <a href="petugas.php" role="tab" class="nav-link">Petugas</a>
          </li>
          <li class="nav-item">
            <a href="masyarakat.php" role="tab" class="nav-link">Masyarakat</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-danger" href="../logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid mt-5 position-relative">
    <div class="position-absolute top-0 start-50 translate-middle mt-5">
      <div class="row row-cols-lg-auto">
        <div class="col-auto">
          <div class="card bg-success text-white">
            <div class="card-body">
              <?php
                $res = mysqli_query($conn, "SELECT * FROM `pengaduan` WHERE `status`='selesai'");
                $total = mysqli_num_rows($res);
              ?>
              <h5 class="card-title">Pengaduan Dijawab: <?php echo $total; ?></h5>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <div class="card bg-danger text-white">
            <div class="card-body">
              <?php
                $res2 = mysqli_query($conn, "SELECT * FROM `pengaduan` WHERE `status`='proses'");
                $total2 = mysqli_num_rows($res2);
              ?>
              <h5 class="card-title">Pengaduan Belum Dijawab: <?php echo $total2; ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../static/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>