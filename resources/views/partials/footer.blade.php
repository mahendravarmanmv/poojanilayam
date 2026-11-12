
<footer class="poojago-footer text-white text-center mt-0">

{{-- Newsletter Section --}}
<section class="bg-warning-subtle position-relative overflow-hidden text-center py-5">

    {{-- Mandala pattern: defined once, reused in the 4 corners --}}
    <svg width="0" height="0" class="position-absolute" aria-hidden="true">
        <defs>
            <ellipse id="pn-petal-lg" cx="100" cy="28" rx="10" ry="24"/>
            <ellipse id="pn-petal-sm" cx="100" cy="60" rx="5" ry="13"/>
            <symbol id="pn-mandala" viewBox="0 0 200 200" fill="none" stroke="currentColor" stroke-width="1">
                <circle cx="100" cy="100" r="98" stroke-width=".6"/>
                <circle cx="100" cy="100" r="76" stroke-dasharray="2 4"/>
                <circle cx="100" cy="100" r="46"/>
                <circle cx="100" cy="100" r="30"/>
                <circle cx="100" cy="100" r="8"/>
                <use href="#pn-petal-lg"/>
                <use href="#pn-petal-lg" transform="rotate(30 100 100)"/>
                <use href="#pn-petal-lg" transform="rotate(60 100 100)"/>
                <use href="#pn-petal-lg" transform="rotate(90 100 100)"/>
                <use href="#pn-petal-lg" transform="rotate(120 100 100)"/>
                <use href="#pn-petal-lg" transform="rotate(150 100 100)"/>
                <use href="#pn-petal-lg" transform="rotate(180 100 100)"/>
                <use href="#pn-petal-lg" transform="rotate(210 100 100)"/>
                <use href="#pn-petal-lg" transform="rotate(240 100 100)"/>
                <use href="#pn-petal-lg" transform="rotate(270 100 100)"/>
                <use href="#pn-petal-lg" transform="rotate(300 100 100)"/>
                <use href="#pn-petal-lg" transform="rotate(330 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(15 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(45 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(75 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(105 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(135 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(165 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(195 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(225 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(255 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(285 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(315 100 100)"/>
                <use href="#pn-petal-sm" transform="rotate(345 100 100)"/>
            </symbol>
        </defs>
    </svg>

	<svg class="position-absolute top-0 start-0 translate-middle text-warning opacity-25 pe-none" width="420" height="420" aria-hidden="true"><use href="#pn-mandala"/></svg>
	<svg class="position-absolute top-100 start-0 translate-middle text-warning opacity-25 pe-none" width="420" height="420" aria-hidden="true"><use href="#pn-mandala"/></svg>
	<svg class="position-absolute top-0 start-100 translate-middle text-warning opacity-25 pe-none" width="420" height="420" aria-hidden="true"><use href="#pn-mandala"/></svg>
	<svg class="position-absolute top-100 start-100 translate-middle text-warning opacity-25 pe-none" width="420" height="420" aria-hidden="true"><use href="#pn-mandala"/></svg>

    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7">

                {{-- Eyebrow with flanking rules --}}
                <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
                    <hr class="border-warning border-top border-2 opacity-100 m-0 w-25">
                    <span class="text-warning-emphasis text-uppercase small fw-medium">Stay connected</span>
                    <hr class="border-warning border-top border-2 opacity-100 m-0 w-25">
                </div>

				{{-- Heading --}}
				<h2 class="display-5 fw-bold text-danger-emphasis mb-3">
				Stay connected with <br class="d-block d-lg-none"> the divine
				</h2>

                {{-- Description --}}
                <p class="text-secondary fs-5 col-12 col-md-9 mx-auto mb-4">
                    Get festival updates, special poojas, spiritual stories and exclusive offers.
                </p>

                {{-- Lotus divider --}}
                <div class="d-flex align-items-center justify-content-center gap-2 mb-4 col-8 col-md-6 mx-auto">
                    <div class="d-flex align-items-center flex-fill">
                        <span class="d-inline-block rounded-circle bg-warning p-1"></span>
                        <span class="border-top border-warning flex-fill"></span>
                    </div>

                    <svg width="38" height="30" viewBox="0 0 60 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0">
                        <g stroke="#C99A2E" stroke-width="1.5" stroke-linejoin="round">
                            <path d="M30 32 C17 24 16 12 30 3 C44 12 43 24 30 32Z" fill="#E8C66D"/>
                            <path d="M28 32 C15 32 7 24 10 15 C19 16 25 23 28 32Z" fill="#F4DEA1"/>
                            <path d="M32 32 C45 32 53 24 50 15 C41 16 35 23 32 32Z" fill="#F4DEA1"/>
                            <path d="M30 32 C20 28 14 29 8 34 C18 38 25 36 30 32Z"/>
                            <path d="M30 32 C40 28 46 29 52 34 C42 38 35 36 30 32Z"/>
                            <path d="M30 3 V32"/>
                        </g>
                    </svg>

                    <div class="d-flex align-items-center flex-fill">
                        <span class="border-top border-warning flex-fill"></span>
                        <span class="d-inline-block rounded-circle bg-warning p-1"></span>
                    </div>
                </div>

                {{-- Form --}}
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="pn-newsletter-form text-start">
                    @csrf
                    <div class="d-flex flex-column flex-sm-row gap-3">

                        <div class="input-group input-group-lg flex-grow-1">
                            <span class="input-group-text bg-white border-warning border-end-0 rounded-start-3 text-warning">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input
                                type="email"
                                name="email"
                                class="form-control border-warning border-start-0 shadow-none rounded-end-3"
                                placeholder="Enter your email"
                                aria-label="Email address"
                                maxlength="191"
                                value="{{ old('email') }}"
                                required
                            >
                        </div>

                        <button class="btn btn-pn px-4 btn-lg rounded-3 px-4 flex-shrink-0" type="submit">
                            Subscribe <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </div>

                    @if (session('newsletter_success'))
                        <div class="alert alert-success mt-3 py-2 text-start small" role="status">
                            {{ session('newsletter_success') }}
                        </div>
                    @endif

                    @if ($errors->has('email'))
                        <div class="alert alert-danger mt-3 py-2 text-start small" role="alert">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </form>

            </div>
        </div>
    </div>
