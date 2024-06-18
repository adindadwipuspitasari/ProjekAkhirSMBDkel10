<?php
include 'koneksi.php';

function tambah_data($data) {
    global $koneksi;
    $id_peminjam = $data['id_peminjam'];
    $nama_peminjam = $data['nama_peminjam'];
    $no_telp = $data['no_telp'];

    $query = "INSERT INTO log_peminjam (id_peminjam,nama_peminjam, no_telp) VALUES ('$id_peminjam','$nama_peminjam', '$no_telp')";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        return true;
    } else {
        return "Error: " . mysqli_error($koneksi);
    }
}

function ubah_data($data) {
    global $koneksi;
    $log_id = $data['log_id'];
    $id_peminjam = $data['id_peminjam'];
    $nama_peminjam = $data['nama_peminjam'];
    $no_telp = $data['no_telp'];

    $query = "UPDATE log_peminjam SET id_peminjam='$id_peminjam', nama_peminjam='$nama_peminjam', no_telp='$no_telp' WHERE log_id='$log_id'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        return true;
    } else {
        return "Error: " . mysqli_error($koneksi);
    }
}

function hapus_data($data) {
    global $koneksi;
    $log_id = $data['hapus'];
    $query = "DELETE FROM log_peminjam WHERE log_id='$log_id'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        return true;
    } else {
        return "Error: " . mysqli_error($koneksi);
    }
}


?>
