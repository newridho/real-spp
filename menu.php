<?php
if( !empty( $_SESSION['iduser'] ) ){
?>

<!-- Page Wrapper -->
    <div id="wrapper">

    <?php include "templates/sidebar.php"; ?>
    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

	            <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="
                background-color: #fff;">
                <!-- background: linear-gradient(to right, #000000, #373737) !important;   -->
                    <!-- border-top-left-radius: 45px; border-top-right-radius: 45px; -->

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-black small mr-3">Games</span>
                            <i class="fab fa-fw fa-playstation text-black font-s-20"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./admin.php?hlm=master">
                                    <i class="fad fa-fw fa-chess-knight mr-2 text-dark-400"></i>
                                    Catur
                                </a>
                                <a class="dropdown-item" href="./admin.php?hlm=master">
                                    <i class="far fa-fw fa-bring-forward mr-2 text-dark-400"></i>
                                    Flip Card
                                </a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-black small mr-3"> <?php echo $_SESSION['fullname']; ?></span>
                            <i class="fad fa-fw fa-user-headset text-black"></i> 
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <button class="dropdown-item" data-toggle="modal" data-target="#profil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-dark-400"></i>
                                    Profile
                                </button>
                                <button class="dropdown-item" data-toggle="modal" data-target="#gantiPass">
                                    <i class="fas fa-sync-alt fa-sm fa-fw mr-2 text-dark-400"></i>
                                    Ganti Password
                                </button>
                                <a class="dropdown-item" href="./admin.php?hlm=master">
                                    <i class="fad fa-fw fa-user-cog fa-sm fa-fw mr-2 text-dark-400"></i>
                                    User
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Modal Profil -->
                <div class="modal fade" id="profil" tabindex="-1" aria-labelledby="profilLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="profilModalLabel">Profil Anda</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="row ml-2">
                                <div class="col-lg-12">
                                    <div class="form-group row mt-3">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="nama" value="<?= $_SESSION['fullname'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">    
                                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="username" value="<?= $_SESSION['username'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Password</label>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-auto mr-auto">
                                                    <em class="ml-1">tidak ditampilkan</em>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <span class="d-inline-block" data-toggle="tooltip" data-placement="bottom" title="Ganti Password">
                                                        <button class="badge badge-warning badge-sm" data-toggle="modal" data-target="#gantiPass">
                                                            <i class="fad fa-sync-alt text-dark"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Profil -->
                <div class="modal fade" id="gantiPass" tabindex="-1" aria-labelledby="gantiPassLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="gantiPassModalLabel">Ganti Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="row ml-2">
                                <div class="col-lg-11">
                                <form method="post" action="admin.php?hlm=user&sub=pass">
                                    <div class="form-group row mt-3">
                                        <label for="nama" class="col-sm-4 col-form-label">Password Lama</label>
                                        <div class="col-sm-7">
                                            <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Password lama" required autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label for="nama" class="col-sm-4 col-form-label">Password Baru</label>
                                        <div class="col-sm-7">
                                           <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Password baru" required>
                                            <small>setelah menekan tombol <b>Simpan</b>, anda akan diminta melakukan Login ulang.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                    
                                </form>
                        </div>
                    </div>
                </div>

                

<?php
} else {
	header("Location: ./");
	die();
}
?>