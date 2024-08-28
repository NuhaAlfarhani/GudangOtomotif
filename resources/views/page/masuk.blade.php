@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">
                    Portal List Barang Masuk
                </h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Barang Masuk Warehouse
                    </li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDataTambah">
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
                                        <td style="text-align: center">Nomor</td>
                                        <td style="text-align: center">Nama Barang</td>
                                        <td style="text-align: center">Quantity Stock</td>
                                        <td style="text-align: center">Deskripsi Lokasi</td>
                                        <td style="text-align: center">Jenis Kendaraan</td>
                                        <td style="text-align: center">Tanggal</td>
                                        <td style="text-align: center">Aksi</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($masuk as $transaksi)
                                        <tr>
                                            <td style="text-align: center">{{ $transaksi->id_masuk }}</td>
                                            <td style="text-align: center">{{ $transaksi->barang->nama }}</td>
                                            <td style="text-align: center">{{ $transaksi->stok }}</td>
                                            <td style="text-align: center">{{ $transaksi->barang->deskripsi }}</td>
                                            <td style="text-align: center">{{ $transaksi->barang->kendaraan }}</td>
                                            <td style="text-align: center">{{ $transaksi->tanggal }}</td>
                                            <td style="text-align: center">
                                                <a href="/masuk/edit/{{ $transaksi->id }}" class="btn btn-warning">Edit</a>
                                                <a href="/masuk/hapus/{{ $transaksi->id }}" class="btn btn-danger">Hapus</a>
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

        {{ $masuk->links()}}
        <div class="modal fade" id="modalDataTambah" tabindex="-1" role="dialog" aria-labelledby="modalDataTambahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDataTambahLabel">
                            Tambah Data Barang Masuk
                        </h5>
                    </div>

                    <div class="modal-body">
                        <form name="formdatatambah" id="formdatatambah" action="/masuk/tambah" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="nama_barang" class="col-sm-4 col-form-label text-md-right">
                                    Nama Barang
                                </label>
                                <div class="col-md-6">
                                    <input id="nama_barang" type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang" required>
                                </div>
                                <br>
                                <br>
                                <label for="quantity_stock" class="col-sm-4 col-form-label text-md-right">
                                    Stock
                                </label>
                                <div class="col-md-6">
                                    <input id="quantity_stock" type="number" name="quantity_stock" class="form-control" placeholder="Masukkan Jumlah Barang" required>
                                </div>
                                <br>
                                <br>
                                <label for="deskripsi_lokasi" class="col-sm-4 col-form-label text-md-right">
                                    Lokasi
                                </label>
                                <div class="col-md-6">
                                    <input id="deskripsi_lokasi" type="text" name="deskripsi_lokasi" class="form-control" placeholder="Masukkan Lokasi Barang" required>
                                </div>
                                <br>
                                <br>
                                <label for="tanggal" class="col-sm-4 col-form-label text-md-right">
                                    Tanggal
                                </label>
                                <div class="col-md-6">
                                    <input id="tanggal" type="date" name="tanggal" class="form-control" required>
                                </div>
                                <br>
                                <br>
                                <div>
                                    <button type="submit" class="btn btn-success" name="datatambah">
                                        Simpan Data
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" name="tutup">
                                        Batal
                                    </button>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>   
        </div>
    </div>
@endsection