<!DOCTYPE html>
<?php
  include 'koneksi.php';
  session_start();

  $log_id = '';
  $id_peminjam = '';
  $nama_peminjam = '';
  $no_telp = '';
  $inserted_at = '';

  if (isset($_GET['ubah'])) { 
    $log_id = $_GET['ubah'];  // Menggunakan $log_id yang benar

    $query = "SELECT * FROM log_peminjam WHERE log_id = '$log_id';";
    $sql = mysqli_query($koneksi, $query);

      $result = mysqli_fetch_assoc($sql);  // Menggunakan hasil query, bukan koneksi

      $id_peminjam = $result['id_peminjam'];
      $nama_peminjam = $result['nama_peminjam'];
      $no_telp = $result['no_telp'];
      $inserted_at = $result['inserted_at'];
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
  <div class="container mt-5">
    <form method="POST" action="proses.php">
      <input type="hidden" value="<?php echo $log_id; ?>" name="log_id">
      <div class="mb-3 row">
        <label for="id_peminjam" class="col-sm-2 col-form-label">ID Peminjam</label>
        <div class="col-sm-10">
          <input required type="text" name="id_peminjam" class="form-control" id="id_peminjam" placeholder="Ex: 1" value="<?php echo $id_peminjam; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="nama_peminjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
        <div class="col-sm-10">
          <input required type="text" name="nama_peminjam" class="form-control" id="nama_peminjam" placeholder="Ex: Viana" value="<?php echo $nama_peminjam; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="no_telp" class="col-sm-2 col-form-label">No. Telepon</label>
        <div class="col-sm-10">
          <input required type="text" name="no_telp" class="form-control" id="no_telp" placeholder="Ex: 082337187828" value="<?php echo $no_telp; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inserted_at" class="col-sm-2 col-form-label">Tanggal Dimasukkan</label>
        <div class="col-sm-10">
          <input required type="text" name="inserted_at" class="form-control" id="inserted_at" placeholder="Ex: 2024-05-28" value="<?php echo $inserted_at; ?>">
        </div>
      </div>
      <div class="mb-3 row mt-4">
        <div class="col">
          <?php if (isset($_GET['ubah'])) { ?>
            <button type="submit" name="aksi" value="edit" class="btn btn-primary">
              <i class="fa fa-floppy-o" aria-hidden="true"></i>
              Simpan
            </button>
          <?php } else { 
            ?>
            <button type="submit" name="aksi" value="add" class="btn btn-primary">
              <i class="fa fa-floppy-o" aria-hidden="true"></i>
              Tambahkan
            </button>
          <?php 
          } 
          ?>
          <a href="buttons.php" type="button" class="btn btn-danger">
            <i class="fa fa-reply" aria-hidden="true"></i>
            Batal
          </a>
        </div>
      </div>
    </form> 
  </div>
</body>
</html>
