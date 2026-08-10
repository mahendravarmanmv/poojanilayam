@extends('layouts.app')

@section('title', 'Help Center | Pooja Nilayam')

@section(
    'meta_description',
    'Find answers to common questions about Pooja Nilayam services, bookings, digital pooja, orders, payments and support.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY HELP CENTER DATA
    |--------------------------------------------------------------------------
    | These values will later come from the CMS / FAQ management module.
    |--------------------------------------------------------------------------
    */

    $categories = [

        [
            'name' => 'Pooja & Bookings',
            'icon' => 'bi-flower1',
            'description' =>
                'Questions about pooja services, booking dates,
                priests and booking confirmations.',
            'count' => 12
        ],

        [
            'name' => 'Digital Pooja',
            'icon' => 'bi-camera-video',
            'description' =>
                'Learn about digital pooja scheduling, live sessions,
                recordings and completion updates.',
            'count' => 9
        ],

        [
            'name' => 'Temples',
            'icon' => 'bi-building',
            'description' =>
                'Information about temples, temple services,
                events and timings.',
            'count' => 8
        ],

        [
            'name' => 'Astrology',
            'icon' => 'bi-stars',
            'description' =>
                'Help with horoscope, kundli, consultations and
                astrology bookings.',
            'count' => 10
        ],

        [
            'name' => 'Orders & Store',
            'icon' => 'bi-bag',
            'description' =>
                'Questions about products, cart, checkout,
                shipping and orders.',
            'count' => 15
        ],

        [
            'name' => 'Payments & Donations',
            'icon' => 'bi-credit-card',
            'description' =>
                'Payment, donation, receipts, refunds and
                transaction-related questions.',
            'count' => 11
        ],

        [
            'name' => 'Account',
            'icon' => 'bi-person-circle',
            'description' =>
                'Manage your profile, password, addresses and
                account information.',
            'count' => 7
        ],

        [
            'name' => 'General',
            'icon' => 'bi-question-circle',
            'description' =>
                'General information about Pooja Nilayam and
                using the website.',
            'count' => 14
        ]

    ];


    $faqs = [

        [
            'question' =>
                'How can I book a pooja through Pooja Nilayam?',

            'answer' =>
                'Browse the available poojas, open the pooja details,
                choose the available date and time, provide the
                required devotee details, review your booking and
                complete the payment.'
        ],

        [
            'question' =>
                'Can I choose a specific priest for my pooja?',

            'answer' =>
                'Where priest selection is available for a service,
                you can select a preferred priest during the booking
                process. Availability may vary by service and date.'
        ],

        [
            'question' =>
                'How does Digital Pooja work?',

            'answer' =>
                'Select a Digital Pooja, provide the required sankalp
                details, choose the available date, complete payment
                and receive the booking confirmation. The priest
                performs the pooja and completion information can be
                shared after the service.'
        ],

        [
            'question' =>
                'How can I check my booking status?',

            'answer' =>
                'After logging in, you can view your bookings from the
                My Bookings section of your dashboard.'
        ],

        [
            'question' =>
                'How can I track my order?',

            'answer' =>
                'After an order has been placed, order information and
                available delivery updates can be viewed from your
                account order section.'
        ],

        [
            'question' =>
                'What should I do if my payment fails?',

            'answer' =>
                'If a payment fails, review the payment status and
                retry the transaction if the option is available.
                If the issue continues, contact support with the
                relevant transaction or booking information.'
        ],

        [
            'question' =>
                'How can I change my account password?',

            'answer' =>
                'Log in to your account, open your dashboard and use
                the Change Password section to update your password.'
        ],

        [
            'question' =>
                'How can I contact customer support?',

            'answer' =>
                'You can contact Pooja Nilayam through the Contact Us
                page. If your issue requires tracking and follow-up,
                you can raise a support ticket.'
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
                    Help Center
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     HELP CENTER HERO
============================================================ --}}

<section
    class="bg-pn-cream
           py-5"
>

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
                    Support & Assistance
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    How Can We Help?
                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-4"
                >

                    Find answers to common questions about poojas,
                    bookings, digital services, orders, payments
                    and your account.

                </p>


                {{-- Help Search --}}

                <div
                    class="mx-auto"
                    style="max-width:720px;"
                >

                    <div
                        class="input-group
                               input-group-lg"
                    >

                        <span
                            class="input-group-text
                                   bg-white
                                   border-end-0"
                        >

                            <i
                                class="bi bi-search
                                       text-pn-primary"
                            ></i>

                        </span>


                        <input
                            type="search"
                            id="helpSearch"
                            class="form-control
                                   border-start-0"
                            placeholder="Search for answers..."
                            autocomplete="off"
                            aria-label="Search help articles"
                        >


                        <button
                            type="button"
                            id="clearHelpSearch"
                            class="btn
                                   btn-light
                                   border
                                   d-none"
                            aria-label="Clear search"
                        >

                            <i
                                class="bi bi-x-lg"
                            ></i>

                        </button>

                    </div>


                    <small
                        class="d-block
                               text-secondary
                               mt-2"
                    >

                        Try searching for "booking", "payment",
                        "digital pooja" or "order".

                    </small>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     HELP CATEGORIES
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="text-center
                   mb-5"
        >

            <span
                class="small
                       text-pn-gold
                       fw-semibold
                       text-uppercase"
            >
                Browse Topics
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2
                       mb-2"
            >
                Find Help by Category
            </h2>


            <div
                class="pn-divider
                       mx-auto
                       mb-3"
            ></div>


            <p
                class="text-secondary
                       mb-0"
            >

                Choose a topic to find the information you need.

            </p>

        </div>


        <div
            id="helpCategories"
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-lg-4
                   g-4"
        >

            @foreach(
                $categories as $category
            )

                <div
                    class="col
                           help-category-card"
                    data-search="{{ strtolower(
                        $category['name']
                        . ' '
                        . $category['description']
                    ) }}"
                >

                    <button
                        type="button"
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               h-100
                               w-100
                               text-start
                               bg-white
                               p-0
                               help-category-button"
                        data-category="{{ strtolower(
                            $category['name']
                        ) }}"
                    >

                        <div
                            class="card-body
                                   p-4"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       mb-4"
                                style="width:58px;height:58px;"
                            >

                                <i
                                    class="bi {{ $category['icon'] }}
                                           fs-5"
                                ></i>

                            </div>


                            <h3
                                class="font-serif
                                       h5
                                       text-pn-brown
                                       mb-2"
                            >

                                {{ $category['name'] }}

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-3"
                            >

                                {{ $category['description'] }}

                            </p>


                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-between"
                            >

                                <small
                                    class="text-pn-primary
                                           fw-semibold"
                                >

                                    {{ $category['count'] }}
                                    articles

                                </small>


                                <i
                                    class="bi bi-arrow-right
                                           text-pn-primary"
                                ></i>

                            </div>

                        </div>

                    </button>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ============================================================
     POPULAR QUESTIONS
