 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger text-white sidebar accordion" id="accordionSidebar" style="
            background: #02A2FF !important;">
            <!-- background: linear-gradient(to bottom, #da22ff, #9733ee, #da22ff, #9733ee) !important;  -->
            <!-- background: linear-gradient(to bottom, #000000, #373737) !important;  -->
            <!-- border-radius: 0 45px 45px 0; -->
            <div class="paimon-bg"></div>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-code"></i> -->
                    <i class="far fa-book-open text-white"></i>
                </div>
                <div class="sidebar-brand-text mx-3 text-white  ">SPP <sup class="badge badge-danger " style="background-color: #FF9000 !important; font-family: sans-serif; color: #0F0F0F;">Ridho</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 bg-light">

            <!-- Heading -->
            <div class="sidebar-heading mt-3">
                Umum
            </div>


            <!-- Nav Item - Home -->
            <li class="nav-item active">
                <a class="nav-link pb-0" href="./admin.php">
                    <i class="far fa-tachometer-alt-fastest font-s-17"></i>
                    <span>Beranda</span></a>
            </li>

             <!-- Nav Item - Pembayaran -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="./admin.php?hlm=bayar"> 
                    <i class="fad fa-fw fa-money-bill-wave font-s-17"></i>
                    <span>Pembayaran</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link pb-0" href="./admin.php?hlm=master&sub=jenis"> 
                    <i class="fad fa-fw fa-money-check-edit-alt font-s-17"></i>
                    <span>Jenis Bayar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3 bg-light">

            <!-- Heading -->
            <div class="sidebar-heading mt-1 mb-1">
                Laporan
            </div>


            <li class="nav-item">
                <a class="nav-link pb-0" href="./admin.php?hlm=laporan"> 
                    <i class="fad fa-fw fa-file-chart-line font-s-17"></i>
                    <span>Rekap Pembayaran</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link pb-0" href="./admin.php?hlm=laporan&sub=tagihan"> 
                    <i class="fad fa-fw fa-print font-s-17"></i>
                    <span>Cetak Tagihan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3 bg-light">

            <!-- Heading -->
            <div class="sidebar-heading mt-1 mb-1">
                Data
            </div>

            <li class="nav-item">
                <a class="nav-link pb-0" href="./admin.php?hlm=master&sub=jurusan"> 
                    <i class="far fa-fw fa-layer-group font-s-17"></i>
                    <span>Jurusan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link pb-0" href="./admin.php?hlm=master&sub=siswa"> 
                    <i class="fad fa-fw fa-users font-s-17"></i>
                    <span>Siswa</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link pb-0" href="./admin.php?hlm=master&sub=kelas"> 
                    <i class="fad fa-fw fa-users-class font-s-17"></i>
                    <span>Kelas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link pb-0" href="./admin.php?hlm=master&sub=tapel"> 
                    <i class="far fa-fw fa-calendar-star font-s-17"></i>
                    <span>Tahun Pelajaran</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3 mb-1 bg-light">

            <!-- Heading -->
            <!-- <div class="sidebar-heading mt-3">
                Mini Games
            </div>

            -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading mt-2 mb-2">
                Admin
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo"> 
                    <i class="far fa-fw fa-file-chart-line"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./admin.php?hlm=laporan">Rekap Pembayaran</a>
                        <a class="collapse-item" href="./admin.php?hlm=laporan&sub=tagihan">Cetak Tagihan</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities"> 
                    <i class="fad fa-fw fa-database"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./admin.php?hlm=master&sub=jurusan">Jurusan</a>
                        <a class="collapse-item" href="./admin.php?hlm=master&sub=siswa">Siswa</a>
                        <a class="collapse-item" href="./admin.php?hlm=master&sub=kelas">Kelas</a>
                        <div class="dropdown-divider"></div>
                        <a class="collapse-item" href="./admin.php?hlm=master&sub=jenis">Jenis Bayar</a>
                        <a class="collapse-item" href="./admin.php?hlm=master">User</a>
                        <div class="dropdown-divider"></div>
                        <a class="collapse-item" href="./admin.php?hlm=master&sub=tapel">Tahun Pelajaran</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Home -->
            <li class="nav-item mt-0">
                <a class="nav-link" href="./logout.php">
                    <!-- <i class="fas fa-fw fa-sign-out-alt"></i> --> <!-- Free -->
                    <i class="far fa-fw fa-sign-out-alt font-s-17"></i>
                    <span>Logout</span></a>
            </li>

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="px-auto text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

        </ul>

        