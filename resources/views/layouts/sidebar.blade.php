@php
$menus = [
    [
        'id' => 1,
        'name' => 'Produk',
        'url' => '/dashboard/products',
        'icon' => 'menu-icon tf-icons bx bx-book',
    ],
    [
        'id' => 2,
        'name' => 'Orderan',
        'url' => '/dashboard/orders',
        'icon' => 'menu-icon tf-icons bx bx-book',
    ],
];
@endphp

<ul class="menu-inner py-1 mt-4">
    <!-- Dashboard -->
    <li class="menu-item @if(url()->current() == url('/dashboard')) active @endif">
        <a href="{{ url('/dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-grid-alt"></i>
            <div>Dashboard</div>
        </a>
    </li>

    @foreach ($menus as $menu)
        <li class="menu-item @if(url()->current() == url($menu['url'])) active @endif"">
            <a href="{{ url($menu['url']) }}" class="menu-link">
                <i class="{{ $menu['icon'] }}"></i>
                <div>{{ $menu['name'] }}</div>
            </a>
        </li>
    @endforeach

    {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-dock-top"></i>
            <div data-i18n="Account Settings">Account Settings</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="pages-account-settings-account.html" class="menu-link">
                    <div data-i18n="Account">Account</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="pages-account-settings-notifications.html" class="menu-link">
                    <div data-i18n="Notifications">Notifications</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="pages-account-settings-connections.html" class="menu-link">
                    <div data-i18n="Connections">Connections</div>
                </a>
            </li>
        </ul>
    </li> --}}
</ul>