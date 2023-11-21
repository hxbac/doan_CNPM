<nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
    <div class="navbar-nav w-100">

       @foreach ($listCategory as $itemCategory)
            <a href="{{ route('shop.index', ['category' => $itemCategory->id]) }}" class="nav-item nav-link">
                {{ $itemCategory->name }}
            </a>
       @endforeach

    </div>
</nav>
