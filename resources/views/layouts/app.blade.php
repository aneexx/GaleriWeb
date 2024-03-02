<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from preview.colorlib.com/theme/space/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Feb 2024 13:13:36 GMT -->
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content />
        <meta name="keywords" content />
        <link
            href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&amp;family=Roboto+Mono:wght@400;500;700&amp;display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="{{ asset('template/space/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/space/css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/space/css/owl.theme.default.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/space/css/jquery.fancybox.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/space/fonts/icomoon/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/space/fonts/flaticon/font/flaticon.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/space/css/aos.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/space/css/style.css') }}" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/viewerjs@1.7.0/dist/viewer.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.7.0/viewer.min.js"></script>



        {{-- TEMPLATE MODERNIZE --}}
        <!-- Owl Carousel  -->
        <link rel="stylesheet" href="{{ asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">

        <!-- Core Css -->
        <link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
        {{-- END TEMPLATE MODERNIZE --}}

        <title>Hallo kamu!!</title>
        <script nonce="10da1243-070c-4d00-9762-8be3ed9c3756">
            try {
                (function (w, d) {
                    !(function (j, k, l, m) {
                        j[l] = j[l] || {};
                        j[l].executed = [];
                        j.zaraz = { deferred: [], listeners: [] };
                        j.zaraz.q = [];
                        j.zaraz._f = function (n) {
                            return async function () {
                                var o = Array.prototype.slice.call(arguments);
                                j.zaraz.q.push({ m: n, a: o });
                            };
                        };
                        for (const p of ["track", "set", "debug"])
                            j.zaraz[p] = j.zaraz._f(p);
                        j.zaraz.init = () => {
                            var q = k.getElementsByTagName(m)[0],
                                r = k.createElement(m),
                                s = k.getElementsByTagName("title")[0];
                            s &&
                                (j[l].t =
                                    k.getElementsByTagName("title")[0].text);
                            j[l].x = Math.random();
                            j[l].w = j.screen.width;
                            j[l].h = j.screen.height;
                            j[l].j = j.innerHeight;
                            j[l].e = j.innerWidth;
                            j[l].l = j.location.href;
                            j[l].r = k.referrer;
                            j[l].k = j.screen.colorDepth;
                            j[l].n = k.characterSet;
                            j[l].o = new Date().getTimezoneOffset();
                            if (j.dataLayer)
                                for (const w of Object.entries(
                                    Object.entries(dataLayer).reduce(
                                        (x, y) => ({ ...x[1], ...y[1] }),
                                        {}
                                    )
                                ))
                                    zaraz.set(w[0], w[1], { scope: "page" });
                            j[l].q = [];
                            for (; j.zaraz.q.length; ) {
                                const z = j.zaraz.q.shift();
                                j[l].q.push(z);
                            }
                            r.defer = !0;
                            for (const A of [localStorage, sessionStorage])
                                Object.keys(A || {})
                                    .filter((C) => C.startsWith("_zaraz_"))
                                    .forEach((B) => {
                                        try {
                                            j[l]["z_" + B.slice(7)] =
                                                JSON.parse(A.getItem(B));
                                        } catch {
                                            j[l]["z_" + B.slice(7)] =
                                                A.getItem(B);
                                        }
                                    });
                            r.referrerPolicy = "origin";
                            r.src =
                                "../../cdn-cgi/zaraz/sd0d9.js?z=" +
                                btoa(encodeURIComponent(JSON.stringify(j[l])));
                            q.parentNode.insertBefore(r, q);
                        };
                        ["complete", "interactive"].includes(k.readyState)
                            ? zaraz.init()
                            : j.addEventListener(
                                  "DOMContentLoaded",
                                  zaraz.init
                              );
                    })(w, d, "zarazData", "script");
                })(window, document);
            } catch (e) {
                throw (fetch("/cdn-cgi/zaraz/t"), e);
            }
        </script>
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="100">
        @if (session('success'))
        <script>
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            showConfirmButton: false,
            timer: 3000,
            text: '{{ session('success') }}',
          });
        </script>
      @endif

      @if (session('error'))
        <script>
          Swal.fire({
            icon: 'error',
            title: 'Error',
            showConfirmButton: false,
            timer: 3000,
            text: '{{ session('error') }}',
          });
        </script>
      @endif

      @if (session('info'))
        <script>
          Swal.fire({
            icon: 'info',
            title: 'Informasi',
            showConfirmButton: false,
            timer: 3000,
            text: '{{ session('info') }}',
          });
        </script>
      @endif
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close">
                    <span class="icofont-close js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <nav class="site-nav dark mb-5 site-navbar-target">
            <div class="container">
                <div class="site-navigation">
                    <a href="index-2.html" class="logo m-0"
                        >GaleriKu<span class="text-primary">.</span></a
                    >
                    <ul
                        class="js-clone-nav d-none d-lg-inline-none site-menu float-right site-nav-wrap"
                    >
                        <li>
                            <a href="#home-section" class="nav-link active"
                                >Home</a
                            >
                        </li>
                        {{-- <li class="has-children">
                            <a href="#about-section" class="nav-link">About</a>
                            <ul class="dropdown">
                                <li>
                                    <a href="elements.html" class="nav-link"
                                        >Elements</a
                                    >
                                </li>
                                <li class="has-children">
                                    <a href="#">Menu Two</a>
                                    <ul class="dropdown">
                                        <li>
                                            <a href="#" class="nav-link"
                                                >Sub Menu One</a
                                            >
                                        </li>
                                        <li>
                                            <a href="#" class="nav-link"
                                                >Sub Menu Two</a
                                            >
                                        </li>
                                        <li>
                                            <a href="#" class="nav-link"
                                                >Sub Menu Three</a
                                            >
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="nav-link">Menu Three</a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                    <a
                        href="#"
                        class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-inline-block"
                        data-toggle="collapse"
                        data-target="#main-navbar"
                    >
                        <span></span>
                    </a>
                </div>
            </div>
        </nav>
            <div class="container">
                <div class="relative">
                    <div class="loader-portfolio-wrap">
                        <div class="loader-portfolio"></div>
                    </div>
                </div>
                <div id="portfolio-single-holder">
                  <div class="portfolio-wrapper">
                    <div id="posts" class="row">
                      @yield('content')
                    </div>
                  </div>
                </div>
            </div>
        </div>
            </div>
        </div>
        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <script src="{{ asset('template/space/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('template/space/js/popper.min.js') }}"></script>
        <script src="{{ asset('template/space/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('template/space/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('template/space/js/jquery.animateNumber.min.js') }}"></script>
        <script src="{{ asset('template/space/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('template/space/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('template/space/js/aos.js') }}"></script>
        <script src="{{ asset('template/space/js/wave-animate.js') }}"></script>
        <script src="{{ asset('template/space/js/circle-progress.js') }}"></script>
        <script src="{{ asset('template/space/js/imagesloaded.pkgd.js') }}"></script>
        <script src="{{ asset('template/space/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('template/space/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('template/space/js/TweenMax.min.js') }}"></script>
        <script src="{{ asset('template/space/js/ScrollMagic.min.js') }}"></script>
        <script src="{{ asset('template/space/js/scrollmagic.animation.gsap.min.js') }}"></script>
        <script src="{{ asset('template/space/js/custom.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- TEMPLATE MODERNIZE --}}
        <!--  Import Js Files -->
        <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        {{-- END TEMPLATE MODERNIZE --}}

        <script
            async
            src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
        ></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "UA-23581568-13");
        </script>
        <script
            defer
            src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
            integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
            data-cf-beacon='{"rayId":"85977cbe5fc0df87","b":1,"version":"2024.2.1","token":"cd0b4b3a733644fc843ef0b185f98241"}'
            crossorigin="anonymous"
        ></script>
    </body>

    <!-- Mirrored from preview.colorlib.com/theme/space/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Feb 2024 13:13:56 GMT -->
</html>
