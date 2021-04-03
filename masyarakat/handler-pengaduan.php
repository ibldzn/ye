<?php
  include "../koneksi.php";

  $id = "";
  $date = date("Y-m-d", time());
  $nik = $_SESSION["data"]["nik"];
  $pengaduan = $_POST["pengaduan"];
  $foto = "";
  $status = "proses";

  mysqli_query($conn, "INSERT INTO `pengaduan` VALUES ('$id', '$date', '$nik', '$pengaduan', '$foto', '$status')");

  header("location: ./");
?>