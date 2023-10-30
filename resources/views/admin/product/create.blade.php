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
                        <form method="post" action="{{route('admin.product.store')}}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Id danh mục</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="id_category" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="name" >
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
                                    <input type="text" class="form-control" id="validationDefault01" name="price" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Mô tả</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="describe" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Màn hình</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="screen" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Cpu</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="cpu" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Card</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="card" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Pin</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="battery" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Khối lượng</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="mass" >
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
