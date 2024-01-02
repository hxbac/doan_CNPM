<!-- Products Start -->
<div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Bạn có thể thích</span></h2>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">

                @foreach ($products as $product)
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ $product->image }}" alt="">
                            <div class="product-action">
                                <a class="w-100 h-100 p-3 d-block"
                                    href="{{ route('shop.detail', [
                                        'slug' => $product->getSlug(),
                                        'id' => $product->id,
                                    ]) }}"
                                >
                                    <div class="mb-2" style="max-height: 48px; overflow: hidden">CPU: {{ $product->cpu }}</div>
                                    <div class="mb-2" style="max-height: 48px; overflow: hidden">Ram: {{ $product->ram }}GB</div>
                                    <div class="mb-2" style="max-height: 48px; overflow: hidden">Bộ nhớ: {{ $product->memory }}GB</div>
                                    <div class="mb-2" style="max-height: 48px; overflow: hidden">Card: {{ $product->card }}</div>
                                    <div class="mb-2" style="max-height: 48px; overflow: hidden">Màn hình: {{ $product->screen }}</div>
                                </a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href={{ route('shop.detail', [
                                'slug' => $product->getSlug(),
                                'id' => $product->id
                            ]) }}>{{ $product->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ number_format($product->price) }} VND</h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- Products End -->
