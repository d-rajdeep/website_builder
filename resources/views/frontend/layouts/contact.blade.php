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
                <form action="{{ route('contact.store') }}" method="POST" class="php-email-form" id="contactForm"
                    data-aos="fade-up" data-aos-delay="200">
                    @csrf
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <label for="name" class="pb-2">Your Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" required
                                value="{{ old('name') }}">
                            <div class="invalid-feedback" id="name-error"></div>
                        </div>

                        <div class="col-md-6">
                            <label for="mobile" class="pb-2">Mobile Number <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="mobile" id="mobile" class="form-control" required
                                value="{{ old('mobile') }}" maxlength="10">
                            <div class="form-text">10-digit mobile number without country code</div>
                            <div class="invalid-feedback" id="mobile-error"></div>
                        </div>

                        <div class="col-md-12">
                            <label for="email" class="pb-2">Your Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" required
                                value="{{ old('email') }}">
                            <div class="invalid-feedback" id="email-error"></div>
                        </div>

                        <div class="col-md-12">
                            <label for="subject" class="pb-2">Subject <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subject" id="subject" required
                                value="{{ old('subject') }}">
                            <div class="invalid-feedback" id="subject-error"></div>
                        </div>

                        <div class="col-md-12">
                            <label for="message" class="pb-2">Message <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="message" rows="10" id="message" required>{{ old('message') }}</textarea>
                            <div class="form-text">Minimum 10 characters required</div>
                            <div class="invalid-feedback" id="message-error"></div>
                        </div>

                        <div class="col-md-12">
                            <label for="captcha" class="pb-2">Captcha <span class="text-danger">*</span></label>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="captcha-container mb-2">
                                        <span class="captcha-image">{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            id="reload-captcha">
                                            ↻ Reload
                                        </button>
                                    </div>
                                    <input type="text" class="form-control" name="captcha" id="captcha"
                                        required placeholder="Enter captcha code">
                                    <div class="invalid-feedback" id="captcha-error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>

                    </div>
                </form>

                @push('scripts')
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const form = document.getElementById('contactForm');
                            const reloadBtn = document.getElementById('reload-captcha');
                            const captchaImage = document.querySelector('.captcha-image');

                            // Mobile number validation (only numbers)
                            document.getElementById('mobile').addEventListener('input', function(e) {
                                this.value = this.value.replace(/[^0-9]/g, '');
                            });

                            // Reload captcha
                            reloadBtn.addEventListener('click', function() {
                                fetch('{{ route('contact.reload-captcha') }}')
                                    .then(response => response.json())
                                    .then(data => {
                                        captchaImage.innerHTML = data.captcha;
                                    });
                            });

                            // Form submission
                            form.addEventListener('submit', function(e) {
                                e.preventDefault();

                                const formData = new FormData(this);
                                const submitBtn = form.querySelector('button[type="submit"]');
                                const loading = form.querySelector('.loading');
                                const errorMessage = form.querySelector('.error-message');
                                const sentMessage = form.querySelector('.sent-message');

                                // Reset states
                                loading.style.display = 'none';
                                errorMessage.style.display = 'none';
                                sentMessage.style.display = 'none';
                                form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                                form.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

                                // Show loading
                                loading.style.display = 'block';
                                submitBtn.disabled = true;

                                fetch(this.action, {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'X-Requested-With': 'XMLHttpRequest',
                                            'Accept': 'application/json'
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        loading.style.display = 'none';

                                        if (data.success) {
                                            sentMessage.style.display = 'block';
                                            form.reset();
                                            // Reload captcha after successful submission
                                            reloadBtn.click();
                                        } else {
                                            // Display validation errors
                                            if (data.errors) {
                                                Object.keys(data.errors).forEach(field => {
                                                    const input = document.getElementById(field);
                                                    const errorDiv = document.getElementById(field + '-error');
                                                    if (input && errorDiv) {
                                                        input.classList.add('is-invalid');
                                                        errorDiv.textContent = data.errors[field][0];
                                                    }
                                                });
                                                errorMessage.textContent = 'Please fix the errors above.';
                                                errorMessage.style.display = 'block';
                                            }
                                        }
                                    })
                                    .catch(error => {
                                        loading.style.display = 'none';
                                        errorMessage.textContent = 'An error occurred. Please try again.';
                                        errorMessage.style.display = 'block';
                                    })
                                    .finally(() => {
                                        submitBtn.disabled = false;
                                    });
                            });
                        });
                    </script>

                    <style>
                        .captcha-container {
                            display: flex;
                            align-items: center;
                            gap: 10px;
                        }

                        .captcha-image {
                            border: 1px solid #ddd;
                            padding: 5px;
                            border-radius: 4px;
                            background: #f8f9fa;
                        }

                        .loading,
                        .error-message,
                        .sent-message {
                            display: none;
                        }

                        .invalid-feedback {
                            display: block;
                        }
                    </style>
                @endpush
            </div><!-- End Contact Form -->

        </div>

    </div>

</section>
