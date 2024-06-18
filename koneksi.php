<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "peminjaman_alat";

$koneksi = mysqli_connect($server, $user, $password, $database) or die (mysqli_error($koneksi));
?>
