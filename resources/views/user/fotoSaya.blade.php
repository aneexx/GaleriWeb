@extends('layouts.master')
@section('content')
<div id="gallery" class="row">
    @forelse ($foto as $item)
        <div class="item web branding col-sm-6 col-md-6 col-lg-4 isotope-mb-2">
            <a href="{{ route('foto.edit', $item->slug) }}" class="portfolio-item isotope-item gsap-reveal-img">
                <div class="overlay">
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
</div>
@endsection
