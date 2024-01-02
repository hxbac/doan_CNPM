@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm sản phẩm</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Danh mục</label>
                                    <select class="form-control mb-3" name="id_category">
                                        <option selected="">Chọn danh mục</option>
                                        @foreach ($listCategory as $itemCategory)
                                            <option value="{{ $itemCategory->id }}">
                                                {{ $itemCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Tên sản phẩm</label>
                                    <input type="text" class="form-control" required id="validationDefault01" name="name" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Hình ảnh</label>
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile"></label>
                                     </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Giá</label>
                                    <input type="text" class="form-control" required id="validationDefault01" name="price" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Mô tả</label>
                                    <textarea class="form-control" required id="validationDefault01" name="describe" ></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Màn hình</label>
                                    <input type="text" class="form-control" required id="validationDefault01" name="screen" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Cpu</label>
                                    <input type="text" class="form-control" required id="validationDefault01" name="cpu" >
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
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Card</label>
                                    <input type="text" class="form-control" required id="validationDefault01" name="card" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Pin</label>
                                    <input type="text" class="form-control" required id="validationDefault01" name="battery" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Khối lượng</label>
                                    <input type="text" class="form-control" required id="validationDefault01" name="mass" >
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary mx-2" type="submit">Thêm</button>
                                <a href="{{ route('admin.product.index') }}" class="btn bg-danger">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
