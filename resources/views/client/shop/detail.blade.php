@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('home.index') }}">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('shop.index') }}">Cửa hàng</a>
                    <span class="breadcrumb-item active">Chi tiết</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ $product->image }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{ $product->name }}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">{{ number_format($product->price) }} VND</h3>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Ram:</strong>
                        <div class="custom-control custom-radio custom-control-inline">
                            {{ $product->ram . ' GB' ?? '' }}
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Bộ nhớ:</strong>
                        <div class="custom-control custom-radio custom-control-inline">
                            {{ $product->memory . ' GB' ?? '' }}
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">CPU:</strong>
                        <div class="custom-control custom-radio custom-control-inline">
                            {{ $product->cpu ?? '' }}
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Trọng lượng:</strong>
                        <div class="custom-control custom-radio custom-control-inline">
                            {{ $product->mass ?? '' }}
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Pin:</strong>
                        <div class="custom-control custom-radio custom-control-inline">
                            {{ $product->battery ?? '' }}
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Màn hình:</strong>
                        <div class="custom-control custom-radio custom-control-inline">
                            {{ $product->screen ?? '' }}
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Card đồ họa:</strong>
                        <div class="custom-control custom-radio custom-control-inline">
                            {{ $product->card ?? '' }}
                        </div>
                    </div>
                    <form action="{{ route('cart.add') }}" method="POST">
                        <div class="d-flex align-items-center mb-4 pt-2">
                            @csrf
                            <input type="hidden" name="productID" value="{{ $product->id }}">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-minus" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control bg-secondary border-0 text-center" name="quantity" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-plus" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Mô tả sản phẩm</h4>
                            <p>{!! $product->describe !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <x-product-related :currID="$product->id"/>

    <script>
        function addToCart() {

        }
    </script>
@endsection
