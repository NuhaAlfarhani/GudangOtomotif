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
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDataTambah">
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
                                        <th style="text-align: center">Nomor</th>
                                        <th style="text-align: center">Nama Barang</th>
                                        <th style="text-align: center">Deskripsi Lokasi</th>
                                        <th style="text-align: center">Jenis Kendaraan</th>
                                        <th style="text-align: center">Quantity Stock</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($keluar as $transaksi)
                                        <tr>
                                            <td style="text-align: center">{{ $transaksi->id }}</td>
                                            <td style="text-align: center">{{ $transaksi->nama_barang }}</td>
                                            <td style="text-align: center">{{ $transaksi->deskripsi_lokasi }}</td>
                                            <td style="text-align: center">{{ $transaksi->kendaraan }}</td>
                                            <td style="text-align: center">{{ $transaksi->quantity_stock }}</td>
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

        {{ $keluar->links()}}
        <div class="modal fade" id="modalDataTambah" tabindex="-1" role="dialog" aria-labelledby="modalDataTambahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDataTambahLabel">
                            Tambah Data Barang Keluar
                        </h5>
                    </div>

                    <div class="modal-body">
                        <form name="datatambah" id="formdatatambah" action="/keluar/tambah" method="post" enctype="multipart/form-data">
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
                                    <input id="quantity_stock" type="text" name="quantity_stock" class="form-control" placeholder="Masukkan Jumlah Barang" required>
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
                                    <input type="date" name="tanggal" id="tanggal" class="form-control">
                                    <script type="text/javascript">
                                        $(function() {
                                            $('#datepicker').datepicker();
                                        });
                                    </script>
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