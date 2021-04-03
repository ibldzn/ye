<?php
  include "../koneksi.php";

  $nik = mysqli_real_escape_string($conn, $_POST["nik"]);
  $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  $telp = mysqli_real_escape_string($conn, $_POST["telp"]);

  $res = mysqli_query($conn, "SELECT * FROM `masyarakat` WHERE `nama`='$nama'");
  if ($res->num_rows >= 1) {
    echo "<script>
      if (!alert('Anda sudah punya akun'))
          window.location.href = './';
    </script>";
  }
  else {
    mysqli_query($conn, "INSERT INTO `masyarakat` VALUES ('$nik', '$nama', '$username', '$password', '$telp')");
    echo "<script>
      if (!alert('Akun berhasil dibuat'))
          window.location.href = '../login/';
    </script>";
  }
?>