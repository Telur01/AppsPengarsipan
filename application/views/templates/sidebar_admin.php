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
    admin
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php echo (base_url('c_dashboard/dashboard_admin') === current_url()) ? 'active' : ''; ?>">
    <a class="nav-link" href="<?= base_url('c_dashboard/dashboard_admin'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <small>Dashboard</small>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    menu
</div>

<!-- Data Master Menu -->
<li class="nav-item ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-folder-open"></i>
        <span>Data Master</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('c_dokumentasi'); ?>">Dokumentasi Rapat</a>
            <a class="collapse-item" href="<?= base_url('c_monitoring'); ?>">Monitoring Izin Terbit</a>
            <a class="collapse-item" href="<?= base_url('c_arsipboss'); ?>">Arsip Boss</a>
            <a class="collapse-item" href="<?= base_url('c_peminjaman'); ?>" onclick="showAccessDeniedAlert(event)">Data Peminjaman</a>
            <a class="collapse-item" href="<?= base_url('c_aktif'); ?>" onclick="showAccessDeniedAlert(event)">Data Aktif</a>
            <a class="collapse-item" href="<?= base_url('c_inaktif'); ?>" onclick="showAccessDeniedAlert(event)">Data In-Aktif</a>
        </div>
    </div>
</li>

<!-- Laporan Menu -->
<li class="nav-item ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Laporan</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="<?= base_url('c_dokumentasi/laporan'); ?>">Dokumentasi Rapat</a>
            <a class="collapse-item" href="<?= base_url('c_monitoring/laporan'); ?>">Monitoring Izin Terbit</a>
            <a class="collapse-item" href="<?= base_url('c_arsipboss/laporan'); ?>">Arsip Boss</a>
            <a class="collapse-item" href="<?= base_url('c_peminjaman/laporan'); ?>" onclick="showAccessDeniedAlert(event)">Data Peminjaman</a>
            <a class="collapse-item" href="<?= base_url('c_aktif/laporan'); ?>" onclick="showAccessDeniedAlert(event)">Data Aktif</a>
            <a class="collapse-item" href="<?= base_url('c_inaktif/laporan'); ?>" onclick="showAccessDeniedAlert(event)">Data In-Aktif</a>
        </div>
    </div>
</li>

<!-- Recycle Bin Menu -->
<li class="nav-item ">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecycleBin"
        aria-expanded="true" aria-controls="collapseRecycleBin">
        <i class="fas fa-fw fa-recycle"></i>
        <span>Recycle Bin</span>
    </a>
    <div id="collapseRecycleBin" class="collapse" aria-labelledby="headingRecycleBin" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= site_url('c_recycleBin/RecycleBin_Dokrap'); ?>">Dokumentasi Rapat</a>
            <a class="collapse-item" href="<?= site_url('c_recycleBin/RecycleBin_MIT'); ?>">Monitoring Izin Terbit</a>
            <a class="collapse-item" href="<?= site_url('c_recycleBin/RecycleBin_Arbos'); ?>">Arsip Boss</a>
            <a class="collapse-item" href="<?= site_url('c_recycleBin/RecycleBin_Dokrap'); ?>" onclick="showAccessDeniedAlert(event)">Data Pinjaman</a>
            <a class="collapse-item" href="<?= site_url('c_recycleBin/RecycleBin_Dokrap'); ?>" onclick="showAccessDeniedAlert(event)">Data In-Aktif</a>
            <a class="collapse-item" href="<?= site_url('c_recycleBin/RecycleBin_Dokrap'); ?>" onclick="showAccessDeniedAlert(event)">Data Aktif</a>
            
    </div>
</li>

 <!-- Nav Item - Data User -->
 <li class="nav-item <?php echo (base_url('c_user') === current_url()) ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('c_user'); ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Data Users</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->