</section>

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
		<div class="d-flex align-items-center justify-content-center gap-3 mb-4">

		<span class="poojago-gold-line"></span>

		<svg width="38" height="30" viewBox="0 0 60 40" fill="none"
		xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0">
		<g stroke="#C99A2E" stroke-width="1.5" stroke-linejoin="round">
		<path d="M30 32 C17 24 16 12 30 3 C44 12 43 24 30 32Z" fill="#E8C66D"/>
		<path d="M28 32 C15 32 7 24 10 15 C19 16 25 23 28 32Z" fill="#F4DEA1"/>
		<path d="M32 32 C45 32 53 24 50 15 C41 16 35 23 32 32Z" fill="#F4DEA1"/>
		<path d="M30 32 C20 28 14 29 8 34 C18 38 25 36 30 32Z"/>
		<path d="M30 32 C40 28 46 29 52 34 C42 38 35 36 30 32Z"/>
		<path d="M30 3 V32"/>
		</g>
		</svg>

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
                <i class="bi bi-instagram fs-5 text-white"></i>
            </a>

            <a href="#"
               class="btn btn-outline-warning rounded-circle
                      d-flex align-items-center justify-content-center
                      p-0 poojago-social"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="YouTube">
                <i class="bi bi-youtube fs-5 text-white"></i>
            </a>

            <a href="#"
               class="btn btn-outline-warning rounded-circle
                      d-flex align-items-center justify-content-center
                      p-0 poojago-social"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="Facebook">
                <i class="bi bi-facebook fs-5 text-white"></i>
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
