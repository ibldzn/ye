<?php
  include "../koneksi.php";

  if (!isset($_SESSION["username"])) {
    echo "<script>
      if (!alert('Anda belum login!'))
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
  <link rel="stylesheet" href="../static/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../static/datatables/datatables.min.css">
  <title>Pelayanan Masyarakat - Admin | Masyarakat</title>
</head>
<body class="bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Pelayanan Masyarakat</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="index.php" role="tab" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="pengaduan.php" role="tab" class="nav-link">Pengaduan</a>
          </li>
          <li class="nav-item">
            <a href="petugas.php" role="tab" class="nav-link">Petugas</a>
          </li>
          <li class="nav-item">
            <a href="masyarakat.php" role="tab" class="nav-link active">Masyarakat</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-danger" href="../logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <h1 class="text-center mb-4 text-white">List Masyarakat</h1>
    <table id="table" class="display text-dark">
      <thead class="bg-secondary">
        <tr>
          <th scope="col">No</th>
          <th scope="col">NIK</th>
          <th scope="col">Nama</th>
          <th scope="col">Username</th>
          <th scope="col">Telp</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no=1;
          $petugas = mysqli_query($conn, "SELECT * FROM `masyarakat`");
          while ($r = mysqli_fetch_assoc($petugas)) { ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $r["nik"]; ?></td>
              <td><?php echo $r["nama"]; ?></td>
              <td><?php echo $r["username"]; ?></td>
              <td><?php echo $r["telp"]; ?></td>>
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
      $('#table').DataTable({
        lengthChange: false
      });
    } );
  </script>
</body>
</html>