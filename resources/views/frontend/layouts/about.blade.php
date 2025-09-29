<section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <span>About Us<br></span>
        <h2>About</h2>
    </div><!-- End Section Title -->

    @php
        // Get the latest about entry
        $about = \App\Models\About::latest()->first();
    @endphp

    @if ($about)
        <div class="container">
            <div class="row gy-4">
                <!-- Left Image Column -->
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    @if ($about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" class="img-fluid" alt="{{ $about->title }}">
                    @else
                        <img src="{{ asset('frontend/assets/img/about.png') }}" class="img-fluid" alt="About Image">
                    @endif
                </div>

                <!-- Right Content Column -->
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>{{ $about->title }}</h3>
                    <p class="fst-italic">{{ $about->text }}</p>

                    @if (!empty($about->extra_text))
                        <p>{{ $about->extra_text }}</p>
                    @endif
                </div>
            </div>
        </div>
    @endif

</section>
