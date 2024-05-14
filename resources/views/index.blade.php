<?php
    // require 'function.blade.php';
// require '../views/cek.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Storage Warehouse</title>

    <link rel ="icon" type="image/png/jpg" href="{{ asset('assets')}}/images/Hino-logo-2048x2048.png">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">HINO</a>
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
                            <a class="nav-link" href=" masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-people-arrows"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
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
                                        <tbody>
                                            
                                            <?php
                                            //  $ambilsemuadatastock = mysqli_query($conn,"select * from stock");
                                            //  $i = 1;
                                            //  while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            //      $namabarang = $data['namabarang'];
                                            //      $deskripsi = $data['deskripsi'];
                                            //      $tanggal = $data['tanggal'];
                                            //      $stock = $data['stock'];
                                            //      $idb = $data['idbarang'];
                                            
                                            ?>

                                                <!-- Edit Modal -->
                                        

                                        <!-- Delete Modal -->
                                        

                                            </div>
                                            </tr>
                                            <?php
                                            // };
                                            ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Arya Ferdian</div>
                            <div>
                                <a href="#">PT.Arista Jaya Niaga</a>
                                &middot;
                                <a href="#">Majukan Bangsa &amp; Negara</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

    
    
</body>
</html>