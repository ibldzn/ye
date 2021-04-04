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
  <link rel="stylesheet" href="../static/datatables/datatables.min.css">
  <link rel="stylesheet" href="../static/css/bootstrap/bootstrap.min.css">
  <title>Pelayanan Masyarakat - Petugas</title>
</head>
<body class="bg-dark">
  <div class="container mt-5 text-white">
    <h1 class="text-center mb-4">List Pengaduan</h1>
    <table id="table" class="display text-dark">
      <thead class="bg-secondary">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal</th>
          <th scope="col">More</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $pengaduan = mysqli_query($conn, "SELECT * FROM `pengaduan`");
          $no = 1;
          while ($r = mysqli_fetch_assoc($pengaduan)) { ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td></td>
              <td></td>
              <td></td>
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