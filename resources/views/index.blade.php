@extends('layouts.main')
@section('container')
    <!-- Banner section start -->
    <section class="banner-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="banner-text">
                        <h2 class="mb-3">Apa itu website Mading Kita?</h2>
                        <h1 class="mb-3 text-capitalize">Mading Kita</h1>
                        <p class="mb-4">Mading Kita adalah website mading informasi yang berfungsi untuk
                            mempercepat dan memodernisasi sistem mading manual yang ada di sekolah SMKN 1 DEPOK</p>
                        <br>
                        <p>Klik disini untuk pengajuan artikel mading</p>
                        <a href="/artikel" class="btn btn-theme">Upload Mading</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-img">
                        <div class="circular-img">
                            <div class="circular-img-inner">
                                <div class="circular-img-circle"></div>
                                <img src="image/undraw_profile_re_4a55.svg" alt="banner-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner section end -->

    <!-- Fun Facts Section Start -->
    <section class="fun-facts-section">
        <div class="container">
            <div class="box py-2">
                <div class="row text-center">
                    <div class="col-md-6 col-lg-3">
                        <div class="fun-facts-item">
                            <h2 class="style-1">{{ $sekolahs->id }}</h2>
                            <p>Mading Sekolah</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="fun-facts-item">
                            <h2 class="style-2">{{ $organisasis->id }}</h2>
                            <p>Mading Organisasi</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="fun-facts-item">
                            <h2 class="style-3">{{ $ekskuls->id }}</h2>
                            <p>Mading Ekstrakulikuler</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="fun-facts-item">
                            <h2 class="style-4">{{ $siswas->id }}</h2>
                            <p>Mading Peserta Didik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fun Facts Section end -->

    <!-- Courses Section Start -->

    <section class="courses-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h2 class="title">Mading</h2>
                        <p class="sub-title">Mading Informasi Sekolah SMKN 1 DEPOK</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <!-- courses item start -->
                <div class="com-md-6 col-lg-3">
                    <div class="courses-item">
                        <a href="/mading" class="link">
                            <div class="courses-item-inner">
                                <div class="img-box">
                                    <img src="{{ asset('storage/' . $sekolahs->image) }}" alt="kursus img">
                                </div>
                                <h3 class="title">{{ $sekolahs->judul }}</h3>
                                <div class="instructor">
                                    <i class="fas fa-user-circle social-icon" style="font-size: 16px"></i>
                                    &nbsp;
                                    <span class="instructor-name">{{ $sekolahs->pengirim }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- courses item end -->

                <!-- courses item start -->
                <div class="com-md-6 col-lg-3">
                    <div class="courses-item">
                        <a href="/organisasi" class="link">
                            <div class="courses-item-inner">
                                <div class="img-box">
                                    <img src="{{ asset('storage/' . $organisasis->image) }}" alt="kursus img">
                                </div>
                                <h3 class="title">{{ $organisasis->judul }}</h3>
                                <div class="instructor">
                                    <i class="fas fa-user-circle social-icon" style="font-size: 16px"></i>
                                    &nbsp;
                                    <span class="instructor-name">{{ $organisasis->pengirim }}</span>
                                </div>
                                <!-- <div class="price">$ 49</div> -->
                            </div>
                        </a>
                    </div>
                </div>
                <!-- courses item end -->

                <!-- courses item start -->
                <div class="com-md-6 col-lg-3">
                    <div class="courses-item">
                        <a href="/ekskul" class="link">
                            <div class="courses-item-inner">
                                <div class="img-box">
                                    <img src="{{ asset('storage/' . $ekskuls->image) }}" alt="kursus img">
                                </div>
                                <h3 class="title">{{ $ekskuls->judul }}</h3>
                                <div class="instructor">
                                    <i class="fas fa-user-circle social-icon" style="font-size: 16px"></i>
                                    &nbsp;
                                    <span class="instructor-name">{{ $ekskuls->pengirim }}</span>
                                </div>
                                <!-- <div class="price">$ 49</div> -->
                            </div>
                        </a>
                    </div>
                </div>
                <!-- courses item end -->

                <!-- courses item start -->
                <div class="com-md-6 col-lg-3">
                    <div class="courses-item">
                        <a href="/siswa" class="link">
                            <div class="courses-item-inner">
                                <div class="img-box">
                                    <img src="{{ asset('storage/' . $siswas->image) }}" alt="kursus img">
                                </div>
                                <h3 class="title">{{ $siswas->judul }}</h3>
                                <div class="instructor">
                                    <i class="fas fa-user-circle social-icon" style="font-size: 16px"></i>
                                    &nbsp;
                                    <span class="instructor-name">{{ $siswas->pengirim }}</span>
                                </div>
                                <!-- <div class="price">$ 49</div> -->
                            </div>
                        </a>
                    </div>
                </div>
                <!-- courses item end -->

                <div class="row">
                    <div class="col-12 text-center mt-3">
                        <a href="/mading" class="btn btn-theme">Lihat Semua Mading</a>
                    </div>
                </div>
            </div>
    </section>
    <!-- Courses Section end -->

    <!-- testimonial section start -->
    <section class="testimonials-section section-padding position-relative">
        <div class="decoration-circle">
            <div class="decoration-circles-item"></div>
            <div class="decoration-circles-item"></div>
            <div class="decoration-circles-item"></div>
            <div class="decoration-circles-item"></div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h2 class="title">Students Feedback</h2>
                        <p class="sub-title">What our students say</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="img-box rounded-circle position-relative">
                        <img src="" class="w-100 js-testimonial-img rounded circle" alt="">
                    </div>
                    <div id="carouselOne" class="carousel slide text-center" data-bs-ride="carousel">
                        <div class="carousel-inner mb-4">
                            <div class="carousel-item active" data-js-testimonial-img="">
                                <div class="testimonial-item">
                                    <h2 class="text-1">
                                        <- Next Slide ->
                                    </h2>
                                </div>
                            </div>
                            <div class="carousel-item" data-js-testimonial-img="image/nadia-test.png">
                                <div class="testimonial-item">
                                    <p class=" text-1">“Finally! Akhirnya MADING KITA hadir, adalah salah satu
                                        inovasi fleksibel yang memudahkan warga sekolah untuk berbagi informasi ataupun
                                        berita, informatif dan mudah dijangkau oleh siapapun. Saya berharap semoga seluruh
                                        warga sekolah, dapat memanfaatkan platform digital sebagai sarana literasi dan
                                        membangun karakter serta minat baca yang lebih tinggi, big applause to developers!
                                        #SalamLiterasi</h3>
                                    <h3>Nadia Shaliha</h3>
                                    <p class="text-2">Pelajar XI RPL 1</p>
                                </div>
                            </div>
                            <div class="carousel-item" data-js-testimonial-img="image/test-agas.png">
                                <div class="testimonial-item">
                                    <p class=" text-1">Sebuah website yang sangat emudahkan pelajar SMKN 1 Depok
                                        dalam mendapatkan informasi seputar sekolah.</p>
                                    <h3>Agas Triawan</h3>
                                    <p class="text-2">Pelajar XI RPL 1</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselOne"
                            data-bs-slide="prev">
                            <i class="fas fa-arrow-left"></i>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselOne"
                            data-bs-slide="next">
                            <i class="fas fa-arrow-right"></i>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p class="m-0 py-4 text-center">copyright &copy;2022 Mading Kita</p>
        </div>
    </div>
@endsection
