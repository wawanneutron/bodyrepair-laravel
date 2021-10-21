@extends('layouts.app')

@section('content')
    <div class="header" id="home">
        <div class="header-image">
            <div class="header-color"></div>
        </div>
        <div class="container">
            <div class="row title-header justify-content-center">
                <div class="col">
                    <div class="text-center">
                        <h1>MBS Auto Car And Paint</h1>
                        <h2>Menerima</h2>
                        <h3><span class="typing"></span></h3>
                        <a href=" {{ route('booking') }} " class="btn btn-cte mt-4">Booking Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-10 info-panel text-center">
                <div class="row">
                    <div class="col-lg">
                        <h4>Profesional</h4>
                        <p>Dikerjakan dengan tenaga berpengalaman</p>
                    </div>
                    <div class="col-lg">
                        <h4>Berkualitas</h4>
                        <p>Terjamin kualitas, karena menggunakan bahan baku terbaik</p>
                    </div>
                    <div class="col-lg">
                        <h4>Bergarnsi</h4>
                        <p>bergaransi, demi kepuasan konsumen</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <section class="about container" id="about">
        <div class="row">
            <div class="col-md-6 col-carousel">
                <h1>Kenali Apa Itu MBS ?</h3>
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3500">
                                <img src="/images/body-repair/1.jpg" class="d-block w-100">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="/images/body-repair/2.jpg" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/body-repair/3.jpg" class="d-block w-100">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    <p>
                        Kami adalah Spesialis Body Treatment dan Maintenance yang berlokasi di kabupaten Tangerang, ada juga yang berlokasi di Tangerang Kota. Semakin hari usaha kami semakin bertumbuh dan
                        terus meningkatkan kualitasnya. Pelanggan yang datang tidak hanya berasal dari Tangerang saja, namun juga dari kota lain seperti Jakarta, Depok dan juga Bogor.
                        <br>
                        Saat ini kami memiliki sumberdaya berpengalaman dengan teknik dan skill yang mahir. Bahan yang kami pergunakan memiliki kualitas yang baik dan senantiasa kami pertahankan.
                        <br>
                        Kami akan terus meningkatkan pelayanan dan kualitas yang bagus demi kepuasan konsumen.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid info-content">
        <div class="text-header text-center">
            <h1>Mengapa Memilih MBS Body Repair</h1>
            <div class="subtitle">Kami menghadirkan pelayanan prima yang terus meningkat dalam kualitas</div>
        </div>
        <div class="row row-content justify-content-center text-center">
            <div class="col-md-5 col-content">
                <div class="circle">
                    <i class="fas fa-grin-wink fa-3x"></i>
                </div>
                <div class=" title">TENAGA AHLI PROFESIONAL</div>
                <div class="subtitle">
                    Tenaga ahli kami adalah profesional di bidangnya masing-masing dengan pengalaman >10 tahun. Setiap orang memiliki keahlian tersendiri dari dasar meluruskan body, pengecatan (painting),
                    hingga detailer dalam finishing dan salon mobil serta coating.
                </div>
            </div>
            <div class="col-md-5 col-content">
                <div class="circle">
                    <i class="fas fa-check-double fa-3x"></i>
                </div>
                <div class=" title">BAHAN BERKUALITAS</div>
                <div class="subtitle">
                    Kami menggunakan bahan berkualitas yang sudah kami pelajari karakteristik dan aplikasinya. Bahan berkualitas akan menentukan daya tahan dari hasil akhir pekerjaan. Kami bisa
                    menyesuaikan banyak merek sesuai selera dan kemampuan Anda.
                </div>
            </div>
            <div class="col-md-5 col-content">
                <div class="circle">
                    <i class="fas fa-cogs fa-3x"></i>
                </div>
                <div class=" title">FASILITAS MEMADAI DAN PROSES TERBAIK</div>
                <div class="subtitle">
                    Oke Body Repair terus bertumbuh dan senantiasa meningkatkan fasilitas pekerjaannya mulai dari ruangan khusus pengecatan (ruang semi oven) hingga berbagai tools pendukung seperti mesin
                    sanding dan lainnya untuk memberikan hasil kerja terbaik.
                </div>
            </div>
            <div class="col-md-5 col-content">
                <div class="circle">
                    <i class="fas fa-hand-holding-usd fa-3x"></i>
                </div>
                <div class=" title">HARGA MASUK AKAL</div>
                <div class="subtitle">
                    Dari perpaduan bahan berkualitas, fasilitas yang memadai, dan proses terbaik, harga yang kami berikan sangat MASUK AKAL. Harga yang kemurahan hanya membuat ragu akan kualitasnya, dan
                    harga kemahalan akan merogoh kantong Anda sangat dalam.
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                <a href="{{ route('booking') }}" class=" btn btn-cte-home">Booking Sekarang</a>
            </div>
        </div>
    </section>
    <section class="services">
        <div class="paralax-service"></div>
        <div class="title-service text-center">
            <h1>Pelayanan Kami</h1>
            <p>Kami berfokus pada body treatment dan maintenance <br> oleh karena itu kami membagi beberapa service/ pelayanan kami sebagai berikut:</p>
        </div>
        <div class="container info-content ">
            <div class="row row-content">
                <div class="col-md-6 col-content">
                    <div class="card">
                        <div class="card-body">
                            <div class="header-service">
                                <div class="circle">
                                    <i class="fas fa-car fa-3x"></i>
                                </div>
                                <div class="title">CAT FULL BODY</div>
                            </div>
                            <div class="subtitle">
                                Cat full body diperuntukkan bagi Anda yang ingin mengubah penampilan kendaraannya jadi berbeda, membuat jadi fresh kembali karena cat lama sudah pudar atau kusam. <br>
                                Anda bisa mengaplikasikan cat siram full body untuk mobil atau motor anda baik hanya pada bagian luar (cat siram luar) atau termasuk tulang body dalam. Jika Anda tertarik
                                dengan warna berbeda bisa juga mengaplikasikan cat siram ganti warna.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-content">
                    <div class="card">
                        <div class="card-body">
                            <div class="header-service">
                                <div class="circle">
                                    <i class="fas fa-car-side fa-3x"></i>
                                </div>
                                <div class="title">CAT PANEL</div>
                            </div>
                            <div class="subtitle">
                                Jika mobil Anda bermasalah karena gesekan pada suatu atau beberapa bagian tertentu bisa memilih cat panel. Gesekan/ baret ini biasanya tidak dapat ditangani hanya dengan
                                poles.
                                <br>
                                Jangan khawatir akan warna, karena kami memiliki rekanan tinter spesialis yang berpengalaman lama dalam menyamakan warna cat. Mungkin tidak bisa presisi atau sama persis
                                namun cukup baik dalam banyak pengalaman kami.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-content">
                    <div class="card">
                        <div class="card-body">
                            <div class="header-service">
                                <div class="circle">
                                    <i class="fas fa-car-crash fa-3x"></i>
                                </div>
                                <div class="title">BODY REPAIR</div>
                            </div>
                            <div class="subtitle">
                                Jika kendaraan Anda mengalami kerusakan yang membuat bekas yang cukup dalam, bisa jadi penyok ringan, sedang, maupun penyok parah maka bisa dilakukan perbaikan dengan body
                                repair. Body repair ini dimaksudkan untuk mengembalikan body seperti semula atau lebih baik lagi dengan perlakuan yang diperlukan seperti ketok atau ditambahkan filler.
                                Tentunya body repair ini akan meliputi cat ulang sehingga bagian yang rusak akan menjadi baik.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-content">
                    <div class="card">
                        <div class="card-body">
                            <div class="header-service">
                                <div class="circle">
                                    <i class="fas fa-shuttle-van fa-3x"></i>
                                </div>
                                <div class="title">CAT AKSESORIS</div>
                            </div>
                            <div class="subtitle">
                                Cakupan pelayanan kami bukan hanya terbatas pada body mobil. Kami bisa mengerjakan berbagai pekerjaan berkaitan dengan repair dan repaint aksesoris atau objek lainnya
                                seperti velg, standing kios-k, dan lainnya. Kami telah berpengalaman dalam melakukan cat ulang dan juga repair aksesoris tersebut. Selama cakupan kebutuhan pelayanan repair
                                dan pengecatan yang berkaitan dengan plat besi, kami bisa kondisikan untuk kebutuhan tersebut.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-content">
                    <div class="card">
                        <div class="card-body">
                            <div class="header-service">
                                <div class="circle">
                                    <i class="fas fa-star fa-3x"></i>
                                </div>
                                <div class="title">SALON MOBIL / DETAILING / POLES MOBIL</div>
                            </div>
                            <div class="subtitle">
                                Anda yang senang penampilan mobilnya senantiasa bersih dan mengkilap bisa melakukan perawatan rutin pada tiga bagian mobil yaitu interior mobil, eksterior mobil, maupun
                                pada ruang mesin. Selain kondisi standar, perawatan dapat disesuaikan dengan keinginan Anda. Anda dapat menyampaikan tambahan pelayanan / service yang dimaksud dan akan
                                disepakati jika kemampuannya cukup.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-content">
                    <div class="card">
                        <div class="card-body">
                            <div class="header-service">
                                <div class="circle">
                                    <i class="fas fa-gem fa-3x"></i>
                                </div>
                                <div class="title">COATING</div>
                            </div>
                            <div class=" subtitle">
                                Ada baiknya mobil yang sudah terjaga baik dari tingkat kebersihan maupun kondisi bodynya mendapatkan perlindungan lebih lagi. Oleh karena itu kami menyediakan paket
                                perlindungan body ekstra yaitu coating. Coating ini sebagai tambahan lapisan pada permukaan body mobil sehingga terlindung, memberikan kesan bening terawat dan juga selalu
                                terlihat basah (wet look). Treatment coating ini banyak jenisnya tergantung kocek yang mau dikeluarkan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact  services info-content">
        <div class="paralax-service"></div>
        <div class="title-service text-center" id="kontak">
            <h1>Kunjungi Media Kami</h1>
            <p>kamu bisa menanyakan melalui kontak dibawah ini</p>
        </div>
        <div class="container">
            <div class="row text-center row-content justify-content-center">
                <div class="col-md-4 col-content">
                    <div class="circle">
                        <i class="fas fa-envelope-square fa-3x "></i>
                    </div>
                    <div class=" title">Email</div>
                    <div class="subtitle">
                        mbs@gmail.com
                    </div>
                </div>
                <div class="col-md-4 col-content">
                    <div class="circle">
                        <i class="fas fa-phone fa-3x"></i>
                    </div>
                    <div class=" title">Telphon</div>
                    <div class="subtitle">
                        021551022
                    </div>
                </div>
                <div class="col-md-4 col-content">
                    <div class="circle">
                        <i class="fab fa-instagram fa-3x"></i>
                    </div>
                    <div class=" title">Instagram</div>
                    <div class="subtitle">
                        @bodyrepairmbs
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('addon-script')
    <script>
        $("#myDiv").floatingWhatsApp({
            phone: "6281297135155",
            popupMessage: "Aada yang bisa saya bantu?",
            showPopup: true,
            autoOpenTimeout: 3000,
        });
    </script>
@endpush
