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
  <div class="container-fluid">
    <a href="../logout.php" class="float-end text-danger">Logout</a>
  </div>
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
          $query = mysqli_query($conn,"SELECT * FROM `pengaduan` INNER JOIN `masyarakat` ON pengaduan.nik=masyarakat.nik WHERE pengaduan.status='proses' ORDER BY pengaduan.id_pengaduan DESC");
          while ($r = mysqli_fetch_assoc($query)) { ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $r["nik"]; ?></td>
              <td><?php echo $r["nama"]; ?></td>
              <td><?php echo $r["tgl_pengaduan"]; ?></td>
              <td><?php echo $r["status"]; ?></td>
              <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tab-balas-<?php echo $r["id_pengaduan"]; ?>">
                  Balas
                </button>
                <div class="modal fade" id="tab-balas-<?php echo $r["id_pengaduan"]; ?>" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="balas.php" method="POST" class="form-inline">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modal-title">Balas</h5>
                        </div>
                        <div class="modal-body">
                          <table>
                            <tbody>
                              <tr>
                                <td>Nama</td>
                                <td><?php echo $r["nama"]; ?></td>
                              </tr>
                              <tr>
                                <td>Isi</td>
                                <td><?php echo $r["isi_laporan"]; ?></td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="form-floating mt-3">
                            <input type="hidden" name="id_pengaduan" value="<?php echo $r["id_pengaduan"]; ?>">
                            <textarea class="form-control" name="balasan" id="balasan"></textarea>
                            <label class="text-muted" for="balasan">Tulis balasan anda</label>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <a class="btn btn-danger" href="hapus.php?id_pengaduan=<?php echo $r["id_pengaduan"]; ?>">Hapus</a>
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