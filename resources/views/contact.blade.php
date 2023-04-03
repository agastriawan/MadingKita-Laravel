@extends('layouts.main')
@section('container')
    <!-- breadcrumb start -->
    <div class="breadcrumb-nav">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- contact section start -->
    <section class="contact-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-items">
                        <div class="contact-item">
                            <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                            <h3>Adress</h3>
                            <p>Jl. Bhakti Suci No.100, Cimpaeun, Kec. Tapos, Kota Depok, Jawa Barat 16459</p>
                        </div>
                        <div class="contact-item">
                            <div class="icon-box"><i class="fas fa-phone"></i></div>
                            <h3>Phone</h3>
                            <p>0882 9574 7113</p>
                        </div>
                        <div class="contact-item">
                            <div class="icon-box"><i class="fas fa-envelope"></i></div>
                            <h3>Email</h3>
                            <p>agastriawan55@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form box">
                        <h2 class="form-title">Leave a Message</h2>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.store') }}" id="contact"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Massage" id="massage" name="massage"></textarea>
                            </div>
                            <button type="submit" class="btn btn-block btn-theme btn-form">send message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section end -->
@endsection
