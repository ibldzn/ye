<?php
  include "../koneksi.php";

  $id = $_GET["id_pengaduan"];
  mysqli_query($conn, "DELETE FROM `pengaduan` WHERE id_pengaduan='$id'");

  header("location: ./");
?>