<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Pelayanan</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Halaman</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Pelayanan</li>
            </ol>
        </nav>
    </div>
</div>

<div class="text-center mt-5">
    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Daftar Harga Pelayanan</h5>
</div>

<div class="container py-3" style="max-width: 800px">
    @foreach ($hargas as $harga)
        <div class="d-flex justify-content-between daftar-harga-item">
            <span class="fw-medium">{{ $harga->pelayanan }}</span>
            <span class="text-primary fw-bold">Rp{{ number_format($harga->harga, 0, ',', '.') }}</span>
        </div>
    @endforeach
</div>

<style>
    .daftar-harga-item {
        font-size: 1.1rem;
        padding: 10px 0;
        border-bottom: 1px solid #dee2e6;
    }
</style>
