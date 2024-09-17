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
                                        <td style="text-align: center">Kode Barang</td>
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
                                                <td style="text-align: center">{{ $transaksi->barang->id_barang }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->nama }}</td>
                                                <td style="text-align: center">{{ $transaksi->jumlah }}</td>
                                                <td style="text-align: center">
                                                    <div style="display: flex; justify-content: center; align-items: center;">
                                                        {{ ucfirst($transaksi->status) }} | 
                                                        @if ($transaksi->status == 'diminta')
                                                            <form action="{{ route('requestStatusChange', $transaksi->id_request) }}" method="POST" style="display:inline-block; margin-left: 10px;">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="submit" class="btn btn-success" value="Selesai">
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            <tr style="background-color:#34374C">
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->id_barang }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->nama }}</td>
                                                <td style="text-align: center">{{ $transaksi->jumlah }}</td>
                                                <td style="text-align: center">
                                                    <div style="display: flex; justify-content: center; align-items: center;">
                                                        {{ ucfirst($transaksi->status) }} | 
                                                        @if ($transaksi->status == 'diminta')
                                                            <form action="{{ route('requestStatusChange', $transaksi->id_request) }}" method="POST" style="display:inline-block; margin-left: 10px;">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="submit" class="btn btn-success" value="Selesai">
                                                            </form>
                                                        @endif
                                                    </div>
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
                                    <select id="id_barang" name="id_barang" class="form-control" placeholder="Pilih Barang" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach ($barang as $barang)
                                            <option value="{{ $barang->id_barang }}">{{ $barang->nama }}</option>
                                        @endforeach
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