<footer id="footer" class="footer">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                @php
                    use App\Models\Logo;
                    $logo = Logo::first();
                @endphp

                @if ($logo && $logo->image)
                    <img src="{{ asset('storage/' . $logo->image) }}" alt="Logo"
                        style="height: 100px; width: auto; object-fit: contain;">
                @else
                    <h1 class="sitename">Website</h1>
                @endif
                <div class="info-wrap">

                    @php
                        $contact = \App\Models\ContactInfo::first();
                    @endphp

                    @if ($contact)
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <p>{{ $contact->address }}</p>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <p>{{ $contact->phone }}</p>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                {{-- <h3>Email Us</h3> --}}
                                <p>{{ $contact->email }}</p>
                        </div><!-- End Info Item -->

                    @else
                        <p class="text-muted">Contact info is not available yet.</p>
                    @endif

                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12">
                <h4>Follow Us</h4>
                <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                <div class="social-links d-flex">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

        </div>
    </div>


    <div class="text-center py-3">
        <span class="text-muted d-block">
            Copyright © 2025. All rights reserved.
        </span>
        <span class="text-muted d-block">
            Developed by <a href="https://d-rajdeep.github.io/" target="_blank">RAJDEEP</a>
        </span>
    </div>



</footer>
