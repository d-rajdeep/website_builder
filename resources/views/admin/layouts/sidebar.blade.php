<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    <!-- Zone List -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logos.index') }}">
            <i class="bi bi-image menu-icon"></i>
            <span class="menu-title">Logo</span>
        </a>
    </li>

    <!-- Collector List -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#collector-menu" aria-expanded="false"
            aria-controls="collector-menu">
            <i class="bi bi-people menu-icon"></i>
            <span class="menu-title">Collector List</span>
            <i class="menu-arrow bi bi-chevron-down"></i>
        </a>
        <div class="collapse" id="collector-menu">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="sub-menu-icon"></i>
                        All Collectors
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="sub-menu-icon"></i>
                        Add New Collector
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <!-- Shop List -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#shop-menu" aria-expanded="false" aria-controls="shop-menu">
            <i class="bi bi-shop menu-icon"></i>
            <span class="menu-title">Shop List</span>
            <i class="menu-arrow bi bi-chevron-down"></i>
        </a>
        <div class="collapse" id="shop-menu">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="sub-menu-icon"></i>
                        All Shops
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="sub-menu-icon"></i>
                        Add New Shop
                    </a>
                </li>
            </ul>
        </div>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">Tables</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
            <i class="icon-contract menu-icon"></i>
            <span class="menu-title">Icons</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
            <i class="icon-ban menu-icon"></i>
            <span class="menu-title">Error pages</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="error">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
            <i class="icon-paper menu-icon"></i>
            <span class="menu-title">Documentation</span>
        </a>
    </li> --}}
</ul>
