<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Blog</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    @php
        use App\Models\Setting;
        $setting = Setting::where('Is_deleted', 0)
            ->orderBy('id', 'desc')
            ->take(1)
            ->get();

    @endphp
    @foreach ($setting as $item)
        <link href="{{ $item->getFavaicon() }}" rel="icon">
    @endforeach

    <link href="{{ url('./assets_frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('./assets_frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('./assets_frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('./assets_frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('./assets_frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('./assets_frontend/vendor/glightbox/css/glightbox.min.css') }}">
    <link href="{{ url('./assets_frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ url('./assets_frontend/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('./assets_frontend/css/main.css') }}" rel="stylesheet">

<body data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="0">
    <!-- ======= Header ======= -->
    @include('home_master.layouts.navbar')
    <!-- End Header -->
    <div class="content">
        <main id="main">
            @include('home_master.layouts.hero')
            @include('home_master.Price.price')
            <!-- ======= Content Section ======= -->
            <section id="service-details" class="service-details" style="padding: 15px 0 ">
                <div class="container ">
                    <div class="row gy-4" data-aos="fade-up">
                        <div class="col-lg-8">
                            @yield('content')
                        </div>
                        <div class="col-lg-4" data-aos="fade-up">
                            <h3
                                style="font-size: 20px;
                      color: #007B5F;
                      background: #f1be48;
                      padding: 13px 10px;
                      margin-bottom: 25px;
                      font-family: Khmer OS Siemreap;">
                                ក្រាហ្វិកតម្លៃប្រេងឆៅ</h3>
                            @include('home_master.layouts.aside.promotional')
                            @include('home_master.layouts.aside.promotional_center')
                            @include('home_master.layouts.aside.promotional_buttom')
                        </div>
                    </div>
                </div>
            </section>
        </main>
        @include('home_master.layouts.footer')
        <!-- End Footer -->
    </div>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
    <script src="{{ url('./assets_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('./assets_frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ url('./assets_frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('./assets_frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('./assets_frontend/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('./assets_frontend/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ url('./assets_frontend/js/main.js') }}"></script>

    <script type="text/javascript" class="flasher-js">
        (function() {
            var rootScript = 'https://cdn.jsdelivr.net/npm/@flasher/flasher@1.3.1/dist/flasher.min.js';
            var FLASHER_FLASH_BAG_PLACE_HOLDER = {};
            var options = mergeOptions([], FLASHER_FLASH_BAG_PLACE_HOLDER);

            function mergeOptions(first, second) {
                return {
                    context: merge(first.context || {}, second.context || {}),
                    envelopes: merge(first.envelopes || [], second.envelopes || []),
                    options: merge(first.options || {}, second.options || {}),
                    scripts: merge(first.scripts || [], second.scripts || []),
                    styles: merge(first.styles || [], second.styles || []),
                };
            }

            function merge(first, second) {
                if (Array.isArray(first) && Array.isArray(second)) {
                    return first.concat(second).filter(function(item, index, array) {
                        return array.indexOf(item) === index;
                    });
                }

                return Object.assign({}, first, second);
            }

            function renderOptions(options) {
                if (!window.hasOwnProperty('flasher')) {
                    console.error('Flasher is not loaded');
                    return;
                }

                requestAnimationFrame(function() {
                    window.flasher.render(options);
                });
            }

            function render(options) {
                if ('loading' !== document.readyState) {
                    renderOptions(options);

                    return;
                }

                document.addEventListener('DOMContentLoaded', function() {
                    renderOptions(options);
                });
            }

            if (1 === document.querySelectorAll('script.flasher-js').length) {
                document.addEventListener('flasher:render', function(event) {
                    render(event.detail);
                });
            }

            if (window.hasOwnProperty('flasher') || !rootScript || document.querySelector('script[src="' + rootScript +
                    '"]')) {
                render(options);
            } else {
                var tag = document.createElement('script');
                tag.setAttribute('src', rootScript);
                tag.setAttribute('type', 'text/javascript');
                tag.onload = function() {
                    render(options);
                };

                document.head.appendChild(tag);
            }
        })();
    </script>



</body>

</html>
