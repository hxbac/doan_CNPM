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
                        <form method="post" action="{{route('admin.product.update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $itemProduct->id }}" name="id">
                            <div class="form-group">
                                <label for="email">Danh mục</label>
                                <select class="form-control mb-3" name="id_category">
                                    <option selected="">Chọn danh mục</option>
                                    @foreach ($listCategory as $itemCategory)
                                        <option value="{{ $itemCategory->id }}" {{ $itemProduct->id_category == $itemCategory->id ? 'selected' : '' }}>
                                            {{ $itemCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Tên sản phẩm</label>
                                <input type="text" class="form-control" required value="{{ $itemProduct->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="validationDefault01">Hình ảnh</label>
                                <div class="custom-file ">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="changeImage" id="change-image">
                                    <label class="custom-control-label" for="change-image">Thay đổi hình ảnh</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Giá</label>
                                <input type="text" class="form-control" required value="{{ $itemProduct->price }}"name="price">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mô tả</label>
                                <textarea class="form-control" required name="describe">{{ $itemProduct->describe }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Màn hình</label>
                                <input type="text" class="form-control" required value="{{ $itemProduct->screen }}"name="screen">
                            </div>
                            <div class="form-group">
                                <label for="pwd">CPU</label>
                                <input type="text" class="form-control" required value="{{ $itemProduct->cpu }}"name="cpu">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationDefault01">Ram</label>
                                <select class="form-control mb-3" name="ram">
                                    <option value="4" checked>4 GB</option>
                                    <option value="8" >8 GB</option>
                                    <option value="16" >16 GB</option>
                                    <option value="32" >32 GB</option>
                                    <option value="64" >64 GB</option>
                                    <option value="128" >128 GB</option>
                                    <option value="256" >256 GB</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationDefault01">Bộ nhớ</label>
                                <select class="form-control mb-3" name="memory">
                                    <option value="128" checked>128 GB</option>
                                    <option value="256" >256 GB</option>
                                    <option value="512" >512 GB</option>
                                    <option value="1024" >1024 GB</option>
                                    <option value="2048" >2056 GB</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Card</label>
                                <input type="text" class="form-control" required value="{{ $itemProduct->card }}"name="card">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Pin</label>
                                <input type="text" class="form-control" required value="{{ $itemProduct->battery }}"name="battery">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Khối lượng</label>
                                <input type="text" class="form-control" required value="{{ $itemProduct->mass }}"name="mass">
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
