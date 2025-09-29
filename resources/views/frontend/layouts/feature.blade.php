<section id="featured-services" class="featured-services section">
    <div class="container">
        {{-- Debug: Check if features exist --}}
        @php
            $features = \App\Models\Feature::take(3)->get();
        @endphp

        @if($features->count() > 0)
            <div class="row gy-4">
                @foreach($features as $index => $feature)
                    <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi {{ $feature->icon ?? 'bi-activity' }} icon"></i>
                            </div>
                            <h4>
                                <a href="" class="stretched-link">{{ $feature->title }}</a>
                            </h4>
                            <p>{{ $feature->text }}</p>
                        </div>
                    </div><!-- End Service Item -->
                @endforeach
            </div>
        @else
            {{-- Show static content if no features in database --}}
            <div class="row gy-4">
                <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-activity icon"></i></div>
                        <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>
                <!-- Add other static items as fallback -->
            </div>
        @endif
    </div>
</section>
