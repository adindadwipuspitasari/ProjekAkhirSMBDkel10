<?php
  include 'koneksi.php';
  session_start();

  $peminjam = "SELECT * FROM log_peminjaman;";
  $koneksi = mysqli_connect($server, $user, $password, $database)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href= "datatables/datatables.css">
    <script type="text/javascript" src="datatables/datatables.js"></script>
    <title>SB Admin 2 - Buttons</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-ZqneIyZ6h0MqlWw9Nd2cuhB0f7PIFnSoLvscFth2nubPA3DC9j3Ml8ObC5vZs9F8t73hY6UpC29E5qVv3GWZow==" crossorigin="anonymous" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Trigger</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Nama Trigger:</h6>
                        <a class="collapse-item active" href="dashboard.php">Trigger</a>
                    </div>
                </div>
            </li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a
    class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseTabel"
        aria-expanded="true"
        aria-controls="collapseTabel"
    >
        <i class="fas fa-fw fa-wrench"></i>
        <span>Tabel</span>
    </a>
    <div
        id="collapseTabel"
        class="collapse"
        aria-labelledby="headingTabel"
        data-parent="#accordionSidebar"
    >
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Nama Tabel:</h6>
            <a
                class="collapse-item"
                href="utilities-peminjam.php"
                >Peminjam</a
            >
            <a
                class="collapse-item"
                href="utilities-barang.php"
                >Barang</a
            >
            <a
                class="collapse-item"
                href="utilities-pembayaran.php"
                >Pembayaran</a
            >
            <a
                class="collapse-item"
                href="utilities-transaksi.php"
                >Transaksi</a
            >
        </div>
    </div>
</li>

<!-- Nav Item - View Collapse Menu -->
<li class="nav-item">
    <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseView"
        aria-expanded="true"
        aria-controls="collapseView"
    >
        <i class="fas fa-fw fa-wrench"></i>
        <span>View</span>
    </a>
    <div
        id="collapseView"
        class="collapse"
        aria-labelledby="headingView"
        data-parent="#accordionSidebar"
    >
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">View:</h6>
            <a
                class="collapse-item"
                href="view-pembayaran.php"
                >infopembayaran</a
            >
            <a
                class="collapse-item"
                href="view-peminjaman.php"
                >infopeminjaman</a
            >
            <a
                class="collapse-item"
                href="view-peminjaman.php"
                >infotransaksi</a
            >
            <a
                class="collapse-item"
                href="view-barang.php"
                >new_barang</a
            >
            <a
                class="collapse-item"
                href="view-peminjam.php"
                >new_peminjam</a
            >
        </div>
    </div>
</li>

<li class="nav-item">
    <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#collapseStoredProcedure"
        aria-expanded="true"
        aria-controls="collapseStoredProcedure"
    >
        <i class="fas fa-fw fa-wrench"></i>
        <span>Stored Procedure</span>
    </a>
    <div
        id="collapseStoredProcedure"
        class="collapse"
        aria-labelledby="headingStoredProcedure"
        data-parent="#accordionSidebar"
    >
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Stored Procedure:</h6>
            <a
                class="collapse-item"
                href="stored-barang.php"
                >Barang</a
            >
            <a
                class="collapse-item"
                href="stored-pembayaran.php"
                >Pembayaran</a
            >
            <a
                class="collapse-item"
                href="stored-peminjam.php"
                >Peminjam</a
            >
            <a
                class="collapse-item"
                href="stored-peminjaman.php"
                >Peminjaman</a
            >
            <a
                class="collapse-item"
                href="stored-transaksi.php"
                >Transaksi</a
            >
        </div>
    </div>
</li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h1 class="h3 mb-1 text-gray-800">Trigger</h1>  

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
							<!-- Nav Item - Search Dropdown (Visible Only XS) -->
							<!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-search fa-fw"></i>
                      </a>
								<!-- Dropdown - Messages -->
								<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                      aria-labelledby="searchDropdown">
                      <form class="form-inline mr-auto w-100 navbar-search">
                          <div class="input-group">
                              <input type="text" class="form-control bg-light border-0 small"
                                  placeholder="Search for..." aria-label="Search"
                                  aria-describedby="basic-addon2">
                              <div class="input-group-append">
                                  <button class="btn btn-primary" type="button">
                                      <i class="fas fa-search fa-sm"></i>
                                  </button>
                              </div>
                          </div>
                        </form>
                  </div>
                </li>

							<div class="topbar-divider d-none d-sm-block"></div>

								<!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Kelompok 10</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">CRUD</h1>

                    </div>

  <script type="text/javascript">
    $(document).ready(function (){
      $('#dt').DataTable();
    });
  </script>

      <div class="col-md-10">
        <div class="card">
          <div class="card-body ">
            <h5 class="card-title">Peminjam Alat Musik</h5>
            <p class="card-text">Data Alat Musik</p>
            <a href="kelola.php" type="button" class="btn btn-primary btn-sm ml-5 mb-3" >
              <i class="fa fa-plus"></i>
              Tambah Data
            </a>
            
      <div class="container">
        <?php 
          if(isset($_SESSION['eksekusi'])):
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
              echo $_SESSION['eksekusi'];
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
          session_destroy();
          endif;
        ?>
        <div class="table-responsive">
                    <table id="dt" class="table align-middle table-bordered mt-2 table-hover">
                        <thead>
                            <tr>
                                <th><center>log_id</center></th>
                                <th>id_peminjam</th>
                                <th>nama_peminjam</th>
                                <th>no_telp</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT log_id, id_peminjam, nama_peminjam, no_telp FROM log_peminjam"; 
                            $result = mysqli_query($koneksi, $query);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['log_id']; ?></td>
                                <td><?php echo $row['id_peminjam']; ?></td>
                                <td><?php echo $row['nama_peminjam']; ?></td>
                                <td><?php echo $row['no_telp']; ?></td>
                                <td>
                                <center>
                                    <a href="kelola.php?ubah=<?php echo $row['log_id']; ?>" type="button" class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="proses.php?hapus=<?php echo $row['log_id']; ?>" type="button" class="btn btn-warning btn-sm" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus??')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </center>
                                </td>
                            </tr>
                            <?php
                                }
                                mysqli_free_result($result);
                            } else {
                                echo '<tr><td colspan="6">Error: ' . mysqli_error($koneksi) . '</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
               
        </div>
      <div class="mb-5"></div>

                        <div class="col-lg-6">
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
             <center>
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Kelompok 10 &copy; Paktikum SMBD 2024</span>
                </div>
              </div>
            </center>
            </footer>
				<!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

     <!-- Scroll to Top Button-->
     <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>