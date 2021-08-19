<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/admin/'); ?>">
        <div class="sidebar-brand-icon rotate-n-0">
            <!-- <i class="fas fa-chalkboard-teacher"></i> -->
            <img src="<?= base_url('assets/'); ?>img/Logo_UKSW.png"></img>
        </div>
        <div class="sidebar-brand-text mx-3">Silandak. Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <div class="sidebar-heading">
        Dashboard
    </div>
    <li class="nav-item <?= ($aktif == 'dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard Admin</span></a>
    </li>

    <!-- Divider -->

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profil
    </div>
    <li class="nav-item <?= ($aktif == 'profil') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/profil'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil Admin</span></a>
    </li>
    <hr class="sidebar-divider">

    <!-- Heading
    <div class="sidebar-heading">
        Landing Page
    </div>
    <li class="nav-item <?= ($aktif == 'pengumuman') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/pengumuman'); ?>">
            <i class="fas fa-fw fa-image"></i>
            <span>Pengumuman</span></a>
    </li>
    <li class="nav-item <?= ($aktif == 'listpeng') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/listpengumuman'); ?>">
            <i class="fas fa-fw fa-image"></i>
            <span>List Pengumuman</span></a>
    </li> -->

    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>
    <li class="nav-item <?= ($aktif == 'user') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/data_user'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Data User</span></a>
    </li>

    <li class="nav-item <?= ($aktif == 'operator') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/data_opt'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Operator</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Dokumen & Pengaduan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Charts -->
    <li class="nav-item <?= ($aktif == 'listdok') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/listdok'); ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Dokumen Pengaduan</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= ($aktif == 'pengaduan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/admin/pengaduan'); ?>">
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