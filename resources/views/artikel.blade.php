@extends('layouts.main')
@section('container')
    <!-- breadcrumb start -->
    <div class="breadcrumb-nav">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Upload Artikel</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->

    @if (session()->has('success'))
        <div class="alert alert-info col-lg-10 text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- contact section start -->
    <section class="contact-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-items">
                        <div class="contact-item">
                            <div class="icon-box"><i class="fas fa-pen"></i></div>
                            <h3>Syarat dan ketentuan mengirim artikel </h3>
                            <li>Artikel harus berisi fakta dengan sumber yang jelas</li>
                            <li>Artikel harus edukatif dan berisikan informasi-informasi menarik</li>
                            <li>Artikel dikirim menggunakan link google drive <span style="font-style: italic;">(pastikan
                                    akses tidak terkunci)</span></li>
                            <li>Artikel tidak boleh mengandung unsur sara dan pornografi</li>
                            <li>Pengirim artikel harus menyertakan data diri lengkap</li>
                            <li>Pengirim artikel harus warga sekolah SMKN 1 DEPOK, selain itu tidak diperkenankan</li>
                            <br>
                            <p style="font-style: italic; color:red;">* Jika tidak memenuhi syarat dan ketentuan diatas
                                artikel akan dikembalikan dan tidak akan diterbitkan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form box">
                        <h2 class="form-title">Kirim Artikel Mading</h2>
                        <form action="/artikel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class=" form-group">
                                <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Kelas" id="kelas" name="kelas"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <select class="form-select" id="tipe" name="tipe">
                                    <option value="">-- Pilih Tipe Mading --</option>
                                    <option value="Sekolah">Sekolah</option>
                                    <option value="Organisasi">Organisasi</option>
                                    <option value="Ekstrakulikuler">Ekstrakulikuler</option>
                                    <option value="Siswa">Siswa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="pengirim" id="pengirim"
                                    name="pengirim" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">Kartu Pelajar</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                                    name="image" onchange="previewImage()">

                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Judul Artikel" id="judul"
                                    name="judul" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="WhatsApp Pengirim" id="whatsapp"
                                    name="whatsapp" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email Pengirim" id="email"
                                    name="email" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Link Google Drive" id="link"
                                    name="link" autocomplete="off" required>
                            </div>
                            <button type="submit" class="btn btn-block btn-theme btn-form">kirim artikel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Matiin file upload di trix
        document.addEventListener('trix-file-accept', function(e) {
            e.preverentDefault()
        })

        // PREVIEW IMAGE
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    <!-- contact section end -->
@endsection
