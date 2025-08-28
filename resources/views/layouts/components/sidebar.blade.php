@php
    $menus = [
        [
            'title' => 'Dashboard',
            'icon' => 'bi bi-speedometer',
            'route' => route('dashboard'),
        ],
        [
            'title' => 'Products',
            'icon' => 'bi bi-box',
            'route' => route('products.index'),
        ],
        [
            'title' => 'Categories',
            'icon' => 'bi bi-tags',
            'route' => route('categories.index'),
        ],
    ];
@endphp

<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('Templates/dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Inventory Management</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
                @foreach ($menus as $menu)
                    <li class="nav-item">
                        <a href="{{ $menu['route'] }}" class="nav-link {{ request()->url() === $menu['route'] ? 'active' : '' }}">
                            <i class="nav-icon {{ $menu['icon'] }}"></i>
                            <p>{{ $menu['title'] }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