============================================================ --}}

<section
    class="bg-pn-beige
           py-5"
>

    <div class="container">

        <div
            class="row
                   g-4
                   align-items-start"
        >

            {{-- Left Intro --}}

            <div class="col-12 col-lg-4">

                <div
                    class="position-sticky"
                    style="top:100px;"
                >

                    <span
                        class="small
                               text-pn-gold
                               fw-semibold
                               text-uppercase"
                    >
                        Frequently Asked
                    </span>


                    <h2
                        class="font-serif
                               display-6
                               text-pn-brown
                               mt-2
                               mb-3"
                    >
                        Popular Questions
                    </h2>


                    <p
                        class="text-secondary"
                    >

                        Here are some of the questions our customers
                        commonly ask.

                    </p>


                    <div
                        class="bg-white
                               border
                               border-warning-subtle
                               rounded-5
                               p-4
                               mt-4"
                    >

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-cream
                                       text-pn-primary
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:48px;height:48px;"
                            >

                                <i
                                    class="bi bi-headset"
                                ></i>

                            </div>


                            <div>

                                <strong
                                    class="d-block
                                           text-pn-brown
                                           mb-1"
                                >
                                    Still need help?
                                </strong>


                                <small
                                    class="text-secondary
                                           d-block
                                           mb-3"
                                >

                                    Our support team can help with
                                    questions that are not answered
                                    here.

                                </small>


                                <a
                                    href="{{ url('/contact-us') }}"
                                    class="btn
                                           btn-sm
                                           btn-pn-outline"
                                >

                                    Contact Us

                                    <i
                                        class="bi bi-arrow-right ms-1"
                                    ></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- FAQ Accordion --}}

            <div class="col-12 col-lg-8">

                <div
                    id="helpFaqAccordion"
                    class="accordion"
                >

                    @foreach(
                        $faqs as $index => $faq
                    )

                        <div
                            class="accordion-item
                                   border
                                   border-warning-subtle
                                   rounded-4
                                   overflow-hidden
                                   mb-3
                                   help-faq-item"
                            data-search="{{ strtolower(
                                $faq['question']
                                . ' '
                                . $faq['answer']
                            ) }}"
                        >

                            <h3
                                class="accordion-header"
                                id="faqHeading{{ $index }}"
                            >

                                <button
                                    class="accordion-button
                                           {{ $index !== 0
                                               ? 'collapsed'
                                               : ''
                                           }}"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapse{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="faqCollapse{{ $index }}"
                                >

                                    <span
                                        class="fw-semibold
                                               text-pn-brown"
                                    >

                                        {{ $faq['question'] }}

                                    </span>

                                </button>

                            </h3>


                            <div
                                id="faqCollapse{{ $index }}"
                                class="accordion-collapse
                                       collapse
                                       {{ $index === 0
                                           ? 'show'
                                           : ''
                                       }}"
                                aria-labelledby="faqHeading{{ $index }}"
                                data-bs-parent="#helpFaqAccordion"
                            >

                                <div
                                    class="accordion-body
                                           text-secondary
                                           small
                                           lh-lg"
                                >

                                    {{ $faq['answer'] }}

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- Empty Search --}}

                <div
                    id="helpEmptyState"
                    class="d-none
                           bg-white
                           border
                           border-warning-subtle
                           rounded-5
                           p-5
                           text-center"
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
                        style="width:72px;height:72px;"
                    >

                        <i
                            class="bi bi-search fs-3"
                        ></i>

                    </div>


                    <h3
                        class="font-serif
                               h4
                               text-pn-brown"
                    >
                        No Results Found
                    </h3>


                    <p
                        class="small
                               text-secondary
                               mb-4"
                    >

                        We couldn't find an answer matching your
                        search.

                    </p>


                    <a
                        href="{{ url('/contact-us') }}"
                        class="btn btn-pn"
                    >

                        Contact Support

                        <i
                            class="bi bi-arrow-right ms-1"
                        ></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     QUICK SUPPORT OPTIONS
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="text-center
                   mb-5"
        >

            <span
                class="small
                       text-pn-gold
                       fw-semibold
                       text-uppercase"
            >
                Need More Assistance?
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2
                       mb-2"
            >
                We're Here to Help
            </h2>


            <p
                class="text-secondary
                       mb-0"
            >

                Choose the support option that best fits your
                question.

            </p>

        </div>


        <div
            class="row
                   row-cols-1
                   row-cols-md-3
                   g-4"
        >

            {{-- Contact --}}

            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           h-100"
                >

                    <div
                        class="card-body
                               p-4
                               text-center"
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
                            style="width:60px;height:60px;"
                        >

                            <i
                                class="bi bi-envelope fs-5"
                            ></i>

                        </div>


                        <h3
                            class="font-serif
                                   h4
                                   text-pn-brown"
                        >
                            Contact Us
                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-4"
                        >

                            Send us a general enquiry and our team
                            will get back to you.

                        </p>


                        <a
                            href="{{ url('/contact-us') }}"
                            class="btn
                                   btn-pn-outline"
                        >

                            Contact Us

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Ticket --}}

            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           h-100"
                >

                    <div
                        class="card-body
                               p-4
                               text-center"
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
                            style="width:60px;height:60px;"
                        >

                            <i
                                class="bi bi-ticket-perforated fs-5"
                            ></i>

                        </div>


                        <h3
                            class="font-serif
                                   h4
                                   text-pn-brown"
                        >
                            Raise a Ticket
                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-4"
                        >

                            Raise a support ticket when your issue
                            requires tracking and follow-up.

                        </p>


                        <a
                            href="#"
                            class="btn
                                   btn-pn-outline"
                        >

                            Raise Ticket

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- My Tickets --}}

            <div class="col">

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           h-100"
                >

                    <div
                        class="card-body
                               p-4
                               text-center"
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
                            style="width:60px;height:60px;"
                        >

                            <i
                                class="bi bi-list-check fs-5"
                            ></i>

                        </div>


                        <h3
                            class="font-serif
                                   h4
                                   text-pn-brown"
                        >
                            My Support Tickets
                        </h3>


                        <p
                            class="small
                                   text-secondary
                                   mb-4"
                        >

                            View the status and updates of your
                            existing support requests.

                        </p>


                        <a
                            href="#"
                            class="btn
                                   btn-pn-outline"
                        >

                            View Tickets

                            <i
                                class="bi bi-arrow-right ms-1"
                            ></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SUPPORT CTA
