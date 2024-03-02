@extends('layouts.master')
@section('content')
<div id="gallery" class="row">
    @forelse ($foto as $item)
        <div class="item web branding col-sm-6 col-md-6 col-lg-4 isotope-mb-2">
            <a href="{{ asset('storage/' . $item->foto) }}" data-title="{{ $item->judul }}" data-author="{{ $item->user->name }}" class="portfolio-item isotope-item gsap-reveal-img">
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
</div>

<script>
    var gallery = document.getElementById('gallery');
    var viewer = new Viewer(gallery, {
        toolbar: {
            oneToOne: true,
            prev: true,
            play: true,
            next: true,
            rotateLeft: true,
            rotateRight: true,
            flipHorizontal: true,
            flipVertical: true,
        },
    });

    gallery.addEventListener('click', function(event) {
        var target = event.target;
        if (target.tagName === 'IMG') {
            event.preventDefault();
            viewer.show(target);
        }
    });
</script>
@endsection
