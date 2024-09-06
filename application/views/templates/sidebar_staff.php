<!-- Sidebar -->

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-4 mb-2" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?php echo base_url('assets/img/logo-dpmptsp.png') ?>" width="50" height="50">
        </div>
        <div class="sidebar-brand-text mx-3">BackOffice DPMPTSP</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Heading -->
    <div class="sidebar-heading">
        Staff
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo (base_url('c_dashboard/dashboard_staff') === current_url()) ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('c_dashboard/dashboard_staff'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <small>Dashboard</small></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Dokumentasi -->
    <li class="nav-item <?php echo (base_url('c_dokumentasi') === current_url()) ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('c_dokumentasi'); ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Dokumentasi Rapat</span>
        </a>
    </li>

       <!-- Nav Item - Monitoring -->
    <li class="nav-item <?php echo (base_url('c_monitoring') === current_url()) ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('c_monitoring'); ?>">
            <i class="fas fa-fw fa-desktop"></i>
            <span>Monitoring Izin Terbit</span>
        </a>
    </li>

    <!-- Nav Item - ArsipBoss -->
    <li class="nav-item <?php echo (base_url('c_arsipboss') === current_url()) ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('c_arsipboss'); ?>">
            <i class="far fa-fw fa-file"></i>
            <span>Arsip Boss</span>
        </a>
    </li>

    <!-- Nav Item - Peminjaman -->
    <li class="nav-item <?php echo (base_url('c_peminjaman') === current_url()) ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('c_peminjaman'); ?>" onclick="showAccessDeniedAlert(event)">
            <i class="fas fa-fw fa-book"></i>
            <span>Data Peminjaman</span>
        </a>
    </li>

    <!-- Nav Item - Aktif -->
    <li class="nav-item <?php echo (base_url('c_aktif') === current_url()) ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('c_aktif'); ?>" onclick="showAccessDeniedAlert(event)">
        <i class="far fa-fw fa-folder-open"></i>
            <span>Data Aktif</span>
        </a>
    </li>

     <!-- Nav Item - Data User -->
    <li class="nav-item <?php echo (base_url('c_inaktif') === current_url()) ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('c_inaktif'); ?>" onclick="showAccessDeniedAlert(event)">
        <i class="fas fa-fw fa-folder-open"></i>
            <span>Data In-Aktif</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
