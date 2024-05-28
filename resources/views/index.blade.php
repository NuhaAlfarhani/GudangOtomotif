@extends('layouts.header')

@section('content')
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
@endsection

@include('layouts.footer')