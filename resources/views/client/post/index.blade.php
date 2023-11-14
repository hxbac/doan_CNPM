@extends('layouts.app')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('home.index') }}">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('post.index') }}">Danh sách bài viết</a>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            @foreach ($posts as $post)
                <div class="col-md-6">
                    <div class="product-offer mb-30" style="height: 300px;">
                        <img class="img-fluid" src="{{ $post->image  }}" alt="">
                        <div class="offer-text">
                            <h3 class="text-white mb-3">{{ $post->title }}</h3>
                            <a href="{{ route('post.detail', ['id' => $post->id]) }}" class="btn btn-primary">Xem thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
