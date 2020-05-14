        <?php
        $session = \Config\Services::session();
        echo view("template/navbar"); ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('assets/dist/img/avatar2.png') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $session->get('nama'); ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="tree" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?php echo base_url("admin/home"); ?>" class=" nav-link <?php echo $req == 'home' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" <?php echo base_url("admin/barang"); ?>" class=" nav-link <?php echo $req == 'barang' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Barang
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("admin/kategori"); ?>" class=" nav-link <?php echo $req == 'kategori' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-circle-notch"></i>
                                <p>
                                    Kategori
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("admin/pegawai"); ?>" class=" nav-link <?php echo $req == 'pegawai' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Pegawai
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" <?php echo base_url("admin/laporan"); ?>" class=" nav-link <?php echo $req == 'laporan' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-cash-register"></i>
                                <p>
                                    Laporan Transaksi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("admin/setting"); ?>" class=" nav-link <?php echo $req == 'setting' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Setting
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("logout"); ?>" class=" nav-link <?php echo $req == 'logout' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>