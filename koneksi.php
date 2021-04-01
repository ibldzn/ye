<?php
  session_start();

  $conn = mysqli_connect("localhost", "root", "", "db_pelayanan");

  if (mysqli_connect_errno())
    die("Koneksi database gagal : " . mysqli_connect_error());
?>