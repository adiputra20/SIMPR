<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <!-- href="index.html"> -->
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?php echo base_url() . 'assets/img/comlo.png'; ?> " width="40" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">SIM PAJAK & RETRIBUSI</div>

            </a>
            <!-- <div class="align-items-center justify-content-center">SIM-Pajak Retribusi</div> -->
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard/'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if ($this->session->userdata('akses') == "1") { ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Master Data
                </div>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?= $this->uri->segment(2) == "pangkat" || $this->uri->segment(2) == "jabatan" || $this->uri->segment(2) == "bidang" || $this->uri->segment(2) == "user" || $this->uri->segment(2) == "bank" || $this->uri->segment(2) == "pemda" ? "active" : null ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <!-- <i class="fas fa-fw fa-university"></i> -->
                        <i class="fa-solid fa-landmark-dome"></i>
                        <span>Pemerintah Daerah</span>
                    </a>
                    <div id="collapseUtilities" class="collapse <?= $this->uri->segment(2) == "pangkat" || $this->uri->segment(2) == "jabatan" || $this->uri->segment(2) == "bidang" || $this->uri->segment(2) == "user" || $this->uri->segment(2) == "bank" || $this->uri->segment(2) == "pemda" ? "show" : null ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Data Umum Pemda:</h6>
                            <a class="collapse-item <?= $this->uri->segment(2) == "pangkat" ? "active" : null ?>" href="<?php echo base_url('admin/pangkat/'); ?>">Pangkat</a>
                            <a class="collapse-item <?= $this->uri->segment(2) == "jabatan" ? "active" : null ?>" href="<?php echo base_url('admin/jabatan/'); ?>">Jabatan</a>
                            <a class="collapse-item <?= $this->uri->segment(2) == "bidang" ? "active" : null ?>" href="<?php echo base_url('admin/bidang/'); ?>">Bidang Pendapatan</a>
                            <a class="collapse-item <?= $this->uri->segment(2) == "user" ? "active" : null ?>" href="<?php echo base_url('admin/user/'); ?>">Pengguna Aplikasi</a>
                            <a class="collapse-item <?= $this->uri->segment(2) == "bank" ? "active" : null ?>" href="<?php echo base_url('admin/bank/'); ?>">Rekening Bank</a>
                            <a class="collapse-item <?= $this->uri->segment(2) == "pemda" ? "active" : null ?>" href="<?php echo base_url('admin/pemda/'); ?>">Data Umum Pemda</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item <?= $this->uri->segment(2) == "reklra" || $this->uri->segment(2) == "reklo" ? "active" : null ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fa-solid fa-laptop-file"></i>
                        <span>Rekening</span>
                    </a>
                    <div id="collapseTwo" class="collapse <?= $this->uri->segment(2) == "reklra" || $this->uri->segment(2) == "reklo" ? "show" : null ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Jenis Rekening:</h6>
                            <a class="collapse-item <?= $this->uri->segment(2) == "reklra" ? "active" : null ?>" href="<?php echo base_url('admin/reklra/'); ?>">Rekening - LRA</a>
                            <a class="collapse-item <?= $this->uri->segment(2) == "reklo" ? "active" : null ?>" href="<?php echo base_url('admin/reklo/'); ?>">Rekening - LO</a>
                        </div>
                    </div>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
            <?php } ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= $this->uri->segment(2) == "daftarp" || $this->uri->segment(2) == "daftarr" ? "active" : null ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pendaftaran" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Pendaftaran</span>
                </a>
                <div id="pendaftaran" class="collapse <?= $this->uri->segment(2) == "daftarp" || $this->uri->segment(2) == "daftarr" ? "show" : null ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jenis Pendaftaran</h6>
                        <a class="collapse-item <?= $this->uri->segment(2) == "daftarp" ? "active" : null ?>" href="<?php echo base_url('admin/daftarp/'); ?>">Pajak Daerah</a>
                        <a class="collapse-item <?= $this->uri->segment(2) == "daftarr" ? "active" : null ?>" href="<?php echo base_url('admin/daftarr/'); ?>">Retribusi Daerah</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?= $this->uri->segment(2) == "skpd" || $this->uri->segment(2) == "skrd" ? "active" : null ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penetapan" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Penetapan</span>
                </a>
                <div id="penetapan" class="collapse <?= $this->uri->segment(2) == "skpd" || $this->uri->segment(2) == "skrd" ? "show" : null ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jenis Penetapan</h6>
                        <a class="collapse-item <?= $this->uri->segment(2) == "skpd" ? "active" : null ?>" href="<?php echo base_url('admin/skpd/'); ?>">Pajak Daerah</a>
                        <a class="collapse-item <?= $this->uri->segment(2) == "skrd"  ? "active" : null ?>" href="<?php echo base_url('admin/skrd/'); ?>">Retribusi Daerah</a>
                    </div>
                </div>

            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?= $this->uri->segment(2) == "sspd" || $this->uri->segment(2) == "ssrd" || $this->uri->segment(2) == "nsts" || $this->uri->segment(2) == "fiskal" ? "active" : null ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penerimaan" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-coins"></i>
                    <span>Penerimaan</span>
                </a>
                <div id="penerimaan" class="collapse <?= $this->uri->segment(2) == "sspd" || $this->uri->segment(2) == "ssrd" || $this->uri->segment(2) == "nsts" || $this->uri->segment(2) == "fiskal" ? "show" : null ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jenis Penerimaan</h6>
                        <a class="collapse-item <?= $this->uri->segment(2) == "sspd" ? "active" : null ?>" href="<?php echo base_url('admin/sspd/'); ?>">SSPD</a>
                        <a class="collapse-item <?= $this->uri->segment(2) == "ssrd" ? "active" : null ?>" href="<?php echo base_url('admin/ssrd/'); ?>">SSRD</a>
                        <a class="collapse-item <?= $this->uri->segment(2) == "nsts" ? "active" : null ?>" href="<?php echo base_url('admin/nsts/'); ?>">Tanpa Penetapan</a>
                        <a class="collapse-item <?= $this->uri->segment(2) == "fiskal" ? "active" : null ?>" href="<?php echo base_url('admin/fiskal/'); ?>">Keterangan Fiskal</a>
                    </div>
                </div>
            </li>

            <li class="nav-item <?= $this->uri->segment(2) == "stpd" || $this->uri->segment(2) == "strd" ? "active" : null ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#penagihan" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <span>Penagihan</span>
                </a>
                <div id="penagihan" class="collapse <?= $this->uri->segment(2) == "stpd" || $this->uri->segment(2) == "strd" ? "show" : null ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tagihan/Teguran</h6>
                        <a class="collapse-item <?= $this->uri->segment(2) == "stpd" ? "active" : null ?>" href="<?php echo base_url('admin/stpd/'); ?>">STPD</a>
                        <a class="collapse-item <?= $this->uri->segment(2) == "strd" ? "active" : null ?>" href="<?php echo base_url('admin/strd/'); ?>">STRD</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Laporan
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/register/'); ?>">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Register</span></a>
            </li>

            <li class="nav-item <?= $this->uri->segment(2) == "bku" || $this->uri->segment(2) == "bukubesar" || $this->uri->segment(2) == "piutang" ? "active" : null ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#bp" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-book-open"></i>
                    <span>Buku Pembantu</span>
                </a>
                <div id="bp" class="collapse <?= $this->uri->segment(2) == "bku" || $this->uri->segment(2) == "bukubesar" || $this->uri->segment(2) == "piutang" ? "show" : null ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Buku Pembantu</h6>
                        <a class="collapse-item <?= $this->uri->segment(2) == "bku" ? "active" : null ?>" href="<?php echo base_url('admin/bku/?tanggalAwal=' . date("Y-m-d") . '&tanggalAkhir=' . date("Y-m-d")); ?>">Buku Kas Penerimaan</a>
                        <a class="collapse-item <?= $this->uri->segment(2) == "bukubesar" ? "active" : null ?>" href="<?php echo base_url('admin/bukubesar/?tanggalAwal=' . date("Y-m-d") . '&tanggalAkhir=' . date("Y-m-d") . '&obyek='); ?>">Buku Besar</a>
                        <a class="collapse-item <?= $this->uri->segment(2) == "piutang" ? "active" : null ?>" href="<?php echo base_url('admin/piutang/?obyek='); ?>">Rekap Piutang</a>
                    </div>
                </div>
            </li>
            <li class="nav-item <?= $this->uri->segment(2) == "lra" || $this->uri->segment(2) == "lo" || $this->uri->segment(2) == "neraca" ? "active" : null ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#lap" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-money-bill-trend-up"></i>
                    <span>Laporan Keuangan</span>
                </a>
                <div id="lap" class="collapse <?= $this->uri->segment(2) == "lra" || $this->uri->segment(2) == "lo" || $this->uri->segment(2) == "neraca" ? "show" : null ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan Keuangan</h6>
                        <a class="collapse-item <?= $this->uri->segment(2) == "lra" ? "active" : null ?>" href="<?php echo base_url('admin/lra/'); ?>">Realisasi Anggaran (LRA)</a>
                        <a class="collapse-item <?= $this->uri->segment(2) == "lo" ? "active" : null ?>" href="<?php echo base_url('admin/lo/'); ?>">Operasional (LO)</a>
                        <a class="collapse-item <?= $this->uri->segment(2) == "neraca" ? "active" : null ?>" href="<?php echo base_url('admin/neraca/'); ?>">Neraca</a>
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

                    <!-- Topbar Search -->
                    <img src="<?php echo base_url() . 'assets/img/logo.png'; ?>" class="img-fluid ml-2.5" width="40px">
                    <h1 class="h5 mb-0 text-gray-800 ml-3">PEMERINTAH <?php foreach ($pemda as $client) {
                                                                            echo $client->Nama_Pemda;
                                                                        }; ?></h1>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama'); ?></span>
                                <img class="img-profile rounded-circle" src="<?php if (is_null($this->session->userdata('foto')) || strlen(trim($this->session->userdata('foto'))) <= 0) {
                                                                                    echo base_url() . "assets/img/pegawai/blank.png";
                                                                                } else {
                                                                                    echo base_url() . "assets/img/pegawai/" . $this->session->userdata('foto');
                                                                                } ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('admin/user/editData/' . base64_encode($this->session->userdata('nip'))); ?>">
                                    <i class=" fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#gantiPassword">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ubah Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="keluar('<?php echo $this->session->userdata('nama'); ?>','<?php echo base_url('admin/auth/logout'); ?>')">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->