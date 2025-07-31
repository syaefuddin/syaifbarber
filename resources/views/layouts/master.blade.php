<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Syaif Barbers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('logokuu.png') }}" type="image/png">
    @include('include.style')
</head>

<body>
    <div class="container-xxl bg-white p-0">
        {{-- Spinner --}}
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        {{-- Navbar --}}
        @include('include.navbar')

        {{-- Hero --}}
        @yield('hero') {{-- bagian navbar gais --}}

        {{-- Konten utama --}}
        @yield('content')

        {{-- Footer --}}
        @include('include.footer')

        {{-- Back to top --}}
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('include.js')
</body>

</html>
