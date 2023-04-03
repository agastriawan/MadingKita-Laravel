@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Mading Ekstrakulikuler</h1>
    </div>


    <div class="col-lg-8">
        <form method="POST" action="/admin/ekskul/{{ $ekskuls->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required
                    autofocus value="{{ old('judul', $ekskuls->judul) }}" autocomplete="off">

                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pengirim" class="form-label">pengirim</label>
                <input type="text" class="form-control @error('pengirim') is-invalid @enderror" id="pengirim"
                    name="pengirim" required value="{{ old('pengirim', $ekskuls->pengirim) }}" autocomplete="off">

                @error('pengirim')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="whatsapp" class="form-label">whatsapp</label>
                <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp"
                    name="whatsapp" required value="{{ old('whatsapp', $ekskuls->whatsapp) }}" autocomplete="off">

                @error('whatsapp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    required value="{{ old('email', $ekskuls->email) }}" autocomplete="off">

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="instagram" class="form-label">instagram</label>
                <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram"
                    name="instagram" required value="{{ old('instagram', $ekskuls->instagram) }}" autocomplete="off">

                @error('instagram')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">link</label>
                <input type="link" class="form-control @error('link') is-invalid @enderror" id="link" name="link" required
                    value="{{ old('link', $ekskuls->link) }}" autocomplete="off">

                @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="hidden" name="oldImage" value="{{ $ekskuls->image }}">
                @if ($ekskuls->image)
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block"
                        src="{{ asset('storage/' . $ekskuls->image) }}">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block"
                        src="{{ asset('storage/' . $ekskuls->image) }}">
                @endif

                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage()">

                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            {{-- Trix editor --}}
            <div class="mb-3">
                <label for="deskripsi" class="form-label">deskripsi</label>
                @error('deskripsi')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi', $ekskuls->deskripsi) }}">
                <trix-editor input="deskripsi"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>



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
@endsection
