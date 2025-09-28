<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.head')

<body class="index-page">

    @include('frontend.layouts.menu')


    @include('frontend.layouts.slider')

    <!-- Featured Services Section -->
    @include('frontend.layouts.feature')


    <!-- About Section -->
    @include('frontend.layouts.about')


    <!-- Stats Section -->
    @include('frontend.layouts.stats')


    <!-- Services Section -->
    @include('frontend.layouts.service')


    <!-- Portfolio Section -->
    @include('frontend.layouts.portfolio')


    <!-- Testimonials Section -->
    @include('frontend.layouts.testimonial')


    <!-- Call To Action Section -->
    @include('frontend.layouts.callaction')


    <!-- Contact Section -->
    @include('frontend.layouts.contact')

    <!-- Footer Section -->
    @include('frontend.layouts.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">

    <!-- Main JS File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>
