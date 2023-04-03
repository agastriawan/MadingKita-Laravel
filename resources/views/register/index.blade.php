@extends('layouts.main')
@section('container')
    <div class="login-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-6 col-xl-5">
                    <div class="signup-form box">
                        <h2 class="form-title text-center">Create Your Account</h2>
                        <form action="/register" method="POST">
                            @csrf
                            {{-- @csrf  => script pengamanan, atau token yang dibuat laravel --}}
                            <div class="form-group">
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                    id="name" placeholder="name" required value="{{ old('name') }}" autocomplete="off">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" id="username" placeholder="username" required
                                    value="{{ old('username') }}" autocomplete="off">

                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                                    id="email" placeholder="name@example.com" required value="{{ old('email') }}"
                                    autocomplete="off">

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Password" required>

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-theme btn-block btn-form col-lg-12">Register</button>
                            <p class="text-center mt-4 mb-0">Already have an account ? <a href="/login">Sign
                                    In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
