<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">
                        CORE
                    </div>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/dashboard'); ?>" class="nav-link px-3 active">
                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider bg-light" />
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Pages
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#user">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span>User</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="<?php echo site_url('admin/user'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                    <span>User List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/user/create'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-plus"></i></span>
                                    <span>Create User</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#kategori">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span>Harga</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="kategori">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="<?php echo site_url('admin/harga'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                    <span>Harga List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/harga/create'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-plus"></i></span>
                                    <span>Create Harga</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#nominal">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span>Nominal</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="nominal">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="<?php echo site_url('admin/nominal'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                    <span>nominal List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/nominal/create'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-plus"></i></span>
                                    <span>Create nominal</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#pelanggan">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span>Pelanggan</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="pelanggan">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="<?php echo site_url('admin/pelanggan'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                    <span>Pelanggan List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/pelanggan/create'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-plus"></i></span>
                                    <span>Create Pelanggan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#transaksi">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span>Transaksi</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="transaksi">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="<?php echo site_url('admin/transaksi'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                    <span>Transaksi List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/transaksi/create'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-plus"></i></span>
                                    <span>Create transaksi</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('admin/transaksi/lunas'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-box-seam"></i></span>
                                    <span>Hutang List</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/transaksi/lunas'); ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-box"></i></span>
                                    <span>Lunas List</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>