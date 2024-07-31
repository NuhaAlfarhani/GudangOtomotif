@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">
                    Portal List Request Barang
                </h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        Request Barang
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
                                        <td style="text-align: center">Quantity</td>
                                        <td style="text-align: center">Aksi</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($barang as $brg)
                                        <tr>
                                            <td style="text-align: center">{{ $brg->id }}</td>
                                            <td style="text-align: center">{{ $brg->nama_barang }}</td>
                                            <td style="text-align: center">{{ $brg->quantity_stock }}</td>
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
                            Tambah Data Request Barang
                        </h5>
                    </div>

                    <div class="modal-body">
                        <form name="formdatatambah" id="formdatatambah" action="/request/tambah" method="post" enctype="multipart/form-data">
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
                                    Quantity
                                </label>
                                <div class="col-md-6">
                                    <input id="quantity_stock" type="text" name="quantity_stock" class="form-control" placeholder="Masukkan Jumlah Barang" required>
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