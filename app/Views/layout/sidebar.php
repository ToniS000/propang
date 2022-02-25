<!-- Sidebar -->
<?php $uri = service('uri'); ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-chart-pie"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SimPangan</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <?php if (session()->get('id_role') == 1) : ?>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($uri->getSegment(1) == 'admin' ? 'active' : null) ?>">
      <a class="nav-link" href="/admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Administrator
    </div>

    <li class="nav-item">
      <a class="nav-link" href="kel_user">
        <i class="fas fa-fw fa-users"></i>
        <span>Kelola User</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="kel_lembaga">
        <i class="fas fa-fw fa-cog"></i>
        <span>Kelola Kelembagaan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="kel_penyuluh">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Kelola Kepenyuluhan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      Users
    </div>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-folder"></i>
        <span>Kelola Pertanian</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-folder"></i>
        <span>Kelola Peternakan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-folder"></i>
        <span>Kelola Perikanan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Kelola Penyuluhan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Kelola Kelembagaan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
  <?php elseif (session()->get('id_role') == 2) : ?>

    <!-- Heading -->
    <li class="nav-item <?= ($uri->getSegment(1) == 'member' ? 'active' : null) ?>">
      <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>User</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading mt-3">
      Users
    </div>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-folder"></i>
        <span>Kelola Pertanian</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-folder"></i>
        <span>Kelola Peternakan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-folder"></i>
        <span>Kelola Perikanan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Kelola Penyuluhan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Kelola Kelembagaan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
  <?php else : ?>
    <!-- Heading -->
    <li class="nav-item <?= ($uri->getSegment(1) == 'home' || '/' ? 'active' : null) ?>">
      <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading mt-3">
      Home
    </div>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-folder"></i>
        <span>Kelola Pertanian</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-folder"></i>
        <span>Kelola Peternakan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-folder"></i>
        <span>Kelola Perikanan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Kelola Penyuluhan</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Kelola Kelembagaan</span></a>
    </li>
  <?php endif; ?>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->