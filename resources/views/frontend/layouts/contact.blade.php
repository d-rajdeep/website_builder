<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <span>Contact</span>
        <h2>Contact</h2>
        <p>Feel free to contact us</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-5">
                <div class="info-wrap">

                    @php
                        $contact = \App\Models\ContactInfo::first();
                    @endphp

                    @if ($contact)
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>{{ $contact->address }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>{{ $contact->phone }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>{{ $contact->email }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        @if ($contact->map_link)
                            <iframe src="{{ $contact->map_link }}" frameborder="0"
                                style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        @endif
                    @else
                        <p class="text-muted">Contact info is not available yet.</p>
                    @endif

                </div>
            </div>

            <div class="col-lg-7">
                {{-- Contact form --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" data-aos="fade-up" data-aos-delay="200">
                    @csrf
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <label for="name" class="pb-2">Your Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" required
                                value="{{ old('name') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="mobile" class="pb-2">Mobile Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="mobile" id="mobile" class="form-control" required
                                maxlength="10" value="{{ old('mobile') }}">
                            <div class="form-text">10-digit mobile number without country code</div>
                        </div>

                        <div class="col-md-12">
                            <label for="email" class="pb-2">Your Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" required
                                value="{{ old('email') }}">
                        </div>

                        <div class="col-md-12">
                            <label for="subject" class="pb-2">Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subject" id="subject" required
                                value="{{ old('subject') }}">
                        </div>

                        <div class="col-md-12">
                            <label for="message" class="pb-2">Message <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="message" rows="10" id="message" required>{{ old('message') }}</textarea>
                            <div class="form-text">Minimum 10 characters required</div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
</section>
