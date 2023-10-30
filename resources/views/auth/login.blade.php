@extends('layouts.app')
@section('content')

    <link rel="stylesheet" href="{{ asset('login-public/css/style.css') }}">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block py-5">
                            <div class="mb-4">
                                <h3>Đăng nhập</h3>
                            </div>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                {{-- <div class="d-flex mb-5 align-items-center">
                                    <span class="ml-auto"><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a></span>
                                </div> --}}

                                <input type="submit" value="Đăng nhập" class="btn btn-pill text-white btn-block btn-primary">

                                <span class="d-block text-center my-4 text-muted">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></span>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="{{ asset('login-public/js/main.js') }}"></script>
@endsection
