@extends('layouts.header')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            @include('components.alert')
            
            <div class="container-fluid">
                <div class="breadcrumb mb-4">
                    <h2>
                        About
                    </h2>
                </div>
            </div>

            <div class="card-body">
                <div class="card mb-4">
                    <div style="margin-left:1rem">
                        <h3>
                            About Zeta
                        </h3>

                        <p>
                            ZETA (Zero-Error Tracking for Warehouse Application) adalah solusi canggih yang dirancang khusus untuk mengoptimalkan pengelolaan gudang dan proses opname dengan akurasi tinggi. Aplikasi ini mengintegrasikan teknologi terkini dan prinsip-prinsip manajemen yang efisien untuk memberikan pengalaman pengelolaan inventaris yang mulus dan bebas kesalahan.
                        </p>
                    
                        <p>
                            Visi Kami: Kami percaya bahwa akurasi dan efisiensi adalah kunci keberhasilan dalam manajemen gudang. Dengan ZETA, kami bertujuan untuk meminimalisir kesalahan dan meningkatkan produktivitas di setiap langkah proses penyimpanan dan pengambilan barang.
                        </p>

                        <p>
                            Fitur Utama: 

                            <ul>
                                <li>
                                    Pelacakan Nol Kesalahan: Dengan teknologi pelacakan yang canggih, ZETA memastikan bahwa setiap item yang masuk atau keluar dari gudang tercatat dengan akurat, mengurangi risiko kesalahan manusia dan ketidaksesuaian inventaris.
                                </li>
                                <li>
                                    Manajemen Inventaris Real-Time: Akses informasi inventaris yang selalu terbarui dan akurat. ZETA menyediakan data real-time tentang stok, lokasi barang, dan status operasional gudang.
                                </li>
                                <li>
                                    Menyediakan Laporan dan Analitik: Dapatkan informasi melalui laporan dan analitik yang sesuai. Fitur ini membantu dalam pengambilan keputusan yang lebih baik dengan data yang terperinci sesuai yang diisikan didalam sistem.
                                </li>
                                <li>
                                    Integrasi Mulus: ZETA dirancang untuk terintegrasi dengan sistem lain yang ada di perusahaan Anda, memudahkan aliran data dan proses tanpa gangguan.
                                </li>
                                <li>
                                    Antarmuka Pengguna yang Ramah: Dengan desain yang intuitif dan mudah digunakan, ZETA memastikan bahwa tim Anda dapat dengan cepat beradaptasi dan memanfaatkan seluruh fitur aplikasi.
                                </li>
                            </ul>

                            Keunggulan Kami: 

                            <ul>
                                <li>
                                    Akurasi Tinggi: Meminimalisir kesalahan dan memastikan data inventaris yang selalu tepat.
                                </li>
                                <li>
                                    Efisiensi Operasional: Mengoptimalkan proses opname dan manajemen gudang untuk meningkatkan produktivitas.
                                </li>
                            </ul>

                            Mengapa Memilih ZETA?
                            <br>
                                ZETA tidak hanya sebuah aplikasi; ini adalah alat strategis yang dirancang untuk mengatasi tantangan pengelolaan gudang modern. Dengan komitmen kami terhadap inovasi dan kualitas, ZETA berusaha untuk mendukung kesuksesan operasional Anda melalui teknologi yang terpercaya dan dukungan pelanggan yang unggul.
                            <br>
                                Untuk informasi lebih lanjut atau untuk memulai perjalanan Anda dengan ZETA, hubungi kami di [kontak email/telepon] atau kunjungi situs web kami di [alamat situs web].
                        </p>
                        
                    </div>
                </div>
            </div>            
        </main>
    </div>
@endsection