<!-- Menu Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Daftar Pelayanan</h5>
            <h1 class="mb-5">Layanan Babershop yang disediakan</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                        href="#tab-1">
                        <i class="fas fa-scissors"></i>
                        <div class="ps-3">
                            <h6 class="mt-n1 mb-0">Style Rambut</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                        <i class="fas fa-paint-brush"></i>
                        <div class="ps-3">
                            <h6 class="mt-n1 mb-0">Semir Rambut</h6>
                        </div>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                        <i class="fa fa-utensils fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Lovely</small>
                            <h6 class="mt-n1 mb-0">Dinner</h6>
                        </div>
                    </a>
                </li> --}}
            </ul>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="max-w-7xl mx-auto py-10 px-4">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                            @forelse($styles as $style)
                                <div class="col">
                                    <div class="card h-100 shadow-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalStyle{{ $style->id }}">
                                        <img src="{{ asset('storage/' . $style->foto) }}" class="card-img-top"
                                            alt="{{ $style->nama_style }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $style->nama_style }}</h5>
                                            <p class="card-text text-truncate">{{ Str::limit($style->deskripsi, 60) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="modalStyle{{ $style->id }}" tabindex="-1"
                                    aria-labelledby="styleLabel{{ $style->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="styleLabel{{ $style->id }}">
                                                    {{ $style->nama_style }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('storage/' . $style->foto) }}"
                                                    class="img-fluid rounded mb-3" alt="{{ $style->nama_style }}">
                                                <p>{{ $style->deskripsi }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <!-- Bisa tambahkan tombol WhatsApp atau Pesan -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-muted">Belum ada style rambut tersedia.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="max-w-7xl mx-auto py-10 px-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @forelse($semirs as $semir)
                                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-4">
                                    <img src="{{ asset('storage/' . $semir->foto) }}" alt="{{ $semir->nama_style }}"
                                        class="w-full h-36 object-cover rounded-md mb-3">
                                    <h2 class="text-lg font-semibold">{{ $semir->nama_semir }}</h2>
                                    <p class="text-sm text-gray-600">{{ $semir->deskripsi }}</p>
                                </div>
                            @empty
                                <p class="col-span-4 text-center text-gray-500">Belum ada semir tersedia.</p>
                            @endforelse
                        </div>
                    </div>
                </div> --}}

                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="max-w-7xl mx-auto py-10 px-4">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                            @forelse($semirs as $semir)
                                <div class="col">
                                    <div class="card h-100 shadow-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalSemir{{ $semir->id }}">
                                        <img src="{{ asset('storage/' . $semir->foto) }}" class="card-img-top"
                                            alt="{{ $semir->nama_semir }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $semir->nama_semir }}</h5>
                                            <p class="card-text text-truncate">{{ Str::limit($semir->deskripsi, 60) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="modalSemir{{ $semir->id }}" tabindex="-1"
                                    aria-labelledby="semirLabel{{ $semir->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="semirLabel{{ $semir->id }}">
                                                    {{ $semir->nama_semir }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Tutup"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ asset('storage/' . $semir->foto) }}"
                                                    class="img-fluid rounded mb-3" alt="{{ $semir->nama_semir }}">
                                                <p>{{ $semir->deskripsi }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center text-muted">Belum ada semir tersedia.</p>
                            @endforelse
                        </div>
                    </div>
                </div>


                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="max-w-7xl mx-auto py-10 px-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @forelse($styles as $style)
                                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-4">
                                    <img src="{{ asset('storage/' . $style->foto) }}" alt="{{ $style->nama_style }}"
                                        class="w-full h-36 object-cover rounded-md mb-3">
                                    <h2 class="text-lg font-semibold">{{ $style->nama_style }}</h2>
                                    <p class="text-sm text-gray-600">{{ $style->deskripsi }}</p>
                                </div>
                            @empty
                                <p class="col-span-4 text-center text-gray-500">Belum ada style rambut tersedia.
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->
