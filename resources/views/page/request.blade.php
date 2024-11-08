@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            @include('components.alert')

            <div class="container-fluid">
                <div class="breadcrumb mb-4">
                    <h2>
                        Request Barang
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
                
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td style="text-align: center">Nomor</td>
                                        <td style="text-align: center">Nama Barang</td>
                                        <td style="text-align: center">Jumlah</td>
                                        <td style="text-align: center">Status</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($request as $transaksi)
                                        @if ($loop->iteration % 2 == 0)
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $transaksi->nama_request }}</td>
                                                <td style="text-align: center">{{ $transaksi->jumlah }}</td>
                                                <td style="text-align: center">
                                                    <form action="{{ route('requestStatusChange', $transaksi->id_request) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status" class="form-control status-select" required>
                                                            <option value="diminta" {{ $transaksi->status == 'diminta' ? 'selected' : '' }}>Diminta</option>
                                                            <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                        </select>
                                                    </form>

                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            document.querySelectorAll('.status-select').forEach(function (select) {
                                                                select.addEventListener('change', function () {
                                                                    this.closest('form').submit();
                                                                });
                                                            });
                                                        });
                                                    </script>
                                                </td>
                                            </tr>
                                        @else
                                            <tr style="background-color:#34374C">
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $transaksi->nama_request }}</td>
                                                <td style="text-align: center">{{ $transaksi->jumlah }}</td>
                                                <td style="text-align: center">
                                                    <form action="{{ route('requestStatusChange', $transaksi->id_request) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="status" class="form-control status-select" required>
                                                            <option value="diminta" {{ $transaksi->status == 'diminta' ? 'selected' : '' }}>Diminta</option>
                                                            <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                        </select>
                                                    </form>

                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            document.querySelectorAll('.status-select').forEach(function (select) {
                                                                select.addEventListener('change', function () {
                                                                    this.closest('form').submit();
                                                                });
                                                            });
                                                        });
                                                    </script>
                                                </td>
                                            </tr>
                                        @endif
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
                            Tambah Data Request Barang
                        </h5>
                    </div>

                    <div class="modal-body">
                        <form name="formdatatambah" id="formdatatambah" action="{{ route('requesttambah') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="id_barang" class="col-sm-4 col-form-label text-md-right">
                                    Nama Barang
                                </label>
                                <div class="col-md-6">
                                    <input id="nama_request" type="text" name="nama_request" class="form-control" placeholder="Masukkan Nama Barang" required>
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