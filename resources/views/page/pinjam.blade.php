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
                                        <td style="text-align: center">PKB</td>
                                        <td style="text-align: center">Tanggal</td>
                                        <td style="text-align: center">Daftar Barang (Jumlah)</td>
                                        <td style="text-align: center">Alasan</td>
                                        <td style="text-align: center">Aksi</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($pinjam as $pjm)
                                        <tr>
                                            <td style="text-align: center">{{ $pjm->id }}</td>
                                            <td style="text-align: center">{{ $pjm->tanggal }}</td>
                                            <td style="text-align: center">{{ $pjm->daftar_barang }}</td>
                                            <td style="text-align: center">{{ $pjm->alasan }}</td>
                                            <td style="text-align: center">
                                                <a href="/masuk/edit/{{ $pjm->id }}" class="btn btn-warning">Edit</a>
                                                <a href="/masuk/hapus/{{ $pjm->id }}" class="btn btn-danger">Hapus</a>
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

        {{ $pinjam->links()}}
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
                                <label for="daftar_barang" class="col-sm-4 col-form-label text-md-right">
                                    Daftar Barang
                                </label>
                                <div class="col-md-6">
                                    <input id="daftar_barang" type="text" name="daftar_barang" class="form-control" placeholder="Masukkan Daftar Barang" required>
                                </div>
                                <br>
                                <br>
                                <label for="jumlah_pinjam" class="col-sm-4 col-form-label text-md-right">
                                    Stock
                                </label>
                                <div class="col-md-6">
                                    <input id="jumlah_pinjam" type="text" name="jumlah_pinjam" class="form-control" placeholder="Masukkan Jumlah Barang" required>
                                </div>
                                <br>
                                <br>
                                <label for="alasan" class="col-sm-4 col-form-label text-md-right">
                                    Lokasi
                                </label>
                                <div class="col-md-6">
                                    <input id="alasan" type="text" name="alasan" class="form-control" placeholder="Masukkan Lokasi Barang" required>
                                </div>
                                <br>
                                <br>
                                <label for="tanggal" class="col-sm-4 col-form-label text-md-right">
                                    Tanggal
                                </label>
                                <div class="col-md-6">
                                    <input id="tanggal" type="text" name="tanggal" class="form-control" required>
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