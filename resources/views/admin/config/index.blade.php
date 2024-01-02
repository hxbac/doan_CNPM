@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.menu.index') }}" class="btn btn-primary mb-3">Quản lý menu</a>
            </div>
            <div class="col-sm-8">
                <div class="card-transparent card-block card-stretch card-height">
                    <div class="card-body p-0">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Slide</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.config.slide') }}" method="POST" class="d-flex flex-column" enctype="multipart/form-data">
                                    @csrf
                                    <ul class="list-inline p-0 mb-0">
                                        @foreach ($slides as $key => $item)
                                            <li class="mb-1">
                                                <div class="row">
                                                    <div class="col-sm-6" style="overflow: hidden">
                                                        <label for="slide-image-{{ $key }}" style="cursor: pointer;">Chọn ảnh</label>
                                                        <input type="file" hidden name="slide-image-{{ $key }}" class="input-image-slide" id="slide-image-{{ $key }}"
                                                            data-id="{{ $key }}">
                                                        <br>
                                                            <img height="170" src="{{ $item->image }}" id="preview-slide-image-{{ $key }}" alt="">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputphone">Tiêu đề</label>
                                                            <input type="text" class="form-control" value="{{ $item->title }}" name="title-slide-{{ $key }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputphone">Nội dung</label>
                                                            <input type="text" class="form-control" value="{{ $item->content }}" name="content-slide-{{ $key }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr>
                                        @endforeach
                                    </ul>
                                    <button class="btn btn-primary mx-auto">Cập nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card-transparent card-block card-stretch card-height">
                    <div class="card-body p-0">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Banner</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.config.banner') }}" method="POST" class="d-flex flex-column" enctype="multipart/form-data">
                                    @csrf
                                    <ul class="list-inline p-0 mb-0">
                                        @foreach ($banners as $key => $item)
                                            <li class="mb-1">
                                                <div class="row">
                                                    <div class="col-sm-12" style="overflow: hidden;">
                                                        <label for="banner-image-{{ $key }}" style="cursor: pointer;">Chọn ảnh</label>
                                                        <input type="file" hidden name="banner-image-{{ $key }}" class="input-image-banner" id="banner-image-{{ $key }}"
                                                            data-id="{{ $key }}">
                                                        <br>
                                                            <img height="188" src="{{ $item->image }}" id="preview-banner-image-{{ $key }}" alt="">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputphone">Tiêu đề</label>
                                                            <input type="text" class="form-control" value="{{ $item->title }}" name="title-banner-{{ $key }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <hr>
                                        @endforeach
                                    </ul>
                                    <button class="btn btn-primary mx-auto">Cập nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            $('.input-image-slide').on('change', function () {
                const file = this.files[0]
                if (!file) {
                    return
                }
                document.getElementById(`preview-slide-image-${this.dataset.id}`).src = URL.createObjectURL(file)
            })
            $('.input-image-banner').on('change', function () {
                const file = this.files[0]
                if (!file) {
                    return
                }
                document.getElementById(`preview-banner-image-${this.dataset.id}`).src = URL.createObjectURL(file)
            })
        });
    </script>
@endsection
