@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            @include('components.alert')

            <div class="container-fluid">
                <div class="breadcrumb mb-4">
                    <h2>
                        Peminjaman Barang Warehouse
                    </h2>

                    <div class="card-header">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDataTambah">
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
                                        <td style="text-align: center">PKB</td>
                                        <td style="text-align: center">Tanggal</td>
                                        <td style="text-align: center">Daftar Barang (Jumlah)</td>
                                        <td style="text-align: center">Alasan</td>
                                        <td style="text-align: center">Aksi</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($pinjam as $transaksi)
                                        <tr>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td style="text-align: center">{{ $transaksi->pkb }}</td>
                                            <td style="text-align: center">{{ $transaksi->created_at }}</td>
                                            <td style="text-align: center">{{ $transaksi->daftar_barang }}</td>
                                            <td style="text-align: center">{{ $transaksi->alasan }}</td>
                                            <td style="text-align: center">
                                                <form action="/pinjam/hapus/{{ $transaksi->pkb }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
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
                        <form name="formdatatambah" id="formdatatambah" action="{{ route('pinjamtambah') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                
                                <label for="pkb" class="col-sm-4 col-form-label text-md-right">
                                    PKB
                                </label>
                                <div class="col-md-6">
                                    <input id="pkb" type="text" name="pkb" class="form-control" placeholder="Masukkan PKB" required>
                                </div>
                                <br>
                                <br>
                                <label for="daftar_barang" class="col-sm-4 col-form-label text-md-right">
                                    Daftar Barang (Jumlah)
                                </label>
                                <div class="col-md-6">
                                    <textarea style="margin-bottom: 0.65rem" id="daftar_barang" type="textarea" name="daftar_barang" class="form-control" placeholder="Masukkan Daftar Barang" required></textarea>
                                </div>
                                <br>
                                <br>
                                <label for="alasan" class="col-sm-4 col-form-label text-md-right">
                                    Alasan
                                </label>
                                <div class="col-md-6">
                                    <input id="alasan" type="text" name="alasan" class="form-control" placeholder="Masukkan Alasan" required>
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