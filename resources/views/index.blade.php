@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">
                    Selamat Datang Di Aplikasi Gudang Milik Arista Hino Cikarang
                </h1>

                <br>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Stock Barang Warehouse
                    </li>
                </ol>
                    
                <div class="card mb-4">
                    <div class="card-header">
                        <button type="button" class="btn btn-info">
                            Export Data
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Nomor</th>
                                        <th style="text-align: center">Nama Barang</th>
                                        <th style="text-align: center">Deskripsi Lokasi</th>
                                        <th style="text-align: center">Quantity Stock</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Aksi</th>  
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($barang as $brg)
                                        <tr>
                                            <td style="text-align: center">{{ $brg->id }}</td>
                                            <td style="text-align: center">{{ $brg->nama_barang }}</td>
                                            <td style="text-align: center">{{ $brg->deskripsi_lokasi }}</td>
                                            <td style="text-align: center">{{ $brg->quantity_stock }}</td>
                                            <td style="text-align: center">{{ $brg->tanggal }}</td>
                                            <td style="text-align: center">
                                                <a href="/masuk/edit/{{ $brg->id }}" class="btn btn-warning">Edit</a>
                                                <a href="/masuk/hapus/{{ $brg->id }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection