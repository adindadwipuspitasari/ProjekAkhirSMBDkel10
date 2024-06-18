<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "peminjaman_alat";

// Membuat koneksi
$koneksi = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
