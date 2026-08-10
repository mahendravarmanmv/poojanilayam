@extends('layouts.app')

@section('title', 'Frequently Asked Questions | Pooja Nilayam')

@section(
    'meta_description',
    'Find answers to frequently asked questions about Pooja Nilayam, pooja bookings, digital pooja, temples, astrology, donations, orders and customer support.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY FAQ DATA
    |--------------------------------------------------------------------------
    | FAQ content will later come from the Admin CMS FAQ module.
    |
    | The categories below are based on the documented Pooja Nilayam
    | modules and customer workflows.
    |--------------------------------------------------------------------------
    */

    $faqCategories = [

        [
            'key' => 'general',
            'title' => 'General',
            'icon' => 'bi-info-circle'
        ],

        [
            'key' => 'pooja',
            'title' => 'Pooja & Booking',
            'icon' => 'bi-flower1'
        ],

        [
            'key' => 'digital',
            'title' => 'Digital Pooja',
            'icon' => 'bi-stars'
        ],

        [
            'key' => 'temple',
            'title' => 'Temples & Priests',
            'icon' => 'bi-building'
        ],

        [
            'key' => 'astrology',
            'title' => 'Astrology',
            'icon' => 'bi-moon-stars'
        ],

        [
            'key' => 'store',
            'title' => 'Store & Orders',
            'icon' => 'bi-bag'
        ],

        [
            'key' => 'donation',
            'title' => 'Donations',
            'icon' => 'bi-heart'
        ],

        [
            'key' => 'support',
            'title' => 'Support',
            'icon' => 'bi-headset'
        ]

    ];


    $faqs = [

        /*
        |--------------------------------------------------------------------------
        | GENERAL
        |--------------------------------------------------------------------------
        */

        [
            'category' => 'general',

            'question' =>
                'What is Pooja Nilayam?',

            'answer' =>
                'Pooja Nilayam is envisioned as a digital spiritual
                ecosystem that connects devotees with poojas, temples,
                priests, digital spiritual experiences, astrology,
                devotional products, donations and spiritual learning.'
        ],

        [
            'category' => 'general',

            'question' =>
                'Who can use Pooja Nilayam?',

            'answer' =>
                'The platform is designed for devotees in India and
                other locations, including NRIs, elderly people, busy
                professionals and daily devotees.'
        ],


        /*
        |--------------------------------------------------------------------------
        | POOJA
        |--------------------------------------------------------------------------
        */

        [
            'category' => 'pooja',

            'question' =>
                'How can I book a pooja?',

            'answer' =>
                'You can browse the available poojas, select a pooja,
                view its details, choose the required date and time,
                provide devotee details, review the booking and proceed
                to payment.'
        ],

        [
            'category' => 'pooja',

            'question' =>
                'Can I select a priest for my pooja?',

            'answer' =>
                'Where priest selection is available for the selected
                service, you can select an available priest during
                the booking process.'
        ],

        [
            'category' => 'pooja',

            'question' =>
                'Will I receive confirmation after booking?',

            'answer' =>
                'After successful booking and payment, the system
                provides booking confirmation and can send notifications
                through the configured communication channels.'
        ],


        /*
        |--------------------------------------------------------------------------
        | DIGITAL POOJA
        |--------------------------------------------------------------------------
        */

        [
            'category' => 'digital',

            'question' =>
                'What is AI Personalized Digital Pooja?',

            'answer' =>
                'AI Personalized Digital Pooja is a key Pooja Nilayam
                experience designed to provide a personalized digital
                spiritual journey.'
        ],

        [
            'category' => 'digital',

            'question' =>
                'What personalization features are available?',

            'answer' =>
                'The documented concept includes AI Sankalpam,
                personalized name pronunciation, flower selection,
                deepam selection, temple animations, personalized
                mantras, blessings and certificate generation.'
        ],

        [
            'category' => 'digital',

            'question' =>
                'Can I participate in a live digital pooja?',

            'answer' =>
                'The platform includes Online Live Pooja functionality,
                including live video, session participation, recording
                and notifications.'
        ],


        /*
        |--------------------------------------------------------------------------
        | TEMPLES & PRIESTS
        |--------------------------------------------------------------------------
        */

        [
            'category' => 'temple',

            'question' =>
                'Can I book a pooja at a specific temple?',

            'answer' =>
                'Yes. Temple Pooja Booking is a documented core module,
                including temple-wise poojas and slot booking.'
        ],

        [
            'category' => 'temple',

            'question' =>
                'Can I view temple information before booking?',

            'answer' =>
                'The website includes Temple Listing, Temple Details,
                Temple Gallery and Temple Events screens so devotees
                can explore temple information.'
        ],

        [
            'category' => 'temple',

            'question' =>
                'How are priests assigned to bookings?',

            'answer' =>
                'The documented booking workflow allows the admin to
                review bookings and assign a priest or temple where
                applicable.'
        ],


        /*
        |--------------------------------------------------------------------------
        | ASTROLOGY
        |--------------------------------------------------------------------------
        */

        [
            'category' => 'astrology',

            'question' =>
                'What astrology services are available?',

            'answer' =>
                'The documented astrology module includes Horoscope,
                Kundli, Match Making, Numerology, Palm Reading and
                Vastu Consultation.'
        ],

        [
            'category' => 'astrology',

            'question' =>
                'How does an astrology consultation work?',

            'answer' =>
                'The documented flow is to browse astrologers, select
                an astrologer, choose a consultation type, select an
                available slot, complete payment and attend the
                consultation.'
        ],


        /*
        |--------------------------------------------------------------------------
        | STORE
        |--------------------------------------------------------------------------
        */

        [
            'category' => 'store',

            'question' =>
                'What can I purchase from the Pooja store?',

            'answer' =>
                'The documented marketplace includes pooja samagri,
                pooja kits and other devotional products.'
        ],

        [
            'category' => 'store',

            'question' =>
                'How do I place an order?',

            'answer' =>
                'The documented purchase flow is Browse Products,
                View Product, Add to Cart, Review Cart, Checkout,
                Address Selection, Payment and Order Confirmation.'
        ],

        [
            'category' => 'store',

            'question' =>
                'Can I track my order?',

            'answer' =>
                'Order Tracking is included in the documented
                Pooja Samagri Marketplace module.'
        ],


        /*
        |--------------------------------------------------------------------------
        | DONATIONS
        |--------------------------------------------------------------------------
        */

        [
            'category' => 'donation',

            'question' =>
                'What types of donations are supported?',

            'answer' =>
                'The documented donation module includes Temple
                Donations, NGO Donations, Annadanam and Goshala
                donations.'
        ],

        [
            'category' => 'donation',

            'question' =>
                'Will I receive a donation receipt?',

            'answer' =>
                'Donation receipts are included in the documented
                Donations module and donation workflow.'
        ],


        /*
        |--------------------------------------------------------------------------
        | SUPPORT
        |--------------------------------------------------------------------------
        */

        [
            'category' => 'support',

            'question' =>
                'How can I contact customer support?',

            'answer' =>
                'Pooja Nilayam includes customer support through
                support chat and a ticket system, with reference-ID
                based support also documented.'
        ],

        [
            'category' => 'support',

            'question' =>
                'How can I raise a support ticket?',

            'answer' =>
                'You can use the Raise Ticket page to submit a support
                request. The support workflow includes ticket creation,
                assignment, investigation, resolution and closure.'
        ],

        [
            'category' => 'support',

            'question' =>
                'Can I provide feedback after my service is completed?',

            'answer' =>
                'Yes. The documented overall process includes customer
                feedback and rating after successful service completion.'
        ]

    ];

@endphp


{{-- ============================================================
     BREADCRUMB
============================================================ --}}

<section class="bg-pn-cream border-bottom">

    <div class="container py-3">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">

                    <a
                        href="{{ route('home') }}"
                        class="text-pn-primary"
                    >
                        Home
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    FAQ
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     HERO
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center
                   text-center"
        >

            <div class="col-12 col-lg-8">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Help & Information
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Frequently Asked Questions
                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Find answers to common questions about Pooja
                    Nilayam, our spiritual services and your
                    customer journey.

                </p>


                {{-- FAQ Search --}}

                <div
                    class="position-relative
                           mx-auto"
                    style="max-width:760px;"
                >

                    <i
                        class="bi bi-search
                               position-absolute
                               top-50
                               start-0
                               translate-middle-y
                               ms-3
                               text-secondary"
                    ></i>


                    <input
                        type="search"
                        id="faqSearch"
                        class="form-control
                               form-control-lg
                               rounded-pill
                               ps-5
                               pe-5"
                        placeholder="Search your question..."
                        autocomplete="off"
                    >


                    <button
                        type="button"
                        id="clearFaqSearch"
                        class="btn
                               btn-sm
                               position-absolute
                               top-50
                               end-0
                               translate-middle-y
                               me-2
                               d-none"
                        aria-label="Clear FAQ search"
                    >

                        <i
                            class="bi bi-x-lg"
                        ></i>

                    </button>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FAQ CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">


            {{-- ==================================================
                 CATEGORY SIDEBAR
            =================================================== --}}

            <div class="col-12 col-lg-3">

                <div
                    class="position-sticky"
                    style="top:100px;"
                >

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5"
                    >

                        <div
                            class="card-body
                                   p-3"
                        >

                            <h2
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       px-2
                                       mb-3"
                            >
                                Categories
                            </h2>


                            <div
                                class="vstack
                                       gap-1"
                                id="faqCategoryList"
                            >

                                <button
                                    type="button"
                                    class="faq-category-btn
                                           btn
                                           text-start
                                           active"
                                    data-category="all"
                                >

                                    <i
                                        class="bi bi-grid
                                               me-2"
                                    ></i>

                                    All Questions

                                    <span
                                        class="badge
                                               rounded-pill
                                               bg-pn-cream
                                               text-pn-primary
                                               float-end"
                                    >
                                        {{ count($faqs) }}
                                    </span>

                                </button>


                                @foreach(
                                    $faqCategories as $category
                                )

                                    @php

                                        $categoryCount =
                                            collect($faqs)
                                                ->where(
                                                    'category',
                                                    $category['key']
                                                )
                                                ->count();

                                    @endphp


                                    <button
                                        type="button"
                                        class="faq-category-btn
                                               btn
                                               text-start"
                                        data-category="{{ $category['key'] }}"
                                    >

                                        <i
                                            class="bi {{ $category['icon'] }}
                                                   me-2"
                                        ></i>

                                        {{ $category['title'] }}

                                        <span
                                            class="badge
                                                   rounded-pill
                                                   bg-light
                                                   text-secondary
                                                   float-end"
                                        >

                                            {{ $categoryCount }}

                                        </span>

                                    </button>

                                @endforeach

                            </div>

                        </div>

                    </div>


                    {{-- Support CTA --}}

                    <div
                        class="bg-pn-cream
                               rounded-5
                               p-4
                               mt-4"
                    >

                        <div
                            class="rounded-circle
                                   bg-white
                                   text-pn-primary
                                   d-flex
                                   align-items-center
                                   justify-content-center
                                   mb-3"
                            style="width:52px;height:52px;"
                        >

                            <i
                                class="bi bi-headset
                                       fs-5"
                            ></i>

                        </div>


                        <h2
                            class="font-serif
                                   h5
                                   text-pn-brown"
                        >
                            Still Need Help?
                        </h2>


                        <p
                            class="small
                                   text-secondary"
                        >

                            If you cannot find the answer you're
                            looking for, our support team can help.

                        </p>


                        <div
                            class="d-grid
                                   gap-2"
                        >

                            <a
                                href="{{ url('/raise-ticket') }}"
                                class="btn btn-pn"
                            >

                                Raise a Ticket

                            </a>


                            <a
                                href="{{ url('/contact-us') }}"
                                class="btn
                                       btn-light
                                       border"
                            >

                                Contact Us

                            </a>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ==================================================
                 QUESTIONS
            =================================================== --}}

            <div class="col-12 col-lg-9">

                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           justify-content-between
                           align-items-sm-center
                           gap-2
                           mb-4"
                >

                    <div>

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Questions & Answers
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-1
                                   mb-0"
                        >
                            How Can We Help?
                        </h2>

                    </div>


                    <small
                        class="text-secondary"
                    >

                        <span id="faqResultCount">
                            {{ count($faqs) }}
                        </span>

                        questions

                    </small>

                </div>


                {{-- Accordion --}}

                <div
                    class="accordion
                           accordion-flush"
                    id="faqAccordion"
                >

                    @foreach(
                        $faqs as $index => $faq
                    )

                        <div
                            class="accordion-item
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   mb-3
                                   overflow-hidden
                                   faq-item"
                            data-category="{{ $faq['category'] }}"
                            data-question="{{ strtolower(
                                $faq['question']
                            ) }}"
                            data-answer="{{ strtolower(
                                $faq['answer']
                            ) }}"
                        >

                            <h3
                                class="accordion-header"
                                id="faqHeading{{ $index }}"
                            >

                                <button
                                    class="accordion-button
                                           collapsed
                                           fw-semibold
                                           text-pn-brown
                                           bg-white
                                           px-4
                                           py-4"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapse{{ $index }}"
                                    aria-expanded="false"
                                    aria-controls="faqCollapse{{ $index }}"
                                >

                                    <span
                                        class="me-3
                                               text-pn-primary"
                                    >

                                        <i
                                            class="bi bi-question-circle"
                                        ></i>

                                    </span>


                                    {{ $faq['question'] }}

                                </button>

                            </h3>


                            <div
                                id="faqCollapse{{ $index }}"
                                class="accordion-collapse
                                       collapse"
                                aria-labelledby="faqHeading{{ $index }}"
                                data-bs-parent="#faqAccordion"
                            >

                                <div
                                    class="accordion-body
                                           px-4
                                           pb-4
                                           pt-0"
                                >

                                    <div
                                        class="border-top
                                               border-warning-subtle
                                               pt-3"
                                    >

                                        <p
                                            class="text-secondary
                                                   lh-lg
                                                   mb-0"
                                        >

                                            {{ $faq['answer'] }}

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- Empty State --}}

                <div
                    id="faqEmptyState"
                    class="d-none
                           text-center
                           py-5"
                >

                    <div
                        class="rounded-circle
                               bg-pn-cream
                               text-pn-primary
                               d-flex
                               align-items-center
                               justify-content-center
                               mx-auto
                               mb-4"
                        style="width:78px;height:78px;"
                    >

                        <i
                            class="bi bi-search
                                   fs-3"
                        ></i>

                    </div>


                    <h2
                        class="font-serif
                               h3
                               text-pn-brown
                               mb-2"
                    >
                        No Questions Found
                    </h2>


                    <p
                        class="text-secondary
                               mb-4"
                    >

                        We couldn't find an FAQ matching your search.

                    </p>


                    <button
                        type="button"
                        id="resetFaq"
                        class="btn btn-pn"
                    >

                        View All Questions

                    </button>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SUPPORT CTA
