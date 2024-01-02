@php
    use App\Enums\OrderStatus;
@endphp
@extends('layouts.app')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('home.index') }}">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('order.index') }}">Đơn hàng</a>
                    <span class="breadcrumb-item active">Đặt hàng</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-12">
                <p class="mb-3">
                    <b>Người nhận:</b> {{ $order->fullname }}
                </p>
                <p class="mb-3">
                    <b>Số điện thoại:</b> {{ $order->phone }}
                </p>
                <p class="mb-3">
                    <b>Địa chỉ:</b> {{ $order->address }}
                </p>
                <p class="mb-3">
                    <b>Tổng số tiền:</b> {{ number_format($order->total) }} VND
                </p>
                <p class="mb-3">
                    <b>Ghi chú:</b> {{ $order->note }}
                </p>
                <p class="mb-3">
                    <b>Thông báo:</b> {{ $order->message }}
                </p>
                @if ($order->status === OrderStatus::ORDER)
                    <p class="mb-3 d-flex align-items-center justify-content-center">
                        <a class="btn btn-danger" href="{{ route('order.cancel', ['id' => $order->id]) }}">Hủy đặt hàng</a>
                    </p>
                @endif
            </div>
            <div class="col-12">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($orderDetail as $product)
                            <tr>
                                <td class="align-middle"><img src="{{ $product->image }}" alt="" style="width: 50px;"> {{ $product->name }}</td>
                                <td class="align-middle">{{ number_format($product->price) }} VND</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" readonly value="{{ $product->quantity }}">
                                    </div>
                                </td>
                                <td class="align-middle">{{ number_format($product->price * $product->quantity) }} VND</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
