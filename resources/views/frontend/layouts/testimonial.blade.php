<section id="testimonials" class="testimonials section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <span>Testimonials</span>
        <h2>Testimonials</h2>
        <p>What our clients say about our services and products</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        {{-- Get testimonials from database --}}
        @php
            $testimonials = \App\Models\Testimonial::latest()->take(6)->get();
        @endphp

        @if ($testimonials->count() > 0)
            <div class="swiper init-swiper" data-speed="600" data-delay="5000"
                data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 20 } }">

                <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                    },
                    "1200": {
                      "slidesPerView": 3,
                      "spaceBetween": 20
                    }
                  }
                }
                </script>

                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>{{ $testimonial->description }}</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>

                                @if ($testimonial->image)
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" class="testimonial-img"
                                        alt="{{ $testimonial->name }}">
                                @else
                                    <img src="{{ asset('frontend/assets/img/testimonials/default-avatar.jpg') }}"
                                        class="testimonial-img" alt="Default Avatar">
                                @endif

                                <h3>{{ $testimonial->name ?? 'Anonymous' }}</h3>
                                <h4>{{ $testimonial->title ?? 'Client' }}</h4>
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>
            </div>
        @else
            {{-- Fallback static testimonials --}}
            <div class="swiper init-swiper" data-speed="600" data-delay="5000">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Great service and amazing support team!</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('frontend/assets/img/testimonials/default-avatar.jpg') }}"
                                class="testimonial-img" alt="Default Avatar">
                            <h3>John Doe</h3>
                            <h4>Client</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Very professional and delivered on time!</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <img src="{{ asset('frontend/assets/img/testimonials/default-avatar.jpg') }}"
                                class="testimonial-img" alt="Default Avatar">
                            <h3>Jane Smith</h3>
                            <h4>Business Owner</h4>
                        </div>
                    </div><!-- End testimonial item -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        @endif

    </div>

</section>
