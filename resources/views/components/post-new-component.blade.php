<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Bài viết mới</span></h2>
    <div class="row px-xl-5">
        @foreach ($posts as $post)
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="{{ $post->image }}" alt="">
                    <div class="offer-text">
                        <h3 class="text-white mb-3" style="text-align: center; width: 70%;">{{ $post->title }}</h3>
                        <a href="{{ route('post.detail', ['id' => $post->id]) }}" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
