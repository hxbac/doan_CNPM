@extends('layouts.app')
@php
    $total = 0;
@endphp
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('home.index') }}">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('shop.index') }}">Cửa hàng</a>
                    <span class="breadcrumb-item active">Thanh toán</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <form action="{{ route('checkout.order') }}" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Thông tin nhận hàng</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Họ tên người nhận</label>
                                <input class="form-control" type="text" name="fullname">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Số điện thoại người nhận</label>
                                <input class="form-control" type="text" name="phone">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Địa chỉ người nhận</label>
                                <input class="form-control" type="text" name="address">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Lời nhắn</label>
                                <textarea class="form-control" type="text" name="note"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Hóa đơn</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Sản phẩm</h6>
                            @foreach ($cart as $product)
                                <div class="d-flex justify-content-between">
                                    <p>{{ $product->name }}</p>
                                    <p>{{ number_format($product->quantity * $product->price) }} VND</p>
                                </div>
                                @php
                                    $total += $product->quantity * $product->price;
                                @endphp
                            @endforeach
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Tổng</h5>
                                <h5>{{ number_format($total) }} VND</h5>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->
@endsection
