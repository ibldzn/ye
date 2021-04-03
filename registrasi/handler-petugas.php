<?php
  include "../koneksi.php";

  $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  $telp = mysqli_real_escape_string($conn, $_POST["telp"]);
  $level = mysqli_real_escape_string($conn, $_POST["level"]);

  $res = mysqli_query($conn, "SELECT * FROM `petugas` WHERE `nama`='$nama'");
  if ($res->num_rows >= 1) {
    echo "<script>
      if (!alert('Anda sudah punya akun'))
          window.location.href = './';
    </script>";
  }
  else {
    mysqli_query($conn, "INSERT INTO `petugas` VALUES ('', '$nama', '$username', '$password', '$telp', '$level')");
    echo "<script>
      if (!alert('Akun berhasil dibuat'))
          window.location.href = '../login/';
    </script>";
  }
?>
?>