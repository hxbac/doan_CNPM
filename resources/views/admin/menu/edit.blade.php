@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Chỉnh sửa menu</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('admin.menu.update')}}">
                            @csrf
                            <input type="hidden" value="{{ $itemMenu->id }}" name="id">
                            <div class="form-group">
                                <label for="email">Tên menu</label>
                                <input type="text" class="form-control" value="{{ $itemMenu->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Route</label>
                                <input type="text" class="form-control" value="{{ $itemMenu->route }}" name="route">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Thứ tự</label>
                                <input type="text" class="form-control" value="{{ $itemMenu->order }}"name="order">
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <a href="{{ route('admin.menu.index') }}" class="btn bg-danger">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
