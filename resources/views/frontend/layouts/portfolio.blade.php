<section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <span>Portfolio</span>
        <h2>Portfolio</h2>
        <p>Check out some of our recent works</p>
    </div><!-- End Section Title -->

    <div class="container">
        @php
            $portfolios = \App\Models\Portfolio::take(6)->get();
        @endphp

        <div class="row gy-4">
            @forelse ($portfolios as $index => $portfolio)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="portfolio-item position-relative">
                        <img src="{{ asset('storage/' . $portfolio->image) }}" class="img-fluid"
                            alt="{{ $portfolio->title }}">
                        <div class="portfolio-info">
                            <h4>{{ $portfolio->title }}</h4>
                            <p>{{ $portfolio->short_text }}</p>

                            <a href="{{ asset('storage/' . $portfolio->image) }}" class="glightbox preview-link"
                                data-gallery="portfolio-gallery" title="{{ $portfolio->title }}">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div><!-- End Portfolio Item -->
            @empty
                <!-- Static fallback when no portfolio items in DB -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="portfolio-item position-relative">
                        <img src="{{ asset('frontend/assets/img/portfolio/app-1.jpg') }}" class="img-fluid"
                            alt="App 1">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{ asset('frontend/assets/img/portfolio/app-1.jpg') }}" title="App 1"
                                class="glightbox preview-link" data-gallery="portfolio-gallery">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="portfolio-item position-relative">
                        <img src="{{ asset('frontend/assets/img/portfolio/product-1.jpg') }}" class="img-fluid"
                            alt="Product 1">
                        <div class="portfolio-info">
                            <h4>Product 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{ asset('frontend/assets/img/portfolio/product-1.jpg') }}" title="Product 1"
                                class="glightbox preview-link" data-gallery="portfolio-gallery">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="portfolio-item position-relative">
                        <img src="{{ asset('frontend/assets/img/portfolio/branding-1.jpg') }}" class="img-fluid"
                            alt="Branding 1">
                        <div class="portfolio-info">
                            <h4>Branding 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{ asset('frontend/assets/img/portfolio/branding-1.jpg') }}" title="Branding 1"
                                class="glightbox preview-link" data-gallery="portfolio-gallery">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="portfolio-item position-relative">
                        <img src="{{ asset('frontend/assets/img/portfolio/books-1.jpg') }}" class="img-fluid"
                            alt="Books 1">
                        <div class="portfolio-info">
                            <h4>Books 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{ asset('frontend/assets/img/portfolio/books-1.jpg') }}" title="Books 1"
                                class="glightbox preview-link" data-gallery="portfolio-gallery">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="portfolio-item position-relative">
                        <img src="{{ asset('frontend/assets/img/portfolio/app-2.jpg') }}" class="img-fluid"
                            alt="App 2">
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{ asset('frontend/assets/img/portfolio/app-2.jpg') }}" title="App 2"
                                class="glightbox preview-link" data-gallery="portfolio-gallery">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="portfolio-item position-relative">
                        <img src="{{ asset('frontend/assets/img/portfolio/product-2.jpg') }}" class="img-fluid"
                            alt="Product 2">
                        <div class="portfolio-info">
                            <h4>Product 2</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="{{ asset('frontend/assets/img/portfolio/product-2.jpg') }}" title="Product 2"
                                class="glightbox preview-link" data-gallery="portfolio-gallery">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
