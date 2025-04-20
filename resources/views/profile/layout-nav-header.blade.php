<ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-sm-0 gap-2 mt-4 mb-4 bg-white p-2 rounded-3 shadow-sm">
    <li class="nav-item">
        <a class="nav-link @if($active === 'profile') active @endif" href="{{ url('profile') }}">
            <i class="icon-base bx bx-user icon-sm me-1_5"></i>
            Profile
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($active === 'product') active @endif" href="{{ url('profile/product') }}">
            <i class="icon-base bx bx-grid-alt icon-sm me-1_5"></i>
            Produk
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="pages-profile-connections.html">
            <i class="icon-base bx bx-link icon-sm me-1_5"></i>
            Connections
        </a>
    </li>
</ul>