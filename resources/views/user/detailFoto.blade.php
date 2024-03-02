@extends('layouts.app')
@section('content')
{{-- <div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Post Detail</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                href="#">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Post Detail</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="card rounded-2 overflow-hidden" style="margin-top: 10%">
    <div class="position-relative">
        <img src="{{ asset('storage/' . $detail->foto) }}" class="lazyload img-fluid d-block w-100" alt="Images" />
    </div>
    <div class="card-body p-4">
        <h2 class="fs-9 fw-semibold my-4">{{ $detail->judul }}</h2>
        <div class="d-flex align-items-center gap-4">
            <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>0</div>
            <div class="d-flex align-items-center gap-2 heart-icon" onclick="toggleHeart(this)">
                <i class="fas fa-heart fs-5" id="likeIcon"></i>
                <span id="like-count">{{ $jumlahLike }}</span>
            </div>
            <div class="d-flex align-items-center gap-2"><i class="ti ti-share-2 text-dark fs-5"></i>3</div>
            <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Senin, Dec 23</div>
        </div>
    </div>

    <div class="card-body border-top p-4">
        {{-- <h2 class="fs-8 fw-semibold mb-3">Title of the paragraph</h2> --}}
        <p class="mb-3">
            Deskripsi
        </p>
        <p class="mb-3">
            {{ $detail->deskripsi }}
        </p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="mb-4 fw-semibold">Komentar</h4>
        <form id="comment-form">
            <textarea id="comment-content" class="form-control mb-4" rows="5"></textarea>
            <button id="submit-comment" class="btn btn-dark">Kirim Komentar</button>
            <div id="loading-spinner" class="spinner-border text-primary" role="status" style="display: none;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </form>
        <div class="d-flex align-items-center gap-3 mb-4 mt-7 pt-8">
            <h4 class="mb-0 fw-semibold">Comments</h4>
            <span id="comment-count"
                class="badge bg-light-primary text-primary fs-4 fw-semibold px-6 py-8 rounded">0</span>
        </div>
        <div class="position-relative">
                <div id="comments-container"></div>
            {{-- <div class="p-4 rounded-2 bg-light mb-3 ms-7">
                <div class="d-flex align-items-center gap-3">
                    <img src="../../dist/images/profile/user-3.jpg" alt="" class="rounded-circle"
                        width="40" height="40">
                    <h6 class="fw-semibold mb-0 fs-4">Irene Hanson</h6>
                    <span class="p-1 bg-light-dark rounded-circle d-inline-block"></span>
                </div>
                <p class="my-3">Uborofgic be rof lom sedge vapozi ohoinu nutremcuc ro ko atmeg anrov git ve
                    vuj ki teb or.
                    Lohi hafa faddegon horoz ebema kew idful ducam nev rol iga wikkobsu sucdu gud.
                </p>
            </div> --}}
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">Mengapa Anda melaporkan komentar ini?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">Spam Komentar</label>
                </div>
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">Penindasan atau pelecehan</label>
                </div>
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                    <label class="form-check-label" for="inlineCheckbox3">Perkataan atau simbol kebencian</label>
                </div>
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                    <label class="form-check-label" for="inlineCheckbox4">Informasi Palsu</label>
                </div>
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option5">
                    <label class="form-check-label" for="inlineCheckbox5">Aku hanya tidak menyukainya</label>
                </div>
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option6">
                    <label class="form-check-label" for="inlineCheckbox6">Ketelanjangan atau pornografi</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Laporkan</button>
            </div>
        </div>
    </div>
</div>

<!--  Shopping Cart -->
<div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header py-4">
        <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
    </div>
    <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
        <ul class="mb-0">
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="../../dist/images/products/product-1.jpg" width="95" height="75"
                        class="rounded-1 me-9 flex-shrink-0" alt="" />
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                    type="button" id="add1"> - </button>
                                <input type="text"
                                    class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                    placeholder="" aria-label="Example text with button addon"
                                    aria-describedby="add1" value="1" />
                                <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                    type="button" id="addo2"> + </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="../../dist/images/products/product-2.jpg" width="95" height="75"
                        class="rounded-1 me-9 flex-shrink-0" alt="" />
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                    type="button" id="add2"> - </button>
                                <input type="text"
                                    class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                    placeholder="" aria-label="Example text with button addon"
                                    aria-describedby="add2" value="1" />
                                <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                    type="button" id="addon34"> + </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <img src="../../dist/images/products/product-3.jpg" width="95" height="75"
                        class="rounded-1 me-9 flex-shrink-0" alt="" />
                    <div>
                        <h6 class="mb-1">Supreme toys cooker</h6>
                        <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                    type="button" id="add3"> - </button>
                                <input type="text"
                                    class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                    placeholder="" aria-label="Example text with button addon"
                                    aria-describedby="add3" value="1" />
                                <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                    type="button" id="addon3"> + </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="align-bottom">
            <div class="d-flex align-items-center pb-7">
                <span class="text-dark fs-3">Sub Total</span>
                <div class="ms-auto">
                    <span class="text-dark fw-semibold fs-3">$2530</span>
                </div>
            </div>
            <div class="d-flex align-items-center pb-7">
                <span class="text-dark fs-3">Total</span>
                <div class="ms-auto">
                    <span class="text-dark fw-semibold fs-3">$6830</span>
                </div>
            </div>
            <a href="eco-checkout.html" class="btn btn-outline-primary w-100">Go to shopping cart</a>
        </div>
    </div>
</div>
<!--  Mobilenavbar -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <nav class="sidebar-nav scroll-sidebar">
        <div class="offcanvas-header justify-content-between">
            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
                alt="" class="img-fluid">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar="" data-simplebar>
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span>
                            <i class="ti ti-apps"></i>
                        </span>
                        <span class="hide-menu">Apps</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level my-3">
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-chat.svg"
                                        alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">New messages arrived</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-invoice.svg"
                                        alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">Get latest invoice</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-mobile.svg"
                                        alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">2 Unsaved Contacts</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-message-box.svg"
                                        alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Email App</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">Get new emails</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-cart.svg"
                                        alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">learn more information</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-date.svg"
                                        alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">Get dates</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-lifebuoy.svg"
                                        alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">Add new contact</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item py-2">
                            <a href="#" class="d-flex align-items-center">
                                <div
                                    class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-application.svg"
                                        alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                    <h6 class="mb-1 bg-hover-primary">Notes Application</h6>
                                    <span class="fs-2 d-block fw-normal text-muted">To-do and Daily tasks</span>
                                </div>
                            </a>
                        </li>
                        <ul class="px-8 mt-7 mb-4">
                            <li class="sidebar-item mb-3">
                                <h5 class="fs-5 fw-semibold">Quick Links</h5>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">Pricing Page</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">Authentication Design</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">Register Now</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">404 Error Page</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">Notes App</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">User Application</a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a class="fw-semibold text-dark" href="#">Account Settings</a>
                            </li>
                        </ul>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="app-chat.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-message-dots"></i>
                        </span>
                        <span class="hide-menu">Chat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="app-calendar.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar"></i>
                        </span>
                        <span class="hide-menu">Calendar</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="app-email.html" aria-expanded="false">
                        <span>
                            <i class="ti ti-mail"></i>
                        </span>
                        <span class="hide-menu">Email</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!--  Search Bar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-1">
            <div class="modal-header border-bottom">
                <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
                <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
                    <i class="ti ti-x fs-5 ms-3"></i>
                </span>
            </div>
            <div class="modal-body message-body" data-simplebar="">
                <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                <ul class="list mb-0 py-2">
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Modern</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                            <span class="fs-3 text-muted d-block">/apps/contacts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Posts</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Detail</span>
                            <span
                                class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Shop</span>
                            <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Modern</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                            <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                            <span class="fs-3 text-muted d-block">/apps/contacts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Posts</span>
                            <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Detail</span>
                            <span
                                class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                        </a>
                    </li>
                    <li class="p-1 mb-1 bg-hover-light-black">
                        <a href="#">
                            <span class="fs-3 text-black fw-normal d-block">Shop</span>
                            <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function toggleHeart(element) {
        const likeCountElement = document.getElementById('like-count');
        const isLiked = element.classList.toggle('liked');
        const likeIcon = $('#likeIcon');
        const likeCount = parseInt(likeCountElement.innerText);
        

        const hasLiked = isLiked ? 1 : 0;

        likeCountElement.innerText = isLiked ? likeCount + 1 : likeCount - 1;

        fetch('/like-foto', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                photo_id: '{{ $detail->id }}',
                has_liked: hasLiked,
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Like action successful:', data);
            if (hasLiked) {
                likeIcon.style.color = 'red';
                element.style.color = 'red';
            } else {
                element.style.color = '';
            }
        })
        .catch(error => {
            console.error('Error during like action:', error);
        });
    }
</script>
<script>
    var activeUserId;


    function showToastError(message) {
        toastr.error(message);
    }

    var userCommentCount = parseInt(sessionStorage.getItem('userCommentCount')) || 0;

    $(document).ready(function() {
        var commentForm = $('#comment-form');
        var commentContent = $('#comment-content');
        var submitButton = $('#submit-comment');
        var loadingSpinner = $('#loading-spinner');

        commentForm.submit(function(e) {
            e.preventDefault();

            if (userCommentCount >= 30) {
                showToastError('Anda telah mencapai batas maksimal komentar (30 kali).');
                return;
            }

            var commentText = commentContent.val().trim();
            if (commentText === '') {
                Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        showConfirmButton: false,
                        timer: 3000,
                        text: 'Kamu belum mengetik komentar!',
                    });
                return;
            }

            var photoId = {{ $detail->id }};
            console.log('id:', photoId);
            loadingSpinner.show();
            submitButton.hide();

            $.ajax({
                type: 'POST',
                url: '/comments',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'content': commentText,
                    'photo_id': photoId,
                },
                    success: function(data) {
                    loadingSpinner.hide();
                    submitButton.show();

                    commentContent.val('');

                    getComments(photoId);

                    userCommentCount++;
                    sessionStorage.setItem('userCommentCount', userCommentCount.toString());

                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        showConfirmButton: false,
                        timer: 3000,
                        text: 'Komentar berhasil dikirim',
                    });
                    console.log('data', data.comment);
                },
                error: function(error) {
                    loadingSpinner.hide();
                    submitButton.show();

                    console.log('Error:', error);
                }
            });
        });

        function addNewCommentToView(content) {
            var commentHtml = `
                <div class="p-4 rounded-2 bg-light mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <h6 class="fw-semibold mb-0 fs-4">You</h6>
                    </div>
                    <p class="my-3">${content}</p>
                </div>
            `;
            $('#comments-container').prepend(commentHtml);
        }

        getActiveUserId();

        function getActiveUserId() {
            $.ajax({
                type: 'GET',
                url: '/get-active-user-id',
                success: function(response) {
                    activeUserId = response.activeUserId;
                    getComments();
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

            function getComments(photoId) {
            $.ajax({
                type: 'GET',
                url: `/get-comments/${photoId}`,
                data: { photo_id: photoId },
                cache: false,
                success: function(response) {
                    updateView(response.comments);
                    console.log('idFoto:', photoId);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        function updateView(comments) {
            $('#comments-container').empty();


            comments.forEach(function(comment) {

                var deleteOption = (comment.user.id === activeUserId) ?
                    `<li>
                    <a class="dropdown-item delete-comment" href="#" data-comment-id="${comment.id}">
                        <i class="ti ti-trash text-muted me-1 fs-4"></i>Hapus
                    </a>
                </li>` :
                    '';

                var reportOption = `
                <li>
                    <a class="dropdown-item report-comment" href="#" data-comment-id="${comment.id}">
                        <i class="fas fa-flag text-muted me-1 fs-4"></i>Report
                    </a>
                </li>`;

                var commentHtml = `
            <div class="p-4 rounded-2 bg-light mb-3" id="comment-${comment.id}">
                <div class="d-flex align-items-center gap-3">
                    <h6 class="fw-semibold mb-0 fs-4">${comment.user.name}</h6>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a class="" href="javascript:void(0)" id="m1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots-vertical fs-4"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="m1">
                            ${deleteOption}
                            ${reportOption}
                        </ul>
                      </div>
                    </div>
                </div>
                <p class="my-3">${comment.content}</p>
            </div>
        `;
                $('#comments-container').prepend(commentHtml);
            });

            $('.report-comment').on('click', function(e) {
                e.preventDefault();
                var commentId = $(this).data('comment-id');
                $('#reportModal').modal('show');
                $('#reportModal').data('comment-id', commentId);
            });

            setCommentCount(comments.length);

            $('.delete-comment').on('click', function(e) {
                e.preventDefault();
                var commentId = $(this).data('comment-id');
                deleteComment(commentId);
            });

        }

        function deleteComment(commentId) {
            $.ajax({
                type: 'DELETE',
                url: `/comments/${commentId}`,
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    $(`#comment-${commentId}`).remove();
                    setCommentCount(response.commentCount);
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        showConfirmButton: false,
                        timer: 3000,
                        text: 'Komentar berhasil dihapus',
                    });
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        function setCommentCount(count) {
            $('#comment-count').text(count);
        }

        getComments(photoId);
    });
</script>
@endsection