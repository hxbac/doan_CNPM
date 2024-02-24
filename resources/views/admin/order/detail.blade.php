@extends('layouts.admin')
@php
    use App\Enums\OrderStatus;
@endphp
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Đơn hàng {{ $order->id }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="py-3">
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
                        </div>
                        <div class="d-flex justify-content-center">
                            @switch($order->status)
                                @case(OrderStatus::ORDER)
                                    <a href="{{ route('admin.order.cancel', ['id' => $order->id]) }}" class="btn btn-danger mx-1">Hủy</a>
                                    <a href="{{ route('admin.order.accept', ['id' => $order->id]) }}" class="btn btn-success mx-1">Chấp nhận</a>
                                    @break
                                @case(OrderStatus::CANCEL_ORDER)
                                    <h5 class="text-center">Đơn hàng đã bị hủy.</h5>
                                    @break
                                @case(OrderStatus::CONFIRM_ORDER)
                                    <a href="{{ route('admin.order.cancel', ['id' => $order->id]) }}" class="btn btn-danger mx-1">Hủy</a>
                                    <a href="{{ route('admin.order.success', ['id' => $order->id]) }}" class="btn btn-success mx-1">Giao thành công</a>
                                    @break
                                @case(OrderStatus::ORDER_SUCCESS)
                                    <h5 class="text-center">Đơn hàng đã giao thành công.</h5>
                                    @break
                                @default

                            @endswitch
                        </div>
                        <div class="table-responsive">
                            <div id="datatable_wrapper" class="dataTables_wrapper">
                                <table id="datatable" class="table data-table table-striped dataTable" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                        <tr class="ligth" role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                style="width: 158.094px;">Sản phẩm</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 247.594px;">Giá</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 118.938px;">Số lượng</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 39.7031px;">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderDetail as $product )
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><a href=""><img src="{{ $product->image }}" alt="" style="width: 50px;"> {{ $product->name }}</a></td>
                                                <td>{{ number_format($product->price) }} VND</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ number_format($product->price * $product->quantity) }} VND</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
