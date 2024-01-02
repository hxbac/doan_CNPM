<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản phẩm nổi
            bật</span></h2>
    <div class="row px-xl-5">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
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
                    <div class="text-center py-4 d-flex flex-column">
                        <a class="h6 text-decoration-none text-truncate mx-auto"
                            href="{{ route('shop.detail', [
                                'slug' => $product->getSlug(),
                                'id' => $product->id,
                            ]) }}"
                            style="width: 80%; display: block;">{{ $product->name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{ number_format($product->price) }} VND</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small>Số lượt mua: {{ $product->total_quantity ?? 0 }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
