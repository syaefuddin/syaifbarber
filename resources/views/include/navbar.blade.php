{{-- Navbar --}}
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="/" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-scissors me-3"></i>Syaif Barbers</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                    href="{{ route('home') }}">Beranda</a>
                <a href="{{ url('about_menu') }}"
                    class="nav-item nav-link {{ Request::is('about_menu') ? 'active' : '' }}">Tentang</a>
                <a href="{{ url('style_menu') }}"
                    class="nav-item nav-link {{ Request::is('style_menu') ? 'active' : '' }}">Pelayanan</a>
                <a href="{{ url('team_menu') }}"
                    class="nav-item nav-link {{ Request::is('team_menu') ? 'active' : '' }}">Tim</a>
            </div>
            <a href="{{ url('admin/login') }}" class="btn btn-primary py-2 px-4">Masuk</a>
        </div>
    </nav>
</div>
