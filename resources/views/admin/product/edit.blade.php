@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Chỉnh sửa thông tin sản phẩm</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('admin.product.update')}}">
                            @csrf
                            <input type="hidden" value="{{ $itemProduct->id }}" name="id">
                            <div class="form-group">
                                <label for="email">Id danh mục</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->id_category }}" name="id_category">
                            </div>
                            <div class="form-group">
                                <label for="email">Tên sản phẩm</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Hình ảnh</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->image }}" name="image">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Giá</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->price }}"name="price">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mô tả</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->describe }}"name="describe">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Màn hình</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->screen }}"name="screen">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Giá</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->cpu }}"name="cpu">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Card</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->card }}"name="card">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Pin</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->battery }}"name="battery">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Khối lượng</label>
                                <input type="text" class="form-control" value="{{ $itemProduct->mass }}"name="mass">
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <a href="{{ route('admin.product.index') }}" class="btn bg-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection