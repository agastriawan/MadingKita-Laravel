@extends('layouts.main')
@section('container')
    <!-- courses section start -->
    <section class="courses-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center mb-4">
                        <h2 class="title">Semua Mading</h2>
                        <p class="sub-title">Temukan infomasi menarik untuk kamu</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs border-0 justify-content-center mb-4" id="nav-tab" role="tablist">
                            <a href="/mading"><button class="nav-link" id="sekolah-tab" data-bs-toggle="tab"
                                    data-bs-target="#sekolah" type="button" role="tab" aria-controls="sekolah"
                                    aria-selected="true">Sekolah</button></a>
                            <a href="/organisasi"><button class="nav-link" id="organisasi-tab" data-bs-toggle="tab"
                                    data-bs-target="#organisasi" type="button" role="tab" aria-controls="organisasi"
                                    aria-selected="false">Organisasi</button></a>
                            <a href="/ekskul"><button class="nav-link" id="ekskul-tab" data-bs-toggle="tab"
                                    data-bs-target="#ekskul" type="button" role="tab" aria-controls="ekskul"
                                    aria-selected="false">Ekstrakulikuler</button></a>
                            <a href="/siswa"><button class="nav-link active" id="siswa-tab" data-bs-toggle="tab"
                                    data-bs-target="#siswa" type="button" role="tab" aria-controls="siswa"
                                    aria-selected="false">Siswa/i</button></a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="siswa" role="tabpanel" aria-labelledby="siswa-tab">
                            <div class="row justify-content-center">

                                @foreach ($siswa as $sis)
                                    <!-- courses item start -->
                                    <div class="com-md-6 col-lg-3">
                                        <div class="courses-item">
                                            <a href="/siswa/{{ $sis->id }}" class="link">
                                                <div class="courses-item-inner">
                                                    <div class="img-box">
                                                        <img src="{{ asset('storage/' . $sis->image) }}" alt="kursus img">
                                                    </div>
                                                    <h3 class="title">{{ $sis->judul }}</h3>
                                                    <div class="instructor">
                                                        <i class="fas fa-user-circle social-icon"
                                                            style="font-size: 16px"></i>
                                                        &nbsp;
                                                        <span class="instructor-name">{{ $sis->pengirim }}</span>
                                                    </div>
                                                    <!-- <div class="price">$ 49</div> -->
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- courses item end -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="organisasi" role="tabpanel" aria-labelledby="organisasi-tab">


                        </div>
                        <div class="tab-pane fade" id="webinar" role="tabpanel" aria-labelledby="webinar-tab">hey yu
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                {{ $siswa->links('pagination::bootstrap-4') }}
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    </div>
    <!-- main wrapper end -->
@endsection
