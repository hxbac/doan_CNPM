<div class="navbar-nav mr-auto py-0">
    @foreach ($menus as $itemMenu)
        <a href="{{ route($itemMenu->route) }}" class="nav-item nav-link">
            {{ $itemMenu->name }}
        </a>
    @endforeach
</div>
