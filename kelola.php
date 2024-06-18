<!DOCTYPE html>
<?php
include 'koneksi.php';
session_start();

$log_id = '';
$id_peminjam = '';
$nama_peminjam = '';
$no_telp = '';

if (isset($_GET['ubah'])) {
    $log_id = $_GET['ubah'];

    // Ambil data sebelumnya dari tabel log_peminjam
    $query_select = "SELECT id_peminjam, nama_peminjam, no_telp FROM log_peminjam WHERE log_id='$log_id'";
    $result = mysqli_query($koneksi, $query_select);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $id_peminjam = $row['id_peminjam'];
        $nama_peminjam = $row['nama_peminjam'];
        $no_telp = $row['no_telp'];
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

if (isset($_POST['submit'])) {
    $id_peminjam = $_POST['id_peminjam'];
    $nama_peminjam = $_POST['nama_peminjam'];
    $no_telp = $_POST['no_telp'];

    // Query untuk melakukan update
    $query_update = "UPDATE log_peminjam SET id_peminjam='$id_peminjam', nama_peminjam='$nama_peminjam', no_telp='$no_telp' WHERE log_id='$log_id'";
    $sql = mysqli_query($koneksi, $query_update);

    if ($sql) {
        $_SESSION['success_message'] = "Data berhasil diubah";
        header("Location: index.php"); // Ganti index.php dengan halaman tujuan setelah update
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
  <title>CRUD</title>
</head>
<body>
<nav class="navbar bg-body-tertiary mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="https://png.pngtree.com/thumb_back/fw800/background/20210331/pngtree-western-musical-instrument-music-background-image_601863.jpg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      PEMINJAMAN ALAT MUSIK
    </a>
  </div>
</nav>
<div class="container mt-5">
  <form method="POST" action="proses.php">
    <input type="hidden" name="log_id" value="<?php echo isset($log_id) ? $log_id : ''; ?>">
    <div class="mb-3 row">
      <label for="id_pjm" class="col-sm-2 col-form-label">ID Peminjam</label>
      <div class="col-sm-10">
        <input value="<?php echo isset($id_peminjam) ? $id_peminjam : ''; ?>" required type="number" name="id_peminjam" class="form-control" id="id_pjm" placeholder="Ex: 41">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="nm_pjm" class="col-sm-2 col-form-label">Nama Peminjam</label>
      <div class="col-sm-10">
        <input value="<?php echo isset($nama_peminjam) ? $nama_peminjam : ''; ?>" required type="text" name="nama_peminjam" class="form-control" id="nm_pjm" placeholder="Ex: Rina">
      </div>
    </div>
    <div class="mb-3 row">
      <label for="no_tlp" class="col-sm-2 col-form-label">No Telpon</label>
      <div class="col-sm-10">
        <input value="<?php echo isset($no_telp) ? $no_telp : ''; ?>" required type="text" name="no_telp" class="form-control" id="no_tlp" placeholder="Ex: 085524611337">
      </div>
    </div>
    <div class="mb-3 row mt-4">
      <div class="col">
        <?php if (isset($_GET['ubah'])) { ?>
          <button type="submit" name="aksi" value="edit" class="btn btn-primary">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
            Simpan
          </button>
          <button type="submit" name="aksi" value="hapus" class="btn btn-danger">
            <i class="fa fa-trash" aria-hidden="true"></i>
            Hapus
          </button>
        <?php } else { ?>
          <button type="submit" name="aksi" value="add" class="btn btn-primary">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
            Tambahkan
          </button>
        <?php } ?>
        <a href="buttons.php" type="button" class="btn btn-secondary">
          <i class="fa fa-reply" aria-hidden="true"></i>
          Batal
        </a>
      </div>
    </div>
  </form> 
</div>
</body>
</html>
