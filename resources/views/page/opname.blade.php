@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <div class="breadcrumb mb-4">
                    <h2>
                        Storage Opname
                    </h2>

                    <div class="card-header"> 
                    <form id="exportForm" action="{{ route('export') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="barang" id="barangData">
                        <button type="submit" class="btn btn-info">Export Data</button>
                    </form>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="card mb-4">
                        <!-- <div class="search">
                            <form action="{{ route('cari') }}" method="GET" class="form-inline">
                                <div class="input-group">
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Barang..." aria-label="Cari" aria-describedby="button-search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" id="button-search">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->

                        <div class="table-responsive">
                            <form action="{{ route('opnameCalculate') }}" method="POST">
                                @csrf
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Nomor</th>
                                            <th style="text-align: center">Kode Barang</th>
                                            <th style="text-align: center">Nama Barang</th>
                                            <th style="text-align: center">Stock Fisik</th>
                                            <th style="text-align: center">Stock Sistem</th>
                                            <th style="text-align: center">Deskripsi Lokasi</th>
                                            <th style="text-align: center">Jenis Kendaraan</th>
                                            <th style="text-align: center">Selisih</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($barang as $brg)
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $brg->id_barang }}</td>
                                                <td style="text-align: center">{{ $brg->nama }}</td>
                                                <td style="text-align: center">{{ $brg->stok }}</td>
                                                <td style="text-align: center; width: 10rem">
                                                    <input type="number" name="stok_sistem[{{ $brg->id_barang }}]" class="form-control stok-sistem" data-stok-fisik="{{ $brg->stok }}" value="{{ $brg->stok_sistem }}" style="width: 100%; height: 100%; text-align:center">
                                                </td>
                                                <td style="text-align: center">{{ $brg->deskripsi }}</td>
                                                <td style="text-align: center">{{ $brg->kendaraan }}</td>
                                                <td style="text-align: center" class="selisih">
                                                    <span>{{ $brg->stok - $brg->stok_sistem }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>

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
                            Data Per Halaman : 
                            <form action="{{ route('paginate') }}" method="POST" class="form-inline d-inline">
                                @csrf
                                <input type="number" name="perPage" class="form-control" value="{{ $barang->perPage() }}" min="1" style="width: 3rem;">
                                <button type="submit" class="btn btn-primary ml-2">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stokSistemInputs = document.querySelectorAll('.stok-sistem');

            stokSistemInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const stokFisik = parseFloat(this.dataset.stokFisik);
                    const stokSistem = parseFloat(this.value);
                    const selisihElement = this.closest('tr').querySelector('.selisih span');

                    if (!isNaN(stokFisik) && !isNaN(stokSistem)) {
                        selisihElement.textContent = stokFisik - stokSistem;
                    } else {
                        selisihElement.textContent = '';
                    }
                });
            });

            document.getElementById('exportForm').addEventListener('submit', function(event) {
                const barangData = [];
                document.querySelectorAll('tbody tr').forEach(row => {
                    const id_barang = row.querySelector('td:nth-child(2)').textContent.trim();
                    const nama = row.querySelector('td:nth-child(3)').textContent.trim();
                    const stok = parseFloat(row.querySelector('td:nth-child(4)').textContent.trim());
                    const stok_sistem = parseFloat(row.querySelector('input.stok-sistem').value.trim());
                    const deskripsi = row.querySelector('td:nth-child(6)').textContent.trim();
                    const kendaraan = row.querySelector('td:nth-child(7)').textContent.trim();
                    const selisih = stok - stok_sistem;

                    barangData.push({
                        id_barang,
                        nama,
                        stok,
                        stok_sistem,
                        deskripsi,
                        kendaraan,
                        selisih
                    });
                });

                document.getElementById('barangData').value = JSON.stringify(barangData);
            });
        });
    </script>
@endsection