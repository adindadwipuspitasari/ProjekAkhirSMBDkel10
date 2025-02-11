<?php 
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Query untuk mengambil data peminjaman
$query_peminjaman = "SELECT * FROM laporan_peminjaman";
$result_peminjaman = mysqli_query($koneksi, $query_peminjaman);

// Memeriksa apakah query berhasil dijalankan
if (!$result_peminjaman) {
    die("Query untuk mengambil data peminjaman gagal");
}

// Memuat data peminjaman ke dalam array
$peminjaman = mysqli_fetch_all($result_peminjaman, MYSQLI_ASSOC);
?>

<?php 
include "koneksi.php";
// Query untuk menghitung jumlah buku dan penjualan
$query1 = "SELECT COUNT(*) as total FROM peminjam";
$result = mysqli_query($koneksi, $query1);
$data = mysqli_fetch_assoc($result);
$jumlah_peminjam = $data['total'];
?>

<?php 
include "koneksi.php";
// Query untuk menghitung jumlah buku dan penjualan
$query1 = "SELECT COUNT(*) as total FROM barang";
$result = mysqli_query($koneksi, $query1);
$data = mysqli_fetch_assoc($result);
$jumlah_barang = $data['total'];
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta
			http-equiv="X-UA-Compatible"
			content="IE=edge"
		/>
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
		<meta
			name="description"
			content=""
		/>
		<meta
			name="author"
			content=""
		/>

		<title>Dashboard</title>

		<!-- Custom fonts for this template-->
		<link
			href="vendor/fontawesome-free/css/all.min.css"
			rel="stylesheet"
			type="text/css"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet"
		/>

		<!-- Custom styles for this template-->
		<link
			href="css/sb-admin-2.min.css"
			rel="stylesheet"
		/>
	</head>

	<body id="page-top">
		<!-- Page Wrapper -->
		<div id="wrapper">
			<!-- Sidebar -->
			<ul
				class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
				id="accordionSidebar"
			>
				<!-- Sidebar - Brand -->
				<a
					class="sidebar-brand d-flex align-items-center justify-content-center"
					href="dashboard.php"
				>
					<div class="sidebar-brand-icon rotate-n-15">
						<i class="fas fa-laugh-wink"></i>
					</div>
					<div class="sidebar-brand-text mx-3">PRAKTIKUM <sup>SMBD</sup></div>
				</a>

				<!-- Divider -->
				<hr class="sidebar-divider my-0" />

				<!-- Nav Item - Dashboard -->
				<li class="nav-item active">
					<a
						class="nav-link"
						href="dashboard.php"
					>
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Dashboard</span></a
					>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider" />

				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item">
					<a
						class="nav-link collapsed"
						href="#"
						data-toggle="collapse"
						data-target="#collapseTwo"
						aria-expanded="true"
						aria-controls="collapseTwo"
					>
						<i class="fas fa-fw fa-cog"></i>
						<span>Trigger</span>
					</a>
					<div
						id="collapseTwo"
						class="collapse"
						aria-labelledby="headingTwo"
						data-parent="#accordionSidebar"
					>
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Nama Trigger</h6>
							<a
								class="collapse-item"
								href="buttons.php"
								>Trigger</a
							>
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
				<hr class="sidebar-divider" />					
			</ul>

			<!-- Content Wrapper -->
			<div
				id="content-wrapper"
				class="d-flex flex-column"
			>
				<!-- Main Content -->
				<div id="content">
					<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
						<!-- Sidebar Toggle (Topbar) -->
						<button
							id="sidebarToggleTop"
							class="btn btn-link d-md-none rounded-circle mr-3"
						>
							<i class="fa fa-bars"></i>
						</button>

						<h1 class="h3 mb-1 text-gray-800">Dashboard</h1>  

						<!-- Topbar Navbar -->
						<ul class="navbar-nav ml-auto">
							<!-- Nav Item - Search Dropdown (Visible Only XS) -->
							<li class="nav-item dropdown no-arrow d-sm-none">
								<a
									class="nav-link dropdown-toggle"
									href="#"
									id="searchDropdown"
									role="button"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
								>
									<i class="fas fa-search fa-fw"></i>
								</a>
								<!-- Dropdown - Messages -->
								<div
									class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
									aria-labelledby="searchDropdown"
								>
									<form class="form-inline mr-auto w-100 navbar-search">
										<div class="input-group">
											<input
												type="text"
												class="form-control bg-light border-0 small"
												placeholder="Search for..."
												aria-label="Search"
												aria-describedby="basic-addon2"
											/>
											<div class="input-group-append">
												<button
													class="btn btn-primary"
													type="button"
												>
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
								<a
									class="nav-link dropdown-toggle"
									href="#"
									id="userDropdown"
									role="button"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
								>
									<span class="mr-2 d-none d-lg-inline text-gray-600 small">Kelompok 10</span>
									<img
										class="img-profile rounded-circle"
										src="img/undraw_profile.svg"
									/>
								</a>
								<!-- Dropdown - User Information -->
								<div
									class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
									aria-labelledby="userDropdown"
								>
									<a
										class="dropdown-item"
										href="#"
										data-toggle="modal"
										data-target="#logoutModal"
									>
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
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
						</div>

						<!-- Content Row -->
						<div class="row">
							<!-- TOTAL BARANF -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Barang</div>
												<!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> -->
												<p class="card-text"><?php echo "" . $jumlah_barang; ?></p>
											</div>
											<div class="col-auto">
												<i class="fas fa-calendar fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- TOTAL PEMINJAM -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Peminjam</div>
												<!-- <div class="h5 mb-0 font-weight-bold text-gray-800"></d$215,000iv> -->
												<p class="card-text"><?php echo "" . $jumlah_peminjam; ?></p>
											</div>
											<div class="col-auto">
												<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">Laporan Peminjaman</h6>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table
										class="table table-bordered"
										id="dataTable"
										width="100%"
										cellspacing="0"
									>
										<thead>
											<tr>
												<th>id_peminjaman</th>
												<th>id_pembayaran</th>
												<th>id_transaksi</th>
												<th>nama_peminjam</th>
												<th>nama_barang</th>
												<th>no_telp</th>
											</tr>
										</thead>
										<tbody>
											<?php $id_peminjaman=1;?>
											<?php foreach ($peminjaman as $row): ?>
												<tr>
													<td><?php echo $id_peminjaman; ?></td>
													<td><?php echo $row["id_pembayaran"]; ?></td>
													<td><?php echo $row["id_transaksi"]; ?></td>
													<td><?php echo $row["nama_peminjam"]; ?></td>
													<td><?php echo $row["nama_barang"]; ?></td>
													<td><?php echo $row["no_telp"]; ?></td>
												</tr>
												<?php $id_peminjaman++; ?>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- End of Main Content -->

				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Kelompok 10 &copy; Paktikum SMBD 2024</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->
			</div>
			<!-- End of Content Wrapper -->
		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a
			class="scroll-to-top rounded"
			href="#page-top"
		>
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<div
			class="modal fade"
			id="logoutModal"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalLabel"
			aria-hidden="true"
		>
			<div
				class="modal-dialog"
				role="document"
			>
				<div class="modal-content">
					<div class="modal-header">
						<h5
							class="modal-title"
							id="exampleModalLabel"
						>
							Yakin Ingin Keluar?
						</h5>
						<button
							class="close"
							type="button"
							data-dismiss="modal"
							aria-label="Close"
						>
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Pilih “Logout” di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
					<div class="modal-footer">
						<button
							class="btn btn-secondary"
							type="button"
							data-dismiss="modal"
						>
							Cancel
						</button>
						<a
							class="btn btn-primary"
							href="index.php"
							>Logout</a
						>
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

		<!-- Page level plugins -->
		<script src="vendor/chart.js/Chart.min.js"></script>

		<!-- Page level custom scripts -->
		<script src="js/demo/chart-area-demo.js"></script>
		<script src="js/demo/chart-pie-demo.js"></script>
	</body>
</html>
