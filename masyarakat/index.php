<?php
  include "../koneksi.php";

  if (!isset($_SESSION["username"])) {
    echo "<script>
      if (!alert('Anda belum login!'))
        window.location.href = '../login';
    </script>";
  }

  if ($_SESSION["level"] != "masyarakat") {
    session_unset();
    session_destroy();

    echo "<script>
      if (!alert('Anda tidak memiliki akses ke halaman ini!'))
        window.location.href = '../login';
    </script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../static/datatables/datatables.min.css">
  <link rel="stylesheet" href="../static/css/bootstrap/bootstrap.min.css">
  <title>Pelayanan Masyarakat - Masyarakat | Dashboard</title>
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
            <a href="pengaduan.php" role="tab" class="nav-link">Tulis Pengaduan</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-danger" href="../logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5 text-white">
    <h1 class="text-center mb-4">Dashboard</h1>
    <table id="uwu" class="display text-dark">
      <thead class="bg-secondary">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Isi</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $nik = $_SESSION["data"]["nik"];
          $no = 1;
          $pengaduan = mysqli_query($conn, "SELECT * FROM `pengaduan` WHERE `nik`='$nik'");
          while ($r = mysqli_fetch_assoc($pengaduan)) { ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $r["tgl_pengaduan"]; ?></td>
              <td><?php echo $r["isi_laporan"]; ?></td>
              <td><?php echo $r["status"]; ?></td>
            </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>
  <script src="../static/js/bootstrap/bootstrap.min.js"></script>
  <script src="../static/js/jquery.min.js"></script>
  <script src="../static/datatables/datatables.min.js"></script>
  <script>
    $(document).ready( function () {
      $('#uwu').DataTable({
        lengthChange: false
      });
    } );
  </script>
</body>
</html>