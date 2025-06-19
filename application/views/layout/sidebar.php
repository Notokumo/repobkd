<?php $menu = $this->uri->segment(2); ?>
    <aside class="main-sidebar sidebar-dark-navy elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="<?= base_url('public/') ?>dist/img/AdminLTELogo.png" alt="STIKES Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">REPOSITORY BKD</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= base_url('public/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $this->session->userdata('nama') ?></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?= base_url('adminnya/dashboard') ?>" class="nav-link <?php if(strtolower($menu)==strtolower('dashboard')){echo 'active';}?>">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('adminnya/kategori') ?>" class="nav-link <?php if(strtolower($menu)==strtolower('kategori')){echo 'active';}?>">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Master Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('adminnya/subkategori') ?>" class="nav-link <?php if(strtolower($menu)==strtolower('subkategori')){echo 'active';}?>">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>Master Sub Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('adminnya/thn_akademik') ?>" class="nav-link <?php if(strtolower($menu)==strtolower('thn_akademik')){echo 'active';}?>">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Master Tahun Akademik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('adminnya/dosen') ?>" class="nav-link <?php if(strtolower($menu)==strtolower('dosen')){echo 'active';}?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Master Dosen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('adminnya/bkd') ?>" class="nav-link <?php if(strtolower($menu)==strtolower('bkd')){echo 'active';}?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Master BKD</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('adminnya/excel') ?>" class="nav-link <?php if(strtolower($menu)==strtolower('excel')){echo 'active';}?>">
                            <i class="nav-icon fas fa-file-excel"></i>
                            <p>Export Excel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('adminnya/ganti_password') ?>" class="nav-link <?php if(strtolower($menu)==strtolower('ganti_password')){echo 'active';}?>">
                            <i class="nav-icon fas fa-key"></i>
                            <p>Ubah Password</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('adminnya/logout') ?>" class="nav-link <?php if(strtolower($menu)==strtolower('logout')){echo 'active';}?>">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>

        <!-- /.sidebar -->
    </aside>