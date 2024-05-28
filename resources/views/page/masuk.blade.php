<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Masuk Warehouse</title>
        <link rel ="shortcut icon" type="image/png/jpg" href="image/Hino-logo-2048x2048.png">
        <link href="css/styles3.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous" />
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
                        <h1 class="mt-4">Portal List Barang Masuk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Barang Masuk Warehouse</li>
                        </ol>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Tambah Barang
                                </button>
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
                                            $ambilsemuadatastock = mysqli_query($conn,"select * from masuk m, stock s where s.idbarang = m.idbarang");
                                            $i = 1;
                                            while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                $idb = $data['idbarang'];
                                                $idm = $data['idmasuk'];
                                                $namabarang = $data['namabarang'];
                                                $deskripsi = $data['deskripsi'];
                                                $qty = $data['qty'];
                                                $tanggal = $data['tanggal'];
                                            
                                            ?>



                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$namabarang;?></td>
                                                <td><?=$deskripsi;?></td>
                                                <td><?=$qty;?></td>
                                                <td><?=$tanggal;?></td>
                                                <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idm;?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idm;?>">
                                                    Delete
                                                </button>
                                                <td>
                                            </tr>

                                             <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$idm;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                <input type="text" name="namabarang" placeholder="Nama Barang" value="<?=$namabarang;?>" class="form-control" required>
                                                <br>
                                                <input type="text" name="deskripsi" placeholder="Deskripsi Lokasi" value="<?=$deskripsi;?>" class="form-control" required>
                                                <br>
                                                <input type="number" name="qty" placeholder="Jumlah" value="<?=$deskripsi;?>" class="form-control" required>
                                                <br>
                                                
                                                <input type="hidden" name="idb" value="<?=$idb;?>">
                                                <input type="hidden" name="idm" value="<?=$idm;?>">
                                                <input type="submit" class="btn btn-primary" name="updatebarangmasuk" value="Simpan">
                                                </div>
                                                </form>
             

                                            </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delete<?=$idm;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Barang?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="post">   
                                                <div class="modal-body">
                                                Apakah anda yakin ingin menghapus <?=$namabarang;?>?
                                                <input type="hidden" name="idb" value="<?=$idb;?>">
                                                <input type="hidden" name="kty" value="<?=$qty;?>">
                                                <input type="hidden" name="idm" value="<?=$idm;?>">
                                                <br>
                                                <br>
                                                <input type="submit" class="btn btn-danger" name="hapusbarangmasuk" value="Hapus">
                                                </div>
                                                </form>
             

                                            </div>
                                            </div>
                                        </div>

                                            <?php
                                            };
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
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Tambah Barang</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <form method="post">
                        <div class="modal-body">
                        
                        <select name="barangnya" class="form-control">
                            <?php

                             $ambilsemuadatanya = mysqli_query($conn,"select * from stock ");
                             while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                             $namabarangnya = $fetcharray['namabarang'];
                             $idbarangnya = $fetcharray['idbarang'];
                              ?>

                            <option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>
                            
                            <?php
                                }
                            ?>
                        </select>
                        <br>
                        <input type="number" name="qty" placeholder="Quantity" class="form-control" required>
                        <br>
                        <input type="text" name="deskripsi" placeholder="Deskripsi Barang" class="form-control" required>
                        <br>
                        <input type="submit" class="btn btn-primary" name="barangmasuk" value="Simpan">
                        <br>
                    </div>
                </form>
                    
                    </div>
                    </div>
                </div>
                
</html>
