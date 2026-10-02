@extends('layouts.app')

@section('title', 'Blog | Pooja Nilayam')

@section(
    'meta_description',
    'Explore devotional stories, pooja guides, temple traditions, festivals and spiritual insights from Pooja Nilayam.'
)

@section('content')




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
                    Blog
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     BLOG HERO
============================================================ --}}

<section
    class="bg-pn-cream
           position-relative
           overflow-hidden"
>

    <div class="container py-5 py-lg-6">

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
                    Wisdom & Inspiration
                </span>


                <h1
                    class="font-serif
                           display-4
                           text-pn-brown
                           mt-2
                           mb-3"
                >
                    Stories for Your
                    <span class="text-pn-primary">
                        Spiritual Journey
                    </span>
                </h1>


                <p
                    class="lead
                           text-secondary
                           mb-0
                           mx-auto"
                >

                    Explore pooja traditions, temple stories,
                    festivals, devotional practices and spiritual
                    insights.

                </p>

            </div>

        </div>

    </div>

</section>


@if($featuredPost)

{{-- ============================================================
     FEATURED ARTICLE
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div
            class="d-flex
                   align-items-center
                   justify-content-between
                   mb-4"
        >

            <div>

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Featured
                </span>


                <h2
                    class="font-serif
                           h2
                           text-pn-brown
                           mt-1
                           mb-0"
                >
                    Featured Story
                </h2>

            </div>

        </div>


        <article
            class="card
                   border
                   border-warning-subtle
                   rounded-5
                   overflow-hidden"
        >

            <div class="row g-0">

                {{-- Featured Image --}}

                <div class="col-12 col-lg-6">

                    <div
                        class="ratio ratio-4x3
                               bg-pn-cream"
                    >

                        @if(
                            $featuredPost['image']
                        )

                            <img
                                src="{{ $featuredPost['image'] }}"
                                class="w-100
                                       h-100
                                       object-fit-cover"
                                alt="{{ $featuredPost['title'] }}"
                                loading="lazy"
                            >

                        @else

                            <div
                                class="d-flex
                                       align-items-center
                                       justify-content-center
                                       text-pn-primary"
                            >

                                <div
                                    class="text-center"
                                >

                                    <i
                                        class="bi bi-journal-richtext"
                                        style="font-size:5rem;"
                                    ></i>


                                    <span
                                        class="d-block
                                               small
                                               text-secondary
                                               mt-2"
                                    >
                                        Featured Article
                                    </span>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- Featured Content --}}

                <div
                    class="col-12 col-lg-6
                           d-flex"
                >

                    <div
                        class="card-body
                               p-4
                               p-md-5
                               d-flex
                               flex-column
                               justify-content-center"
                    >

                        <span
                            class="badge
                                   bg-pn-cream
                                   text-pn-primary
                                   rounded-pill
                                   align-self-start
                                   px-3
                                   py-2
                                   mb-3"
                        >

                            {{ $featuredPost['category'] }}

                        </span>


                        <h3
                            class="font-serif
                                   display-6
                                   text-pn-brown
                                   mb-3"
                        >

                            {{ $featuredPost['title'] }}

                        </h3>


                        <p
                            class="text-secondary
                                   mb-4"
                        >

                            {{ $featuredPost['excerpt'] }}

                        </p>


                        <div
                            class="d-flex
                                   flex-wrap
                                   align-items-center
                                   gap-3
                                   small
                                   text-secondary
                                   mb-4"
                        >

                            <span>

                                <i
                                    class="bi bi-calendar3
                                           text-pn-primary
                                           me-1"
                                ></i>

                                {{ $featuredPost['date'] }}

                            </span>


                            <span>

                                <i
                                    class="bi bi-clock
                                           text-pn-primary
                                           me-1"
                                ></i>

                                {{ $featuredPost['read_time'] }}

                            </span>

                        </div>


                        <a
                            href="{{ url(
                                '/blog/' . $featuredPost['slug']
                            ) }}"
                            class="btn btn-pn align-self-start"
                        >

                            Read Story

                            <i
                                class="bi bi-arrow-right ms-2"
                            ></i>

                        </a>

                    </div>

                </div>

            </div>

        </article>

    </div>

</section>

@endif


{{-- ============================================================
     BLOG LISTING
============================================================ --}}

<section
    class="bg-pn-beige
           py-5"
