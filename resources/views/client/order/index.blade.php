@extends('layouts.app')
@section('content')
    <style>
        td, th {
            vertical-align: middle !important;
        }
    </style>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('home.index') }}">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('shop.index') }}">Cửa hàng</a>
                    <span class="breadcrumb-item active">Đặt hàng</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thông báo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                            <tr>
                                <th scope="row"><a href="{{ route('order.detail', ['id' => $item->id]) }}">Đơn hàng {{ $item->id }}</a></th>
                                <td>{{ $item->created_at }}</td>
                                <td><div class="text-center" style="width: max-content;">{!! $item->getStatusStr() !!}</div></td>
                                <td>{{ $item->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
