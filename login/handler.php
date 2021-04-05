<?php
  include "../koneksi.php";

  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  $sql = mysqli_query($conn, "SELECT * FROM `masyarakat` WHERE (`username`='$username' OR `nama`='$username') AND `password`='$password'");
  $cek = mysqli_num_rows($sql);
  $data = mysqli_fetch_assoc($sql);

  $sql2 = mysqli_query($conn, "SELECT * FROM `petugas` WHERE (`username`='$username' OR `nama`='$username') AND `password`='$password'");
  $cek2 = mysqli_num_rows($sql2);
  $data2 = mysqli_fetch_assoc($sql2);

  if ($cek > 0) {
    $_SESSION["username"] = $username;
    $_SESSION["data"] = $data;
    $_SESSION["level"] = "masyarakat";
    header("location: ../masyarakat/");
  }
  else if ($cek2 > 0) {
    if($data2["level"] == "admin") {
      $_SESSION["username"] = $username;
      $_SESSION["level"] = "admin";
      $_SESSION["data"] = $data2;
      header("location: ../admin/");
    }
    else if ($data2["level"] == "petugas") {
      $_SESSION["username"] = $username;
      $_SESSION["level"] = "petugas";
      $_SESSION["data"] = $data2;
      header("location: ../petugas/");
    }
  }
  else {
    echo "<script>
      if(!alert('Login gagal!'))
        window.location.href = './';
    </script>";
  }
?>