<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="#hero" class="logo d-flex align-items-center me-auto">
            @php
                use App\Models\Logo;
                $logo = Logo::first();
            @endphp

            @if ($logo && $logo->image)
                <img src="{{ asset('storage/' . $logo->image) }}" alt="Logo"
                     style="height: 100px; width: auto; object-fit: contain;">
            @else
                <h1 class="sitename">Website</h1>
            @endif
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="#about">Get Started</a>
    </div>
</header>
