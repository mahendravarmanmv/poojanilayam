
<footer class="poojago-footer text-white text-center mt-0">

    <div class="container py-4 py-md-2">

        {{-- Logo --}}
        <div class="mb-3">
            <a href="{{ url('/') }}" class="d-inline-block">
                <img
                    src="{{ asset('images/logo-white.webp') }}"
                    alt="PoojaGo"
                    class="img-fluid"
                    style="max-width: 330px;"
                >
            </a>
        </div>

        {{-- Description --}}
        <p class="text-white-50 fs-6 lh-base mb-4 mx-auto"
           style="max-width: 500px;">
            A trusted spiritual platform connecting devotees
            with authentic priests and sacred services.
        </p>

        {{-- Decorative Divider --}}
        <div class="d-flex align-items-center
                    justify-content-center gap-3 mb-4">

            <span class="poojago-gold-line"></span>

            <i class="bi bi-flower1 fs-3 text-warning"></i>

            <span class="poojago-gold-line"></span>

        </div>

        {{-- Footer Navigation --}}
        <nav class="d-flex flex-wrap align-items-center
                    justify-content-center gap-2 gap-md-3 mb-4"
             aria-label="Footer navigation">

            <a href="{{ url('/about-us') }}"
               class="text-decoration-none text-light">
                About Us
            </a>

            <span class="text-warning d-none d-sm-inline">|</span>

            <a href="{{ route('pooja.index') }}"
               class="text-decoration-none text-light">
                Poojas
            </a>

            <span class="text-warning d-none d-sm-inline">|</span>

            <a href="{{ route('priest.index') }}"
               class="text-decoration-none text-light">
                Priests
            </a>

            <span class="text-warning d-none d-sm-inline">|</span>

            <a href="{{ url('/temples') }}"
               class="text-decoration-none text-light">
                Temples
            </a>

            <span class="text-warning d-none d-sm-inline">|</span>

            <a href="{{ url('/contact') }}"
               class="text-decoration-none text-light">
                Contact
            </a>

        </nav>

        {{-- Social Media --}}
        <div class="d-flex align-items-center
                    justify-content-center gap-4 mb-4">

            <a href="#"
               class="btn btn-outline-warning rounded-circle
                      d-flex align-items-center justify-content-center
                      p-0 poojago-social"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="Instagram">
                <i class="bi bi-instagram fs-5"></i>
            </a>

            <a href="#"
               class="btn btn-outline-warning rounded-circle
                      d-flex align-items-center justify-content-center
                      p-0 poojago-social"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="YouTube">
                <i class="bi bi-youtube fs-5"></i>
            </a>

            <a href="#"
               class="btn btn-outline-warning rounded-circle
                      d-flex align-items-center justify-content-center
                      p-0 poojago-social"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="Facebook">
                <i class="bi bi-facebook fs-5"></i>
            </a>

        </div>

        {{-- Bottom Divider --}}
        <hr class="border-warning opacity-25 mx-auto mb-3"
            style="max-width: 600px;">

        {{-- Copyright --}}
        <p class="text-white-50 small mb-0">
            © {{ date('Y') }} PoojaGo. All rights reserved.
        </p>

        {{-- Legal Links --}}
        <div class="d-flex flex-wrap justify-content-center
                    gap-3 mt-3 small">

            <a href="{{ route('privacy') }}"
               class="text-white-50 text-decoration-none">
                Privacy Policy
            </a>

            <a href="{{ route('terms') }}"
               class="text-white-50 text-decoration-none">
                Terms & Conditions
            </a>

            <a href="{{ route('refund') }}"
               class="text-white-50 text-decoration-none">
                Refund Policy
            </a>

        </div>

    </div>

</footer>
