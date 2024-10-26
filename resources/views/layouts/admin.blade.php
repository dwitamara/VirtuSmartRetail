<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Virtus Mart Retail</title>
    @vite([
        // 'resources/css/app.css',
        'resources/fontawesome-free/css/all.min.css',
        'resources/css/sb-admin-2.min.css'
    ])
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>
<body id="page-top" style="height: auto;">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Virtus Mart Retail</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i> <!-- Updated icon -->
                    <span>SDM</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu SDM:</h6>
                        <a class="collapse-item" href="buttons.html">Data Karyawan</a>
                        <a class="collapse-item" href="cards.html">Manajemen Absensi</a>
                        <a class="collapse-item" href="cards.html">Penggajian</a>
                        <a class="collapse-item" href="cards.html">Manajemen Shift</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-boxes"></i> <!-- Updated icon -->
                    <span>Manajemen Inventori</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manajemen Inventori:</h6>
                        <a class="collapse-item" href="utilities-color.html">Daftar Produk</a>
                        <a class="collapse-item" href="utilities-border.html">Stokopname</a>
                        <a class="collapse-item" href="utilities-animation.html">Penerimaan Barang</a>
                        <a class="collapse-item" href="utilities-other.html">Retur Barang</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKeuangan"
                    aria-expanded="true" aria-controls="collapseKeuangan">
                    <i class="fas fa-fw fa-money-bill-wave"></i> <!-- Updated icon -->
                    <span>Keuangan</span>
                </a>
                <div id="collapseKeuangan" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Keuangan:</h6>
                        <a class="collapse-item" href="utilities-color.html">Buku Besar</a>
                        <a class="collapse-item" href="utilities-border.html">Hutang</a>
                        <a class="collapse-item" href="utilities-animation.html">Jurnal</a>
                        <a class="collapse-item" href="utilities-other.html">Laporan Keuangan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-shopping-cart"></i> <!-- Updated icon -->
                    <span>Penjualan</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Penjualan (Sales)</h6>
                        <a class="collapse-item" href="login.html">Point of Sale (POS)</a>
                        <a class="collapse-item" href="register.html">Pengelolaan Pelanggan</a>
                        <a class="collapse-item" href="register.html">Diskon dan Promosi</a>
                        <a class="collapse-item" href="forgot-password.html">Laporan Penjualan</a>
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
        @yield('content')
    </div>
    <!-- Load jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Load Bootstrap JS from CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery Easing from CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Load Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Load other JS files -->
    @vite([
        'resources/js/sb-admin-2.min.js',
        // 'resources/js/demo/chart-area-demo.js',
        // 'resources/js/demo/chart-pie-demo.js',
        // 'resources/js/app.js'
    ])
</body>
</html>
