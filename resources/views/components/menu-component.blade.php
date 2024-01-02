@php
    use App\Enums\UserRole;
    $user = Auth::user();
@endphp
<div class="navbar-nav mr-auto py-0">
    @foreach ($menus as $itemMenu)
        <a href="{{ route($itemMenu->route) }}" class="nav-item nav-link">
            {{ $itemMenu->name }}
        </a>
    @endforeach
    @if ($user && $user->role === UserRole::ADMIN)
        <a href="{{ route('admin.home.index') }}" class="nav-item nav-link">
            Trang quản trị
        </a>
    @endif
</div>
