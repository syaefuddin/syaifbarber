<!-- Team Start -->
<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Daftar Tim</h5>
            <h1 class="mb-5">Karyawan</h1>
        </div>
        <div class="row g-4">
            @foreach ($karyawan as $user)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <div class="rounded-circle overflow-hidden m-4"
                            style="width: 200px; height: 200px; margin: auto;">
                            <img class="img-fluid w-100 h-100 object-fit-cover"
                                src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->name }}">
                        </div>
                        <h5 class="mb-0">{{ $user->name }}</h5>
                        <small>{{ ucfirst($user->role) }}</small>
                        <div class="d-flex justify-content-center mt-3">
                            @if ($user->facebook)
                                <a class="btn btn-square btn-primary mx-1" href="{{ $user->facebook }}" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif

                            @if ($user->instagram)
                                <a class="btn btn-square btn-danger mx-1" href="{{ $user->instagram }}" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif

                            @if ($user->whatsapp)
                                <a class="btn btn-square btn-success mx-1" href="https://wa.me/{{ $user->whatsapp }}"
                                    target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->
