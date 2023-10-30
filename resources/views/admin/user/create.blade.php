@extends('layouts.admin')
@php
    use App\Enums\UserRole;
@endphp
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Thêm người dùng</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.user.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Họ tên</label>
                            <input type="text" class="form-control" name="name">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="pwd">Email</label>
                            <input type="text" class="form-control" name="email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mật khẩu</label>
                            <input type="password" class="form-control" name="password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="pwd">Vai trò</label>
                            <select class="form-control mb-3" name="role">
                                @foreach (UserRole::toSelectArray() as $val => $str)
                                    <option value="{{ $val }}">{{ $str }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <a href="{{ route('admin.menu.index') }}" class="btn bg-danger">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#change-password').on('change', function () {
        console.log(this.checked)
    })
</script>
@endsection
