@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="breadcrumb mb-4">
                    <h2>
                        Barang Keluar Warehouse
                    </h2>

                    <div class="card-header">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDataTambah">
                            Tambah Data
                        </button>
                        
                        <button type="button" class="btn btn-info">
                            Export Data
                        </button>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td style="text-align: center">Nomor</td>
                                        <td style="text-align: center">Nama Barang</td>
                                        <td style="text-align: center">Jumlah</td>
                                        <td style="text-align: center">Jenis Kendaraan</td>
                                        <td style="text-align: center">Tanggal</td>
                                        <td style="text-align: center">Aksi</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($keluar as $transaksi)
                                        <tr>
                                            <td style="text-align: center">{{ $transaksi->id_keluar }}</td>
                                            <td style="text-align: center">{{ $transaksi->barang->nama }}</td>
                                            <td style="text-align: center">{{ $transaksi->jumlah }}</td>
                                            <td style="text-align: center">{{ $transaksi->barang->kendaraan }}</td>
                                            <td style="text-align: center">{{ $transaksi->tanggal }}</td>
                                            <td style="text-align: center">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDataEdit{{$transaksi->id_keluar}}">
                                                    Edit
                                                </button>
                                                <a href="/keluar/hapus/{{ $transaksi->id_keluar }}" class="btn btn-danger">Hapus</a>
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

        <div class="modal fade" id="modalDataTambah" tabindex="-1" role="dialog" aria-labelledby="modalDataTambahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDataTambahLabel">
                            Tambah Data Barang Keluar
                        </h5>
                    </div>

                    <div class="modal-body">
                        <form name="datatambah" id="formdatatambah" action="{{ route('keluartambah') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="id_barang" class="col-sm-4 col-form-label text-md-right">
                                    Nama Barang
                                </label>
                                <div class="col-md-6">
                                    <select id="id_barang" name="id_barang" class="form-control" placeholder="Pilih Barang" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach ($barang as $barang)
                                            <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <label for="jumlah" class="col-sm-4 col-form-label text-md-right">
                                    Jumlah
                                </label>
                                <div class="col-md-6">
                                    <input id="jumlah" type="text" name="jumlah" class="form-control" placeholder="Masukkan Jumlah Barang" required>
                                </div>
                                <br>
                                <br>
                                <label for="tanggal" class="col-sm-4 col-form-label text-md-right">
                                    Tanggal
                                </label>
                                <div class="col-md-6">
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                </div>
                                <br>
                                <br>
                                <div class="form-button">
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