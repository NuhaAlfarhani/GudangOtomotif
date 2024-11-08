@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            @include('components.alert')
            
            <div class="container-fluid">
                <div class="breadcrumb mb-4">
                    <h2>
                        HELP
                    </h2>
                </div>
            </div>

            <div class="card-body">
                <div class="card mb-4">
                    <div>
                        <h3 style="margin-left:1rem">
                            FAQ
                        </h3>

                        <ol>
                            <li> P : Bagaimana cara login ke aplikasi ZETA? </li>
                            <p> J : Untuk login ke ZETA, buka aplikasi dan masukkan kredensial Anda (nama pengguna dan kata sandi) di layar login. Jika Anda baru pertama kali menggunakan aplikasi, Anda akan menerima informasi login dari administrator sistem atau tim dukungan kami. </p>
                            
                            <li> P : Bagaimana cara menambahkan barang baru? </li>
                            <p>
                                J  : 
                                <ol> 1)	Masuk Ke Aplikasi Zeta </ol>
                                <ol> 2)	Navigasikan ke menu “Stock Opname” </ol>
                                <ol> 3)	Cari menu “Stock Barang” </ol>
                                <ol> 4)	Di menu “Tambah Barang” tambahkan barang yang ingin di masukkan. Identitas barang yang dimasukkan yakni nama sparepart, kode barang tersebut dan lokasi barang tersebut </ol>
                                <ol> 5)	Ketuk “Simpan” </ol>
                                <ol> 6)	Cek apakah barang sudah terupdate di tabel </ol>
                            </p>
                            
                            <li> P : Bagaimana memasukan aktivitas barang menggunakan barcode scanner? </li>
                            <p>
                                J  : Apabila hendak memasukan barang : 
                                <ol> 1)	Navigasikan ke menu ”Stock Opname” </ol>
                                <ol> 2)	Cari menu “Barang Masuk” </ol>
                                <ol> 3)	Dalam menu “Barang Masuk”, akan ada 2 tombol yakni “Tambah Barang” dan “Stock In” </ol>
                                <ol> 4)	Klik “Stock In” </ol>
                                <ol> 5)	Scan barcode barang </ol>
                                <ol> 6)	Setelah dilakukan scanning dan keluar jenis barang yang telah discan, isi identitas yang diperlukan yakni jumlah dan lokasi barang tersebut </ol>
                                <ol> 7)	Klik “Simpan” </ol>
                                
                                Apabila hendak mengeluarkan barang : 
                                <ol> 1)	Navigasikan ke menu “Aktivitas Bengkel” </ol>
                                <ol> 2)	Cari menu “Barang Keluar” </ol>
                                <ol> 3)	Dalam menu “Barang Keluar”, akan ada 2 tombol yakni”Tambah Barang” dan “Stock Out” </ol>
                                <ol> 4)	Klik “Stock Out” </ol>
                                <ol> 5)	Scan barcode barang </ol>
                                <ol> 6)	Setelah dilakukan scanning dan keluar identitas barang yang telah discan, isi identitas jumlah dan lokasinya </ol>
                                <ol> 7)	Klik “Simpan” </ol>
                            </p>

                            <li> P : Bagaimana cara menambahkan barang masuk ke dalam sistem secara manual tanpa barcode scanner ? </li>
                            <p>
                                J  : 
                                <ol> 1)	Masuk ke aplikasi ZETA </ol>
                                <ol> 2)	Pastikan barang yang hendak ditambahkan sudah dimasukan kedalam sistem dan tersedia di tabel menu “Stock Barang” </ol>
                                <ol> 3)	Navigasikan ke menu “Stock Opname” </ol>
                                <ol> 4)	Tekan / arahkan pada menu “Barang Masuk” </ol>
                                <ol> 5)	Klik “Tambah Barang” </ol>
                                <ol> 6)	Isi informasi barang seperti nama barang, jumlah, lokasi penyimpanan, dan deskripsi. </ol>
                                <ol> 7)	Klik “Simpan” untuk menyelesaikan proses penambahan barang. </ol>
                            </p>

                            <li> P : Bagaimana cara menambahkan barang keluar ke dalam sistem secara manual tanpa barcode scanner ? </li>
                            <p>
                                J  : 
                                <ol> 1)	Masuk ke aplikasi ZETA </ol>
                                <ol> 2)	Pastikan barang yang hendak ditambahkan sudah dimasukan kedalam sistem dan tersedia di tabel menu “Stock Barang” </ol>
                                <ol> 3)	Navigasikan ke menu “Aktivitas Bengkel” </ol>
                                <ol> 4)	Tekan / arahkan pada menu “Barang Keluar” </ol>
                                <ol> 5)	Klik “Tambah Barang” </ol>
                                <ol> 6)	Isi informasi barang seperti nama barang, jumlah, lokasi penyimpanan, dan deskripsi. </ol>
                                <ol> 7)	Klik “Simpan” untuk menyelesaikan proses penambahan barang. </ol>
                            </p>

                            <li> P : Bagaimana cara melakukan opname stock? </li>
                            <p>
                                J  : 
                                <ol> 1)	Masuk ke aplikasi ZETA. </ol>
                                <ol> 2)	Pilih menu “Stock Opname”. </ol>
                                <ol> 3)	Pilih “Mulai Opname” dan pilih lokasi atau kategori barang yang akan diopname. </ol>
                                <ol> 4)	Scan atau masukkan secara manual kode barang untuk melakukan verifikasi. </ol>
                                <ol> 5)	Bandingkan hasil opname dengan data sistem dan perbarui jika diperlukan. </ol>
                                <ol> 6)	Klik “Selesai” untuk menyimpan hasil opname. </ol>
                            </p>

                            <li> P : Bagaimana cara membuat laporan print out? </li>
                            <p>
                                J  : 
                                <ol> 1)	Pilih menu “Stock Opname” </ol>
                                <ol> 2)	Pilih “Stock Barang” </ol>
                                <ol> 3)	Dalam menu tampilan “Stock Barang” ada tombol “Export” di atas tabel identitas stock barang </ol>
                                <ol> 4)	Klik tombol “Export” </ol>
                                <ol> 5)	Dalam menu Export ada 3 pilihan yakni PDF, Excel, dan Print pilih salah satu format yang diinginkan </ol>
                                <ol> 6)	Klik “Save / Unduh” </ol>
                            </p>

                            <li> P : Bagaimana cara mengupdate data barang? </li>
                            <p>
                                J  : 
                                <ol> 1)	Masuk ke aplikasi ZETA </ol>
                                <ol> 2)	Masuk ke salah satu fitur menu di aplikasi tersebut ( Stock Barang, Barang Masuk , Barang Keluar, Requrst Barang, Peminjaman Barang) </ol>
                                <ol> 3)	Didalam tabel yang berisikan identitas aktivitas sparepart, pilih “ Edit “ atau “Delete” </ol>
                                <ol> 4)	Isi informasi update barang sesuai keinginan </ol>
                                <ol> 5)	Klik “Simpan” </ol>
                            </p>
                        </ol>
                    </div>
                </div>
            </div>            
        </main>
    </div>
@endsection