>

    <div class="container">

        {{-- Section Header --}}

        <div
            class="row
                   align-items-end
                   g-4
                   mb-4"
        >

            <div class="col-12 col-lg-7">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Latest Articles
                </span>


                <h2
                    class="font-serif
                           display-6
                           text-pn-brown
                           mt-2
                           mb-2"
                >
                    Explore Our Stories
                </h2>


                <div class="pn-divider"></div>

            </div>


            <div class="col-12 col-lg-5">

                <div
                    class="input-group"
                >

                    <span
                        class="input-group-text
                               bg-white"
                    >

                        <i
                            class="bi bi-search
                                   text-pn-primary"
                        ></i>

                    </span>


                    <input
                        type="search"
                        id="blogSearch"
                        class="form-control"
                        placeholder="Search articles..."
                        autocomplete="off"
                    >

                </div>

            </div>

        </div>


        {{-- Category Filter --}}

        <div
            class="d-flex
                   gap-2
                   overflow-auto
                   pb-2
                   mb-4"
            id="blogCategories"
        >

            @foreach(
                $categories as $category
            )

                <button
                    type="button"
                    class="btn
                           btn-sm
                           rounded-pill
                           px-3
                           text-nowrap
                           blog-category-filter
                           {{ $loop->first
                               ? 'btn-pn'
                               : 'btn-outline-secondary'
                           }}"
                    data-category="{{ strtolower($category) }}"
                >

                    {{ $category }}

                </button>

            @endforeach

        </div>


        {{-- Blog Grid --}}

        <div
            id="blogGrid"
            class="row
                   row-cols-1
                   row-cols-sm-2
                   row-cols-xl-3
                   g-4"
        >

            @foreach(
                $posts as $post
            )

                <div
                    class="col blog-card-wrapper"
                    data-category="{{ strtolower($post['category']) }}"
                    data-search="{{ strtolower(
                        $post['title']
                        . ' '
                        . $post['excerpt']
                        . ' '
                        . $post['category']
                    ) }}"
                >

                    <article
                        class="card
                               blog-card
                               border
                               border-warning-subtle
                               rounded-5
                               overflow-hidden
                               h-100"
                    >

                        {{-- Image --}}

                        <div
                            class="position-relative
                                   bg-pn-cream"
                        >

                            <div
                                class="ratio ratio-16x10"
                            >

                                @if(
                                    $post['image']
                                )

                                    <img
                                        src="{{ $post['image'] }}"
                                        class="w-100
                                               h-100
                                               object-fit-cover"
                                        alt="{{ $post['title'] }}"
                                        loading="lazy"
                                    >

                                @else

                                    <div
                                        class="d-flex
                                               align-items-center
                                               justify-content-center
                                               text-pn-primary"
                                    >

                                        <div
                                            class="text-center"
                                        >

                                            <i
                                                class="bi bi-journal-text"
                                                style="font-size:3.5rem;"
                                            ></i>

                                            <small
                                                class="d-block
                                                       text-secondary
                                                       mt-2"
                                            >
                                                Blog Image
                                            </small>

                                        </div>

                                    </div>

                                @endif

                            </div>


                            <span
                                class="position-absolute
                                       top-0
                                       start-0
                                       badge
                                       bg-white
                                       text-pn-primary
                                       rounded-pill
                                       m-3
                                       px-3
                                       py-2"
                            >

                                {{ $post['category'] }}

                            </span>

                        </div>


                        {{-- Content --}}

                        <div
                            class="card-body
                                   p-4
                                   d-flex
                                   flex-column"
                        >

                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3
                                       small
                                       text-secondary
                                       mb-3"
                            >

                                <span>

                                    <i
                                        class="bi bi-calendar3
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    {{ $post['date'] }}

                                </span>


                                <span>

                                    <i
                                        class="bi bi-clock
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    {{ $post['read_time'] }}

                                </span>

                            </div>


                            <h3
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mb-3"
                            >

                                <a
                                    href="{{ url(
                                        '/blog/' . $post['slug']
                                    ) }}"
                                    class="text-decoration-none
                                           text-pn-brown"
                                >

                                    {{ $post['title'] }}

                                </a>

                            </h3>


                            <p
                                class="small
                                       text-secondary
                                       mb-4"
                            >

                                {{ $post['excerpt'] }}

                            </p>


                            <div
                                class="mt-auto
                                       d-flex
                                       align-items-center
                                       justify-content-between
                                       gap-3"
                            >

                                <small
                                    class="text-secondary"
                                >

                                    <i
                                        class="bi bi-person
                                               text-pn-primary
                                               me-1"
                                    ></i>

                                    {{ $post['author'] }}

                                </small>


                                <a
                                    href="{{ url(
                                        '/blog/' . $post['slug']
                                    ) }}"
                                    class="btn
                                           btn-sm
                                           btn-pn-outline"
                                >

                                    Read More

                                    <i
                                        class="bi bi-arrow-right ms-1"
                                    ></i>

                                </a>

                            </div>

                        </div>

                    </article>

                </div>

            @endforeach

        </div>


        {{-- Empty Search State --}}

        <div
            id="blogEmptyState"
            class="d-none
                   border
                   border-warning-subtle
                   rounded-5
                   bg-white
                   p-5
                   text-center
                   mt-4"
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
                style="width:76px;height:76px;"
            >

                <i
                    class="bi bi-search
                           fs-3"
                ></i>

            </div>


            <h3
                class="font-serif
                       h3
                       text-pn-brown"
            >
                No Articles Found
            </h3>


            <p
                class="text-secondary
                       mb-0"
            >

                Try another search term or choose a different
                category.

            </p>

        </div>


        {{-- Pagination --}}

        <nav
            class="mt-5"
            aria-label="Blog pagination"
        >

            <ul
                class="pagination
                       justify-content-center
                       mb-0"
            >

                <li
                    class="page-item disabled"
                >

                    <span class="page-link">

                        <i
                            class="bi bi-chevron-left"
                        ></i>

                    </span>

                </li>


                <li
                    class="page-item active"
                    aria-current="page"
                >

                    <span class="page-link">
                        1
                    </span>

                </li>


                <li class="page-item">

                    <a
                        href="#"
                        class="page-link"
                    >
                        2
                    </a>

                </li>


                <li class="page-item">

                    <a
                        href="#"
                        class="page-link"
                    >
                        3
                    </a>

                </li>


                <li class="page-item">

                    <a
                        href="#"
                        class="page-link"
                    >

                        <i
                            class="bi bi-chevron-right"
                        ></i>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</section>


