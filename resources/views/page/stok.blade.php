@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            @include('components.alert')
            
            <div class="container-fluid">
                <div class="breadcrumb mb-4">
                    <h2>
                        Stock Barang Warehouse
                    </h2>

                    <div class="card-header">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDataTambah">
                            Tambah Barang
                        </button>
                        
                        <button type="button" class="btn btn-info">
                            Export Data
                        </button>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="search">
                            <form action="{{ route('cari') }}" method="GET" class="form-inline">
                                <div class="input-group">
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Barang..." aria-label="Cari" aria-describedby="button-search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" id="button-search">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Nomor</th>
                                        <th style="text-align: center">ID Barang</th>
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
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td style="text-align: center">{{ $brg->id_barang }}</td>
                                            <td style="text-align: center">{{ $brg->nama }}</td>
                                            <td style="text-align: center">{{ $brg->stok }}</td>
                                            <td style="text-align: center">{{ $brg->deskripsi }}</td>
                                            <td style="text-align: center">{{ $brg->kendaraan }}</td>
                                            <td style="text-align: center">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDataEdit{{$brg->id_barang}}">
                                                    Edit
                                                </button>
                                                <a href="/stok/hapus/{{ $brg->id_barang }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modalDataEdit{{$brg->id_barang}}" tabindex="-1" role="dialog" aria-labelledby="modalDataEditLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalDataEditLabel">
                                                            Edit Data Barang
                                                        </h5>
                                                    </div>
                                
                                                    <div class="modal-body">
                                                        <form name="formdataedit" id="formdataedit" action="{{ route('barangedit', $brg->id_barang) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            {{ method_field('PUT') }}
                                                            <div class="form-group row">
                                                                <label for="id_barang" class="col-sm-4 col-form-label text-md-right">
                                                                    Kode Barang
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input id="id_barang" type="text" name="id_barang" class="form-control" value="{{ $brg->id_barang }}" readonly>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <label for="nama" class="col-sm-4 col-form-label text-md-right">
                                                                    Nama Barang
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input id="nama" type="text" name="nama" class="form-control" value="{{ $brg->nama }}">
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <label for="deskripsi" class="col-sm-4 col-form-label text-md-right">
                                                                    Lokasi
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input id="deskripsi" type="text" name="deskripsi" class="form-control" value="{{ $brg->deskripsi }}">
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <label for="kendaraan" class="col-sm-4 col-form-label text-md-right">
                                                                    Jenis Kendaraan
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input id="kendaraan" type="text" name="kendaraan" class="form-control" value="{{ $brg->kendaraan }}">
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
                                    @endforeach
                                </tbody>
                            </table>

                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item {{ $barang->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $barang->previousPageUrl() }}">Previous</a>
                                    </li>
                                    @for ($i = 1; $i <= $barang->lastPage(); $i++)
                                        <li class="page-item {{ $i == $barang->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $barang->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ $barang->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $barang->nextPageUrl() }}">Next</a>
                                    </li>
                                </ul>
                            </nav>
                            
                            Halaman : {{ $barang->currentPage() }} <br/>
                            Jumlah Data : {{ $barang->total() }} <br/>
                            
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
                            Tambah Data Barang
                        </h5>
                    </div>

                    <div class="modal-body">
                        <form name="formdatatambah" id="formdatatambah" action="{{ route('barangtambah') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="id_barang" class="col-sm-4 col-form-label text-md-right">
                                    Kode Barang
                                </label>
                                <div class="col-md-6">
                                    <input id="id_barang" type="text" name="id_barang" class="form-control" placeholder="Masukkan Kode Barang" required>
                                </div>
                                <br>
                                <br>
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