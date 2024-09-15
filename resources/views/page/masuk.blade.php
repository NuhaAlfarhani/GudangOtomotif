@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            @include('components.alert')

            <div class="container-fluid">
                <div class="breadcrumb mb-4">
                    <h2>
                        Barang Masuk Warehouse
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
                                        <td style="text-align: center">Nomor</td>
                                        <td style="text-align: center">Kode Barang</td>
                                        <td style="text-align: center">Nama Barang</td>
                                        <td style="text-align: center">Jumlah</td>
                                        <td style="text-align: center">Jenis Kendaraan</td>
                                        <td style="text-align: center">Tanggal</td>
                                        <td style="text-align: center">Aksi</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($masuk as $transaksi)
                                        @if($loop->iteration % 2 == 0)
                                            <tr style="background-color:#34374C">
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->id_barang }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->nama }}</td>
                                                <td style="text-align: center">{{ $transaksi->jumlah }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->kendaraan }}</td>
                                                <td style="text-align: center">{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                                                <td style="text-align: center">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDataEdit{{$transaksi->barang->id_barang}}">
                                                        Edit
                                                    </button>
                                                    <a href="/stok/hapus/{{ $transaksi->barang->id_barang }}" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->id_barang }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->nama }}</td>
                                                <td style="text-align: center">{{ $transaksi->jumlah }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->kendaraan }}</td>
                                                <td style="text-align: center">{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                                                <td style="text-align: center">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDataEdit{{$transaksi->barang->id_barang}}">
                                                        Edit
                                                    </button>
                                                    <a href="/stok/hapus/{{ $transaksi->barang->id_barang }}" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        @endif

                                        <div class="modal fade" id="modalDataEdit{{$transaksi->id_barang}}" tabindex="-1" role="dialog" aria-labelledby="modalDataEditLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalDataEditLabel">
                                                            Edit Data Barang
                                                        </h5>
                                                    </div>
                                
                                                    <div class="modal-body">
                                                        <form name="formdataedit" id="formdataedit" action="{{ route('barangedit', $transaksi->id_barang) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            {{ method_field('PUT') }}
                                                            <div class="form-group row">
                                                                <label for="id_barang" class="col-sm-4 col-form-label text-md-right">
                                                                    Kode Barang
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input id="id_barang" type="text" name="id_barang" class="form-control bg-dark text-white" value="{{ $transaksi->id_barang }}" readonly>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <label for="id_barang" class="col-sm-4 col-form-label text-md-right">
                                                                    Nama Barang
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input id="id_barang" type="text" name="id_barang" class="form-control bg-dark text-white" value="{{ $transaksi->barang->nama }}" readonly>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <label for="jumlah" class="col-sm-4 col-form-label text-md-right">
                                                                    Jumlah
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input id="jumlah" type="number" name="jumlah" class="form-control" value="{{ $transaksi->jumlah }}">
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <label for="tanggal" class="col-sm-4 col-form-label text-md-right">
                                                                    Tanggal
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input id="tanggal" type="date" name="tanggal" class="form-control bg-dark text-white" value="{{ date('Y-m-d') }}" readonly>
                                                                </div>

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
                                    <li class="page-item {{ $masuk->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $masuk->previousPageUrl() }}">Previous</a>
                                    </li>
                                    @for ($i = 1; $i <= $masuk->lastPage(); $i++)
                                        <li class="page-item {{ $i == $masuk->currentPage() ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $masuk->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ $masuk->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $masuk->nextPageUrl() }}">Next</a>
                                    </li>
                                </ul>
                            </nav>
                            
                            Halaman : {{ $masuk->currentPage() }} <br/>
                            Jumlah Data : {{ $masuk->total() }} <br/>
                            Data Per Halaman : 
                            <form action="{{ route('paginate') }}" method="POST" class="form-inline d-inline">
                                @csrf
                                <input type="number" name="perPage" class="form-control" value="{{ $masuk->perPage() }}" min="1" style="width: 3rem;">
                                <button type="submit" class="btn btn-primary ml-2">Update</button>
                            </form>
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
                            Tambah Data Barang Masuk
                        </h5>
                    </div>

                    <div class="modal-body">
                        <form name="formdatatambah" id="formdatatambah" action="{{ route('masuktambah') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="id_barang" class="col-sm-4 col-form-label text-md-right">
                                    Nama Barang
                                </label>
                                <div class="col-md-6">
                                    <select type="text" id="id_barang" name="id_barang" class="form-control" placeholder="Pilih Barang" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach ($barang as $barang)
                                            <option value="{{ $barang->id_barang }}">{{ $barang->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <label for="jumlah" class="col-sm-4 col-form-label text-md-right">
                                    Jumlah
                                </label>
                                <div class="col-md-6">
                                    <input id="jumlah" type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah Barang" required>
                                </div>
                                <br>
                                <br>
                                <label for="tanggal" class="col-sm-4 col-form-label text-md-right">
                                    Tanggal
                                </label>
                                <div class="col-md-6">
                                    <input id="tanggal" type="date" name="tanggal" class="form-control" value="{{ date('Y-m-d') }}" readonly>
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