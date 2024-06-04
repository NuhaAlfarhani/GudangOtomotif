@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">
                    Portal List Barang Keluar
                </h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Barang Keluar Warehouse
                    </li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                            Tambah Data
                        </button>
                        
                        <button type="button" class="btn btn-info">
                        Export Data
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
                                    @foreach ($barang as $brg)
                                        <tr>
                                            <td align="center">{{ $brg->id }}</td>
                                            <td align="center">{{ $brg->nama_barang }}</td>
                                            <td align="center">{{ $brg->deskripsi_lokasi }}</td>
                                            <td align="center">{{ $brg->quantity_stock }}</td>
                                            <td align="center">{{ $brg->tanggal }}</td>
                                            <td align="center">
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