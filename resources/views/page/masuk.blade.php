@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            @include('components.alert')

            <div class="container-fluid">
                <div class="breadcrumb mb-4 d-flex justify-content-between align-items-center">
                    <h2>
                        Barang Masuk Warehouse
                    </h2>

                    <div class="d-flex">
                        <div class="card-header mr-2">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDataTambah">
                                Tambah Data
                            </button>
                        </div>
                        
                        <div>
                            <form id="exportForm" action="{{ route('masukexport') }}" method="POST">
                                @csrf
                                <input type="hidden" name="masukexport" id="barangData">
                                <button type="submit" class="btn btn-info">Export Data</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="search">
                            <form action="{{ route('masukcari') }}" method="GET" class="form-inline">
                                <div class="input-group">
                                    <input type="text" name="masukcari" class="form-control" placeholder="Cari Barang..." aria-label="Cari" aria-describedby="button-search">
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
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->id_barang }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->nama }}</td>
                                                <td style="text-align: center">{{ $transaksi->jumlah }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->kendaraan }}</td>
                                                <td style="text-align: center">{{ $transaksi->created_at->format('d / m / Y H:i') }}</td>
                                                <td style="text-align: center">
                                                <div class="d-flex justify-content-center">
                                                        <form action="{{ route('masukhapus', $transaksi->id_masuk) }}" method="POST" onsubmit="return confirmDelete()">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            <tr style="background-color:#34374C">
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->id_barang }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->nama }}</td>
                                                <td style="text-align: center">{{ $transaksi->jumlah }}</td>
                                                <td style="text-align: center">{{ $transaksi->barang->kendaraan }}</td>
                                                <td style="text-align: center">{{ $transaksi->created_at->format('d / m / Y H:i') }}</td>
                                                <td style="text-align: center">
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{ route('masukhapus', $transaksi->id_masuk) }}" method="POST" onsubmit="return confirmDelete()">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif

                                        <script>
                                            function confirmDelete() {
                                                return confirm('Are you sure you want to delete this item?');
                                            }
                                        </script>
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
                                <input type="number" name="perPage" class="form-control" value="{{ $masuk->perPage() }}" min="1" style="width: 3rem; text-align:center">
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
                                    <select id="id_barang" name="id_barang" class="form-control" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id_barang }}">{{ $item->id_barang }} - {{ $item->nama}}</option>
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
                                    <input id="tanggal" type="text" name="tanggal" class="form-control" value="{{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('d / m / Y H:i') }}" readonly>
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