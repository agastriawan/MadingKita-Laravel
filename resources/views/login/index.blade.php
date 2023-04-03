@extends('layouts.main')

@section('container')
    {{-- ALERT LOGIN SUCCESS --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- ALERT LOGIN GAGAL --}}
    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="login-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-6 col-xl-5">
                    <div class="login-form box">
                        <h2 class="form-title text-center">Log In to Your Account</h2>

                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email" name="email" id="email" autocomplete="off"
                                    value="{{ old('email') }}" required autofocus>

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control " placeholder="Password" id="password"
                                    name="password" required>
                            </div>
                            <button type="submit" class="btn btn-theme btn-block btn-form col-lg-12"> Log
                                in</button>
                            <p class="text-center mt-4 mb-0">Don't have an account ? <a href="/register">Sign
                                    Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login section end -->

    <div class="footer-bottom">
        <div class="container">
            <p class="m-0 py-4 text-center">copyright &copy;2022 Mading Kita</p>
        </div>
    </div>
@endsection
