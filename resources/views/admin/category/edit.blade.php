@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Chỉnh sửa danh mục</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('admin.category.update')}}">
                            @csrf
                            <input type="hidden" value="{{ $itemCategory->id }}" name="id">
                            <div class="form-group">
                                <label for="email">Tên danh mục</label>
                                <input type="text" class="form-control" required value="{{ $itemCategory->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mô tả</label>
                                <input type="text" class="form-control" required value="{{ $itemCategory->describe }}" name="describe">
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <a href="{{ route('admin.category.index') }}" class="btn bg-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
