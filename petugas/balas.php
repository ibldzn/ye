<?php
  include "../koneksi.php";

  $id_pengaduan = $_POST["id_pengaduan"];
  $id_petugas = $_SESSION["data"]["id_petugas"];
  $isi = $_POST["balasan"];
  $date = date("Y-m-d", time());
  mysqli_query($conn, "INSERT INTO `tanggapan` VALUES ('', '$id_pengaduan', '$date', '$isi', '$id_petugas')");

  mysqli_query($conn, "UPDATE `pengaduan` SET `status`='selesai' WHERE `id_pengaduan`='$id_pengaduan'");

  header("location: ./");
?>