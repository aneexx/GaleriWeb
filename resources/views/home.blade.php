@extends('layouts.master')
@section('content2')
<div class="untree_co-section pb-0" id="home-section">
  <div class="container">
      <h1 class="heading gsap-reveal-hero mb-5">
          Hai!
          <strong>{{ $user->name }}<span class="text-primary">.</span></strong>
      </h1>
      <h2 class="subheading gsap-reveal-hero mb-4">
          Menyediakan galeri foto yang praktis untuk anda
          Tidak memakan penyimpanan Handphone anda.
      </h2>
      <p class="gsap-reveal-hero">
          <button
              class="btn btn-black"
              data-bs-toggle="modal"
              data-bs-target="#signup-modal"
              >Tambah Foto ke Galeri</button
          >
      </p>
      <!-- tambah foto modal content -->
      <div
      id="signup-modal"
      class="modal fade"
      tabindex="-1"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog modal-lg" style="height: 450px">
        <div class="modal-content">
          <div class="modal-body">
            <div class="text-center mt-2 mb-4">
              <a href="index-2.html" class="text-success">
                <span>
                  <img
                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
                    class="me-3" width="80"
                    alt=""
                  />
                </span>
              </a>
            </div>

            <form class="ps-3 pr-3" method="POST" enctype="multipart/form-data" action="{{ route('foto.store') }}">
              @csrf
              <div class="mb-3">
                <label for="username">Judul</label>
                <input
                  class="form-control"
                  type="text"
                  id="judul"
                  name="judul"
                  required=""
                  placeholder="Fotoku"
                />
              </div>

              <div class="mb-3">
                <label for="username">Deskripsi</label>
                <input
                  class="form-control"
                  type="text"
                  id="deskripsi"
                  name="deskripsi"
                  required=""
                  placeholder="Deskripsi"
                />
              </div>

              <div class="mb-3">
                <label for="foto"
                  >Foto Anda</label
                >
                <input
                  class="form-control"
                  type="file"
                  name="foto"
                />
              </div>
              {{-- <div class="mb-3">
                <div class="form-check">
                  <input
                    type="checkbox"
                    class="form-check-input"
                    id="customCheck1"
                  />
                  <label
                    class="form-check-label"
                    for="customCheck1"
                    >I accept
                    <a href="#"
                      >Terms and Conditions</a
                    ></label
                  >
                </div>
              </div> --}}

              <div class="mb-3 text-center">
                <button
                  class="btn btn-black font-medium"
                  type="submit"
                >
                  Upload Foto
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </div>
</div>
@endsection
@section('content')
@forelse ($foto as $item)
    <div class="item web branding col-sm-6 col-md-6 col-lg-4 isotope-mb-2">
        <a href="{{ route('detail-foto', $item->slug) }}" class="portfolio-item isotope-item gsap-reveal-img">
          <div class="overlay">
              <span class="wrap-icon icon-link2"></span>
              <div class="portfolio-item-content">
                  <h3>{{ $item->judul }}</h3>
                  <p>{{ $item->user->name }}</p>
              </div>
          </div>
          <img src="{{ asset('storage/' . $item->foto) }}" class="lazyload img-fluid" alt="Images" />
      </a>
    </div>
    @empty
        <h3 class="gsap-reveal-hero">Tidak Ada Data</h3>
    @endforelse
@endsection
