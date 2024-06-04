        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin') ?>">
                <div class="sidebar-brand-text mx-3">Dashboard Anggota</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link pb-0" href="<?php echo base_url('/') ?>">
                    <i class="fa fa-users"></i>
                    <span>Anggota</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link pb-0" href="<?php echo base_url('/berita') ?>">
                    <i class="fa fa-book"></i>
                    <span>Berita</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
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
        <!-- End  of Sidebar --> 