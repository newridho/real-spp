<?php
session_start();
ob_start();
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
    $_SESSION['sukses'] = 'Data Berhasil Disimpan';
	include "koneksi.php";
?>

    <?php include "templates/headerAd.php"; ?>

  <body id="page-top" class="text-dark">

    <?php include "menu.php"; ?>

  	<div class="container-fluid">
	   
	<?php
	if( isset($_REQUEST['hlm'] )){
		
		$hlm = $_REQUEST['hlm'];
		
		switch( $hlm ){
			case 'bayar':
				include "pembayaran.php";
				break;
			case 'laporan':
				include "laporan.php";
				break;
			case 'master':
				include "master.php";
				break;
			case 'user':
				include "profil.php";
				break;
		}
	} else {
	?>

      <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
                <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <div class="row mt-4 mx-auto">
                        <div class="jumbotron px-auto shadow-lg">
                            <h2 align="center">APLIKASI PEMBAYARAN SPP </h2>
                            <p align="center">Jl. Raya Kedungpedaringan Kepanjen</p>
                            <p align="center">Selamat Datang<strong></strong></p>
                        </div>
                    </div>
                </div> -->

                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Kelas </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">4   </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fad fa-chalkboard fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Siswa</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fad fa-user-graduate fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengeluaran
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">20%</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 20%" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Pemasukan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 10.000.000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fad fa-hands-usd fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
	<?php
	}
	?>
    </div> <!-- /container -->


	
<?php
    include "templates/footerAd.php";

}
?>