<header class="sticky-top">

    {{-- Top Bar --}}
    <div class="bg-pn-brown text-white">

        <div class="container">

            <div
                class="d-flex
                       flex-column
                       flex-md-row
                       align-items-center
                       justify-content-between
                       gap-2
                       py-2">

                <span class="small">

                    <i class="bi bi-stars text-warning me-1"></i>

                    Sacred services, thoughtfully delivered.

                </span>

                <div
                    class="d-flex
                           align-items-center
                           gap-3
                           small">

                    <a href="#" class="text-white">
                        Track Booking
                    </a>

                    <span class="text-white-50">|</span>

                    <a href="{{ route('support.help-center') }}" class="text-white">
                        Help
                    </a>

                    <span class="text-white-50">|</span>

                    <a href="{{ route('support.contact') }}" class="text-white">
                        Contact
                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- Main Navigation --}}
    <nav
    class="navbar
           navbar-expand-xl
           bg-pn-cream
           border-bottom
           py-0">

        <div class="container py-0">


            {{-- Brand --}}
<a
    href="{{ route('home') }}"
    class="navbar-brand d-flex align-items-center">

    <img
        src="{{ asset('images/pooja-nilayam-logo.png') }}"
        alt="Pooja Nilayam"
        class="img-fluid"
        style="height: 80px; width: auto;">

</a>


            {{-- Mobile Actions --}}
            <div
                class="d-flex
                       align-items-center
                       gap-1
                       ms-auto
                       d-xl-none">

                <a
                    href="{{ route('search') }}"
                    class="btn btn-sm text-pn-brown">
                    <i class="bi bi-search fs-5"></i>
                </a>

                <a
                    href="{{ route('store.cart') }}"
                    class="btn btn-sm text-pn-brown position-relative">

                    <i class="bi bi-bag fs-5"></i>

                    <span
                        class="position-absolute
                               top-0
                               start-100
                               translate-middle
                               badge
                               rounded-pill
                               bg-pn-primary">
                        2
                    </span>

                </a>

                <button
                    class="navbar-toggler
                           border-0
                           shadow-none"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#mobileMenu">

                    <i
                        class="bi bi-list
                               fs-2
                               text-pn-primary"></i>

                </button>

            </div>


            {{-- Desktop Navigation --}}
            <div class="collapse navbar-collapse">

                <ul
                    class="navbar-nav
                           mx-auto
                           align-items-xl-center
                           gap-xl-1">

                    <li class="nav-item">

                        <a
                            href="{{ route('home') }}"
                            class="nav-link
                                   px-xl-3
                                   fw-semibold
                                   text-pn-primary">
                            Home
                        </a>

                    </li>


                    <li class="nav-item dropdown">

                        <a
                            href="{{ route('pooja.index') }}"
                            class="nav-link
               dropdown-toggle
               px-xl-3
               text-pn-brown"
                            id="poojasDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Poojas
                        </a>

                        <ul
                            class="dropdown-menu
               border-0
               shadow-sm
               rounded-3"
                            aria-labelledby="poojasDropdown">

                            <li>
                                <a
                                    href="{{ route('pooja.index') }}"
                                    class="dropdown-item py-2">
                                    Popular Poojas
                                </a>
                            </li>

                            <li>
                                <a
                                    href="{{ route('pooja.categories') }}"
                                    class="dropdown-item py-2">
                                    Pooja Categories
                                </a>
                            </li>

                            <li>
                                <a
                                    href="#"
                                    class="dropdown-item py-2">
                                    Temple Poojas
                                </a>
                            </li>

                        </ul>

                    </li>


                    {{-- <li class="nav-item">

                        <a
                            href="{{ route('temple.index') }}"
                            class="nav-link
                                   px-xl-3
                                   text-pn-brown">
                            Temples
                        </a>

                    </li> --}}


                    <li class="nav-item">

                        <a
                            href="{{ route('priest.index') }}"
                            class="nav-link
                                   px-xl-3
                                   text-pn-brown">
                            Priests
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            href="{{ route('digital-pooja.index') }}"
                            class="nav-link
                                   px-xl-3
                                   text-pn-brown">
                            Digital Pooja
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            href="{{ route('astrology.index') }}"
                            class="nav-link
                                   px-xl-3
                                   text-pn-brown">
                            Astrology
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            href="{{ route('store.index') }}"
                            class="nav-link
                                   px-xl-3
                                   text-pn-brown">
                            Store
                        </a>

                    </li>

                </ul>


                {{-- Desktop Actions --}}
                <div
                    class="d-none
                           d-xl-flex
                           align-items-center
                           gap-1">

                    <a
                        href="#"
                        class="btn btn-sm text-pn-brown">

                        <i
                            class="bi bi-geo-alt
                                   text-pn-primary
                                   me-1"></i>

                        Hyderabad

                    </a>


                    <a href="{{ route('store.wishlist') }}" class="text-pn-brown fs-5" aria-label="Wishlist">
                        <i class="bi bi-heart"></i>
                    </a>


                    <a
                        href="{{ route('store.cart') }}"
                        class="btn btn-sm text-pn-brown position-relative">

                        <i class="bi bi-bag fs-5"></i>

                        <span
                            class="position-absolute
                                   top-0
                                   start-100
                                   translate-middle
                                   badge
                                   rounded-pill
                                   bg-pn-primary">
                            2
                        </span>

                    </a>


                    <a
                        href="{{ route('auth.login') }}"
                        class="btn btn-pn
                               ms-2
                               px-4">
                        Login
                    </a>

                </div>

            </div>

        </div>

    </nav>


    {{-- Mobile Menu --}}
    <div
        class="offcanvas
               offcanvas-end"
        tabindex="-1"
        id="mobileMenu">

        <div class="offcanvas-header border-bottom">

            <h5
                class="offcanvas-title
                       font-serif
                       fw-bold
                       text-pn-primary">
                Pooja Nilayam
            </h5>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas"></button>

        </div>


        <div class="offcanvas-body bg-pn-cream">

            <a
                href="{{ route('auth.login') }}"
                class="btn btn-pn
                       w-100
                       mb-4">
                Login / Register
            </a>


            <div class="list-group list-group-flush">

                @foreach([
                ['icon'=>'bi-house', 'name'=>'Home', 'route'=>'home'],
                ['icon'=>'bi-flower1', 'name'=>'Poojas', 'route'=>'pooja.index'],
                ['icon'=>'bi-bank', 'name'=>'Temples', 'route'=>'temple.index'],
                ['icon'=>'bi-person', 'name'=>'Priests', 'route'=>'priest.index'],
                ['icon'=>'bi-camera-video', 'name'=>'Digital Pooja', 'route'=>'digital-pooja.index'],
                ['icon'=>'bi-stars', 'name'=>'Astrology', 'route'=>'astrology.index'],
                ['icon'=>'bi-shop', 'name'=>'Online Store', 'route'=>'store.index']
                ] as $item)

                <a
                    href="{{ route($item['route']) }}"
                    class="list-group-item
                               list-group-item-action
                               bg-transparent
                               border-0
                               border-bottom
                               py-3">

                    <i
                        class="bi {{ $item['icon'] }}
                                   text-pn-primary
                                   me-3"></i>

                    {{ $item['name'] }}

                    <i
                        class="bi bi-chevron-right
                                   float-end
                                   text-secondary"></i>

                </a>

                @endforeach

            </div>

        </div>

    </div>

</header>