============================================================ --}}

<section
    class="bg-pn-beige
           py-5"
>

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
                            Customer Support
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-2"
                        >

                            Couldn't find what you're looking for?

                        </h2>


                        <p
                            class="text-white-50
                                   mb-0"
                        >

                            Our support team is ready to assist you
                            with your questions and service needs.

                        </p>

                    </div>


                    <div
                        class="col-12 col-lg-4
                               text-lg-end"
                    >

                        <a
                            href="{{ url('/contact-us') }}"
                            class="btn
                                   btn-warning
                                   text-dark
                                   fw-semibold
                                   px-4"
                        >

                            Contact Support

                            <i
                                class="bi bi-arrow-right ms-2"
                            ></i>

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
            'helpSearch'
        );


    const clearButton =
        document.getElementById(
            'clearHelpSearch'
        );


    const categoryCards =
        document.querySelectorAll(
            '.help-category-card'
        );


    const faqItems =
        document.querySelectorAll(
            '.help-faq-item'
        );


    const emptyState =
        document.getElementById(
            'helpEmptyState'
        );


    /*
    |--------------------------------------------------------------------------
    | Search Help Center
    |--------------------------------------------------------------------------
    */

    function searchHelp() {

        const search =
            (
                searchInput?.value
                || ''
            )
                .trim()
                .toLowerCase();


        let visibleCount =
            0;


        /*
        |--------------------------------------------------------------------------
        | Category Cards
        |--------------------------------------------------------------------------
        */

        categoryCards.forEach(
            function (card) {

                const content =
                    card.dataset.search
                    || '';


                const visible =
                    !search
                    ||
                    content.includes(
                        search
                    );


                card.classList.toggle(
                    'd-none',
                    !visible
                );


                if (visible) {

                    visibleCount++;

                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | FAQ Items
        |--------------------------------------------------------------------------
        */

        faqItems.forEach(
            function (item) {

                const content =
                    item.dataset.search
                    || '';


                const visible =
                    !search
                    ||
                    content.includes(
                        search
                    );


                item.classList.toggle(
                    'd-none',
                    !visible
                );


                if (
                    search
                    &&
                    visible
                ) {

                    visibleCount++;

                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | Clear Button
        |--------------------------------------------------------------------------
        */

        clearButton?.classList.toggle(
            'd-none',
            !search
        );


        /*
        |--------------------------------------------------------------------------
        | Empty State
        |--------------------------------------------------------------------------
        */

        emptyState?.classList.toggle(
            'd-none',
            visibleCount !== 0
        );

    }


    searchInput?.addEventListener(
        'input',
        searchHelp
    );


    /*
    |--------------------------------------------------------------------------
    | Clear Search
    |--------------------------------------------------------------------------
    */

    clearButton?.addEventListener(
        'click',
        function () {

            if (searchInput) {

                searchInput.value = '';

                searchInput.focus();

            }


            searchHelp();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Category Selection
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(
            '.help-category-button'
        )
        .forEach(
            function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        const category =
                            this.dataset.category
                            || '';


                        if (searchInput) {

                            searchInput.value =
                                category;

                        }


                        searchHelp();


                        const faqSection =
                            document.getElementById(
                                'helpFaqAccordion'
                            );


                        faqSection?.scrollIntoView({

                            behavior: 'smooth',

                            block: 'start'

                        });

                    }
                );

            }
        );

});
</script>

@endpush

@endsection