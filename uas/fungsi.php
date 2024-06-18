<?php
include 'koneksi.php';

function tambah_data($data) {
    global $koneksi;
    $id_peminjam = $data['id_peminjam'];
    $nama_peminjam = $data['nama_peminjam'];
    $no_telp = $data['no_telp'];
    $inserted_at = $data['inserted_at'];

    $query = "INSERT INTO log_peminjam (nama_peminjam, no_telp, inserted_at) VALUES ('$nama_peminjam', '$no_telp', '$inserted_at')";
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
    $inserted_at = $data['inserted_at'];

    $query = "UPDATE log_peminjam SET id_peminjam='$id_peminjam', nama_peminjam='$nama_peminjam', no_telp='$no_telp', inserted_at='$inserted_at' WHERE log_id='$log_id'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        return true;
    } else {
        return "Error: " . mysqli_error($koneksi);
    }
}

function hapus_data($data) {
    global $koneksi;
    $log_id = $data['log_id'];
    $query = "DELETE FROM log_peminjam WHERE log_id='$log_id'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        return true;
    } else {
        return "Error: " . mysqli_error($koneksi);
    }
}


?>
