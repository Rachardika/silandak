<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/operator/'); ?>">
        <div class="sidebar-brand-icon rotate-n-0">
            <!-- <i class="fas fa-chalkboard-teacher"></i> -->
            <img src="<?= base_url('assets/'); ?>img/Logo_UKSW.png"></img>
        </div>
        <div class="sidebar-brand-text mx-3">Silandak. Operator</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <div class="sidebar-heading">
        Dashboard
    </div>
    <li class="nav-item <?= ($aktif == 'dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/operator/'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard Operator</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profil
    </div>
    <li class="nav-item <?= ($aktif == 'profil') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/operator/profil'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil Operator</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pengaduan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Charts -->
    <li class="nav-item <?= ($aktif == 'listdok') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/operator/listdok'); ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Dokumen Pengaduan</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= ($aktif == 'pengaduan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/operator/pengaduan'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Pengaduan</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->