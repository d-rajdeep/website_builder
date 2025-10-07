<section id="hero" class="hero section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
                @php
                    $slider = \App\Models\Slider::latest()->first();
                @endphp

                <h1>{{ $slider->title ?? 'Elegant and creative solutions' }}</h1>
                <p>{{ $slider->text ?? 'We are team of talented designers making websites with Bootstrap' }}</p>

                <div class="d-flex">
                    <a href="#about" class="btn-get-started">Get Started</a>
                    {{-- <a href="#contact" class="btn-warning-get-started ms-4">Contact Us</a> --}}
                </div>
            </div>

            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
                @if ($slider && $slider->image)
                    <img src="{{ asset('storage/' . $slider->image) }}" class="img-fluid animated" alt="Hero Image">
                @else
                    <img src="{{ asset('frontend/assets/img/hero-img.png') }}" class="img-fluid animated"
                        alt="Hero Image">
                @endif
            </div>
        </div>
    </div>
    <style>
        .btn-warning-get-started {
            display: inline-block;
            padding: 10px 25px;
            background-color: #f0ad4e;
            /* orange/yellow */
            color: #fff;
            font-weight: 400;
            text-decoration: none;
            border-radius: 50px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-warning-get-started:hover {
            background-color: #ec971f;
            /* darker shade on hover */
            transform: translateY(-2px);
        }
    </style>
</section>
