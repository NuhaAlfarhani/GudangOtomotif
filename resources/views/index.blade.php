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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDataTambah">
                            Tambah Barang
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
                                        <th style="text-align: center">Quantity Stock</th>
                                        <th style="text-align: center">Deskripsi Lokasi</th>
                                        <th style="text-align: center">Jenis Kendaraan</th>
                                        <th style="text-align: center">Aksi</th>  
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($barang as $brg)
                                        <tr>
                                            <td style="text-align: center">{{ $brg->id }}</td>
                                            <td style="text-align: center">{{ $brg->nama }}</td>
                                            <td style="text-align: center">{{ $brg->stok }}</td>
                                            <td style="text-align: center">{{ $brg->deskripsi }}</td>
                                            <td style="text-align: center">{{ $brg->kendaraan }}</td>
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

        {{ $barang->links()}}
        <div class="modal fade" id="modalDataTambah" tabindex="-1" role="dialog" aria-labelledby="modalDataTambahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDataTambahLabel">
                            Tambah Data Barang Masuk
                        </h5>
                    </div>

                    <div class="modal-body">
                        <form name="formdatatambah" id="formdatatambah" action="{{ route('barangtambah') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label text-md-right">
                                    Nama Barang
                                </label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" name="nama" class="form-control" placeholder="Masukkan Nama Barang" required>
                                </div>
                                <br>
                                <br>
                                <label for="deskripsi" class="col-sm-4 col-form-label text-md-right">
                                    Lokasi
                                </label>
                                <div class="col-md-6">
                                    <input id="deskripsi" type="text" name="deskripsi" class="form-control" placeholder="Masukkan Lokasi Barang" required>
                                </div>
                                <br>
                                <br>
                                <label for="kendaraan" class="col-sm-4 col-form-label text-md-right">
                                    Jenis Kendaraan
                                </label>
                                <div class="col-md-6">
                                    <input id="kendaraan" type="text" name="kendaraan" class="form-control" placeholder="Masukkan Jenis Kendaraan" required>
                                </div>
                                <br>
                                <br>
                                <div>
                                    <button type="submit" class="btn btn-success">
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