============================================================ --}}

<section class="bg-pn-beige py-5">

    <div class="container">

        <div
            class="pn-digital
                   rounded-5
                   overflow-hidden
                   text-white"
        >

            <div class="p-4 p-md-5">

                <div
                    class="row
                           align-items-center
                           g-4"
                >

                    <div class="col-12 col-lg-8">

                        <span
                            class="small
                                   text-warning
                                   fw-semibold
                                   text-uppercase"
                        >
                            Need Personal Assistance?
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-2"
                        >
                            We're Here to Help
                        </h2>


                        <p
                            class="text-white-50
                                   mb-0"
                        >

                            If your question is not answered here,
                            contact our support team or raise a
                            support ticket.

                        </p>

                    </div>


                    <div
                        class="col-12 col-lg-4
                               d-flex
                               flex-wrap
                               justify-content-lg-end
                               gap-2"
                    >

                        <a
                            href="{{ url('/contact-us') }}"
                            class="btn
                                   btn-warning
                                   text-dark
                                   fw-semibold"
                        >

                            Contact Us

                        </a>


                        <a
                            href="{{ url('/raise-ticket') }}"
                            class="btn
                                   btn-outline-light"
                        >

                            Raise Ticket

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     PAGE SCRIPT
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById(
            'faqSearch'
        );


    const clearSearch =
        document.getElementById(
            'clearFaqSearch'
        );


    const categoryButtons =
        document.querySelectorAll(
            '.faq-category-btn'
        );


    const faqItems =
        document.querySelectorAll(
            '.faq-item'
        );


    const resultCount =
        document.getElementById(
            'faqResultCount'
        );


    const emptyState =
        document.getElementById(
            'faqEmptyState'
        );


    const resetFaq =
        document.getElementById(
            'resetFaq'
        );


    let activeCategory =
        'all';


    /*
    |--------------------------------------------------------------------------
    | Apply FAQ Filters
    |--------------------------------------------------------------------------
    */

    function applyFaqFilters() {

        const searchTerm =
            (
                searchInput?.value
                ||
                ''
            )
            .trim()
            .toLowerCase();


        let visibleCount =
            0;


        faqItems.forEach(
            function (item) {

                const category =
                    item.dataset.category
                    ||
                    '';


                const question =
                    item.dataset.question
                    ||
                    '';


                const answer =
                    item.dataset.answer
                    ||
                    '';


                const matchesCategory =
                    activeCategory === 'all'
                    ||
                    category === activeCategory;


                const matchesSearch =
                    !searchTerm
                    ||
                    question.includes(
                        searchTerm
                    )
                    ||
                    answer.includes(
                        searchTerm
                    );


                const visible =
                    matchesCategory
                    &&
                    matchesSearch;


                item.classList.toggle(
                    'd-none',
                    !visible
                );


                if (visible) {

                    visibleCount++;

                }

            }
        );


        if (resultCount) {

            resultCount.textContent =
                visibleCount;

        }


        if (visibleCount === 0) {

            emptyState?.classList.remove(
                'd-none'
            );

        } else {

            emptyState?.classList.add(
                'd-none'
            );

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Category Selection
    |--------------------------------------------------------------------------
    */

    categoryButtons.forEach(
        function (button) {

            button.addEventListener(
                'click',
                function () {

                    categoryButtons.forEach(
                        function (item) {

                            item.classList.remove(
                                'active'
                            );

                        }
                    );


                    this.classList.add(
                        'active'
                    );


                    activeCategory =
                        this.dataset.category
                        ||
                        'all';


                    applyFaqFilters();

                }
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    */

    searchInput?.addEventListener(
        'input',
        function () {

            const hasText =
                this.value.trim().length > 0;


            clearSearch?.classList.toggle(
                'd-none',
                !hasText
            );


            applyFaqFilters();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Clear Search
    |--------------------------------------------------------------------------
    */

    clearSearch?.addEventListener(
        'click',
        function () {

            searchInput.value =
                '';


            this.classList.add(
                'd-none'
            );


            searchInput.focus();


            applyFaqFilters();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Reset FAQ
    |--------------------------------------------------------------------------
    */

    resetFaq?.addEventListener(
        'click',
        function () {

            searchInput.value =
                '';


            clearSearch?.classList.add(
                'd-none'
            );


            activeCategory =
                'all';


            categoryButtons.forEach(
                function (button) {

                    button.classList.toggle(
                        'active',
                        button.dataset.category === 'all'
                    );

                }
            );


            applyFaqFilters();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Initial State
    |--------------------------------------------------------------------------
    */

    applyFaqFilters();

});
</script>

@endpush

@endsection