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
  <title>Pelayanan Masyarakat - Admin | Pengaduan</title>
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
            <a href="pengaduan.php" role="tab" class="nav-link active">Pengaduan</a>
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
  <div class="container mt-5 text-white">
    <h1 class="text-center mb-4">List Pengaduan</h1>
    <table id="table" class="display text-dark">
      <thead class="bg-secondary">
        <tr>
          <th scope="col">No</th>
          <th scope="col">NIK</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Status</th>
          <th scope="col">More</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no=1;
          $query = mysqli_query($conn,"SELECT * FROM `pengaduan` INNER JOIN `masyarakat` ON pengaduan.nik=masyarakat.nik ORDER BY pengaduan.id_pengaduan DESC");
          while ($r = mysqli_fetch_assoc($query)) { ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $r["nik"]; ?></td>
              <td><?php echo $r["nama"]; ?></td>
              <td><?php echo $r["tgl_pengaduan"]; ?></td>
              <td><?php echo $r["status"]; ?></td>
              <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pengaduan-<?php echo $r["id_pengaduan"] ?>">
                  Info
                </button>
                <div class="modal fade" id="pengaduan-<?php echo $r["id_pengaduan"]; ?>" aria-hidden="true" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Laporan</h5>
                      </div>
                      <div class="modal-body">
                        <table class="table table-bordered">
                          <tbody>
                            <tr>
                              <td>ID</td>
                              <td><?php echo $r["id_pengaduan"]; ?></td>
                            </tr>
                            <tr>
                              <td>Tanggal</td>
                              <td><?php echo $r["tgl_pengaduan"]; ?></td>
                            </tr>
                            <tr>
                              <td>NIK</td>
                              <td><?php echo $r["nik"]; ?></td>
                            </tr>
                            <tr>
                              <td>Isi</td>
                              <td><?php echo $r["isi_laporan"]; ?></td>
                            </tr>
                            <tr>
                              <td>Status</td>
                              <td><?php echo $r["status"]; ?></td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                          <button class="btn btn-primary" data-bs-target="#tanggapan-<?php echo $r["id_pengaduan"] ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Lihat Tanggapan</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="tanggapan-<?php echo $r["id_pengaduan"] ?>" aria-hidden="true"tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tanggapan</h5>
                      </div>
                      <div class="modal-body">
                      <?php
                        $id_pengaduan = $r["id_pengaduan"];
                        $tanggapan = mysqli_query($conn, "SELECT * FROM `tanggapan` INNER JOIN `petugas` ON tanggapan.id_petugas=petugas.id_petugas WHERE tanggapan.id_pengaduan='$id_pengaduan'");
                        if (mysqli_num_rows($tanggapan) > 0) {
                          $r2 = mysqli_fetch_assoc($tanggapan);
                          echo ("<table class=\"table table-bordered\">
                                <tbody>
                                  <tr>
                                    <td>Nama petugas</td>
                                    <td>". $r2["nama"] ."</td>
                                  </tr>
                                  <tr>
                                    <td>Tanggal tanggapan</td>
                                    <td>". $r2["tgl_tanggapan"] ."</td>
                                  </tr>
                                  <tr>
                                    <td>Tanggapan</td>
                                    <td>". $r2["tanggapan"] ."</td>
                                  </tr>
                                </tbody>
                              </table>");
                        }
                        else {
                          echo ("<div class=\"mx-auto\">
                                  <span>Pengaduan ini belum ditanggapi</span>
                                </div>");
                        }
                    ?>
              </td>
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