{{-- ============================================================
     NEWSLETTER CTA
============================================================ --}}

<section class="py-5">

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

                    <div class="col-12 col-lg-6">

                        <span
                            class="small
                                   text-warning
                                   fw-semibold
                                   text-uppercase"
                        >
                            Stay Inspired
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-2"
                        >

                            Receive meaningful stories
                            in your inbox.

                        </h2>


                        <p
                            class="text-white-50
                                   mb-0"
                        >

                            Get devotional insights, festival
                            updates and useful pooja guidance.

                        </p>

                    </div>


                    <div class="col-12 col-lg-6">

                        <form
                            class="row
                                   g-2"
                        >

                            <div class="col-12 col-sm">

                                <label
                                    for="blogNewsletterEmail"
                                    class="visually-hidden"
                                >
                                    Email address
                                </label>


                                <input
                                    type="email"
                                    id="blogNewsletterEmail"
                                    class="form-control
                                           form-control-lg"
                                    placeholder="Enter your email address"
                                    required
                                >

                            </div>


                            <div
                                class="col-12 col-sm-auto"
                            >

                                <button
                                    type="submit"
                                    class="btn
                                           btn-warning
                                           text-dark
                                           fw-semibold
                                           btn-lg
                                           w-100"
                                >

                                    Subscribe

                                </button>

                            </div>

                        </form>

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
            'blogSearch'
        );


    const categoryButtons =
        document.querySelectorAll(
            '.blog-category-filter'
        );


    const blogCards =
        document.querySelectorAll(
            '.blog-card-wrapper'
        );


    const emptyState =
        document.getElementById(
            'blogEmptyState'
        );


    let selectedCategory =
        'all';


    /*
    |--------------------------------------------------------------------------
    | Filter Blog Posts
    |--------------------------------------------------------------------------
    */

    function filterBlogs() {

        const search =
            (
                searchInput?.value
                || ''
            )
                .trim()
                .toLowerCase();


        let visibleCount =
            0;


        blogCards.forEach(
            function (card) {

                const category =
                    card.dataset.category
                    || '';


                const content =
                    card.dataset.search
                    || '';


                const matchesCategory =
                    selectedCategory === 'all'
                    ||
                    category === selectedCategory;


                const matchesSearch =
                    !search
                    ||
                    content.includes(
                        search
                    );


                const visible =
                    matchesCategory
                    &&
                    matchesSearch;


                card.classList.toggle(
                    'd-none',
                    !visible
                );


                if (visible) {

                    visibleCount++;

                }

            }
        );


        emptyState?.classList.toggle(
            'd-none',
            visibleCount !== 0
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    */

    searchInput?.addEventListener(
        'input',
        filterBlogs
    );


    /*
    |--------------------------------------------------------------------------
    | Category Filter
    |--------------------------------------------------------------------------
    */

    categoryButtons.forEach(
        function (button) {

            button.addEventListener(
                'click',
                function () {

                    selectedCategory =
                        this.dataset.category
                        || 'all';


                    categoryButtons.forEach(
                        function (item) {

                            item.classList.remove(
                                'btn-pn'
                            );


                            item.classList.add(
                                'btn-outline-secondary'
                            );

                        }
                    );


                    this.classList.remove(
                        'btn-outline-secondary'
                    );


                    this.classList.add(
                        'btn-pn'
                    );


                    filterBlogs();

                }
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Newsletter UI
    |--------------------------------------------------------------------------
    */

    const newsletterForm =
        document.querySelector(
            'form.row.g-2'
        );


    newsletterForm?.addEventListener(
        'submit',
        function (event) {

            event.preventDefault();


            const emailInput =
                document.getElementById(
                    'blogNewsletterEmail'
                );


            if (
                !emailInput
                ||
                !emailInput.checkValidity()
            ) {

                emailInput?.reportValidity();

                return;

            }


            const button =
                this.querySelector(
                    'button[type="submit"]'
                );


            const originalHTML =
                button?.innerHTML;


            if (button) {

                button.disabled =
                    true;


                button.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span>' +
                    'Subscribed';

            }


            setTimeout(
                function () {

                    if (button) {

                        button.disabled =
                            false;

                        button.innerHTML =
                            originalHTML;

                    }


                    emailInput.value = '';

                },
                800
            );

        }
    );

});
</script>

@endpush

@endsection