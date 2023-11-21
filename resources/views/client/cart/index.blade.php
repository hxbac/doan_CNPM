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
                    <span class="breadcrumb-item active">Giỏ hàng</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @forelse ($cart as $product)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ $product->image }}" alt="" style="height: 50px;">
                                    {{ $product->name }}
                                </td>
                                <td class="align-middle">{{ number_format($product->price) }} VND</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" readonly value="{{ $product->quantity }}">
                                    </div>
                                </td>
                                <td class="align-middle">{{ number_format($product->price * $product->quantity) }} VND</td>
                                <td class="align-middle"><a href="{{ route('cart.remove', ['productID' => $product->id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a></td>
                            </tr>
                            @php
                                $total += $product->price * $product->quantity;
                            @endphp
                        @empty
                            <h4 class="text-center">Giỏ hàng trống</h4>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">TÓM TẮT GIỎ HÀNG</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng</h5>
                            <h5>{{ number_format($total) }} VND</h5>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
