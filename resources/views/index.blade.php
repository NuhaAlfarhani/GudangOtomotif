@extends('layouts.header')

@section('content')
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/index">HINO</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
                
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">LIST</div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                            Stock Barang
                        </a>
                        <a class="nav-link" href="/masuk">
                            <div class="sb-nav-link-icon"><i class="fas fa-people-arrows"></i></div>
                            Barang Masuk
                        </a>
                        <a class="nav-link" href="/keluar">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                            Barang Keluar
                        </a>            
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    HINO ARISTA CIKARANG
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Selamat Datang Di Aplikasi Gudang 
                    <br>
                    Milik Arista Hino Cikarang</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Stock Barang Warehouse</li>
                    </ol>
                        
                        
                    <div class="card mb-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Barang
                            </button>
                            <a href="export.php" class="btn btn-info">Export Data</a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi Lokasi</th>
                                            <th>Quantity Stock</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                            <th>..</th>     
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>          
    </div>
@endsection

@include('layouts.footer')