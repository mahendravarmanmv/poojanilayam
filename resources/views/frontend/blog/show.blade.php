@extends('layouts.app')

@section('title', 'The Sacred Meaning Behind Ganapathi Pooja | Pooja Nilayam')

@section(
    'meta_description',
    'Discover the spiritual significance, traditions and devotional practices associated with Ganapathi Pooja.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY BLOG DATA
    |--------------------------------------------------------------------------
    | This will later come from the Blog / CMS database.
    |--------------------------------------------------------------------------
    */

    $post = [

        'title' =>
            'The Sacred Meaning Behind Ganapathi Pooja',

        'category' =>
            'Pooja & Rituals',

        'date' =>
            '08 August 2026',

        'author' =>
            'Pooja Nilayam',

        'read_time' =>
            '6 min read',

        'image' =>
            null,

        'excerpt' =>
            'Discover the spiritual significance of Ganapathi Pooja,
            its traditional practices and why devotees seek the
            blessings of Lord Ganesha before beginning new journeys.',

        'content' => [

            [
                'type' => 'paragraph',
                'text' =>
                    'Ganapathi Pooja is one of the most widely observed
                    devotional practices dedicated to Lord Ganesha.
                    Revered as the remover of obstacles and the
                    embodiment of wisdom, Lord Ganesha is traditionally
                    invoked before important beginnings and auspicious
                    occasions.'
            ],

            [
                'type' => 'heading',
                'text' =>
                    'Why Ganapathi Pooja is Considered Auspicious'
            ],

            [
                'type' => 'paragraph',
                'text' =>
                    'Devotees perform Ganapathi Pooja with the intention
                    of beginning an important activity with clarity,
                    devotion and positive intent. The ritual creates
                    a sacred space where prayers, offerings and
                    meditation come together.'
            ],

            [
                'type' => 'quote',
                'text' =>
                    'A sacred beginning is not only about seeking
                    success, but also about beginning with faith,
                    clarity and gratitude.'
            ],

            [
                'type' => 'heading',
                'text' =>
                    'Preparing for the Pooja'
            ],

            [
                'type' => 'paragraph',
                'text' =>
                    'Preparation generally includes cleaning the
                    worship space, arranging the required pooja
                    materials and creating a calm devotional
                    environment. The exact practices may vary
                    according to family traditions, regional customs
                    and the nature of the occasion.'
            ],

            [
                'type' => 'heading',
                'text' =>
                    'The Spiritual Meaning of Offerings'
            ],

            [
                'type' => 'paragraph',
                'text' =>
                    'Offerings made during worship are traditionally
                    treated as expressions of gratitude and devotion.
                    Each offering can become an opportunity to focus
                    the mind and approach the ritual with sincerity.'
            ],

            [
                'type' => 'paragraph',
                'text' =>
                    'Rather than viewing the ritual only as a sequence
                    of activities, devotees can use the occasion to
                    cultivate patience, humility, gratitude and
                    spiritual awareness.'
            ],

            [
                'type' => 'heading',
                'text' =>
                    'Beginning With Devotion'
            ],

            [
                'type' => 'paragraph',
                'text' =>
                    'The deeper purpose of a pooja is the devotional
                    connection created through prayer and intention.
                    Whether performed at home, at a temple or through
                    an arranged service, the experience can become a
                    meaningful part of a devotee’s spiritual journey.'
            ]

        ],

        'tags' => [
            'Ganapathi Pooja',
            'Pooja',
            'Lord Ganesha',
            'Devotion',
            'Pooja Rituals'
        ]

    ];


    $relatedPosts = [

        [
            'title' =>
                'How to Prepare for a Traditional Home Pooja',

            'category' =>
                'Pooja Guides',

            'date' =>
                '06 August 2026',

            'read_time' =>
                '5 min read',

            'image' =>
                null,

            'slug' =>
                'how-to-prepare-for-home-pooja'
        ],

        [
            'title' =>
                'Understanding the Importance of Prasadam',

            'category' =>
                'Traditions',

            'date' =>
                '04 August 2026',

            'read_time' =>
                '4 min read',

            'image' =>
                null,

            'slug' =>
                'importance-of-prasadam'
        ],

        [
            'title' =>
                'The Significance of Lighting a Diya',

            'category' =>
                'Traditions',

            'date' =>
                '28 July 2026',

            'read_time' =>
                '4 min read',

            'image' =>
                null,

            'slug' =>
                'significance-of-lighting-diya'
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
                        href="{{ url('/') }}"
                        class="text-pn-primary"
                    >
                        Home
                    </a>

                </li>


                <li class="breadcrumb-item">

                    <a
                        href="{{ url('/blog') }}"
                        class="text-pn-primary"
                    >
                        Blog
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    {{ $post['category'] }}
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     ARTICLE HEADER
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-xl-9">

                <div class="text-center">

                    {{-- Category --}}

                    <span
                        class="badge
                               bg-pn-primary
                               rounded-pill
                               px-3
                               py-2
                               mb-3"
                    >

                        {{ $post['category'] }}

                    </span>


                    {{-- Title --}}

                    <h1
                        class="font-serif
                               display-4
                               text-pn-brown
                               mb-4"
                    >

                        {{ $post['title'] }}

                    </h1>


                    {{-- Meta --}}

                    <div
                        class="d-flex
                               flex-wrap
                               justify-content-center
                               align-items-center
                               gap-3
                               small
                               text-secondary"
                    >

                        <span>

                            <i
                                class="bi bi-person
                                       text-pn-primary
                                       me-1"
                            ></i>

                            {{ $post['author'] }}

                        </span>


                        <span
                            class="text-pn-gold"
                        >
                            •
                        </span>


                        <span>

                            <i
                                class="bi bi-calendar3
                                       text-pn-primary
                                       me-1"
                            ></i>

                            {{ $post['date'] }}

                        </span>


                        <span
                            class="text-pn-gold"
                        >
                            •
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

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     FEATURE IMAGE
============================================================ --}}

<section class="pb-5 bg-pn-cream">

    <div class="container">

        <div
            class="row
                   justify-content-center"
        >

            <div class="col-12 col-xl-10">

                <div
                    class="card
                           border-0
                           rounded-5
                           overflow-hidden
                           shadow-sm"
                >

                    <div
                        class="ratio ratio-16x9
                               bg-pn-beige"
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
                                        style="font-size:6rem;"
                                    ></i>


                                    <span
                                        class="d-block
                                               text-secondary
                                               mt-2"
                                    >
                                        Article Cover Image
                                    </span>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     ARTICLE CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-5">


            {{-- ====================================================
                 MAIN ARTICLE
            ===================================================== --}}

            <div class="col-12 col-lg-8">

                {{-- Introduction --}}

                <div
                    class="lead
                           text-secondary
                           lh-lg
                           mb-5"
                >

                    {{ $post['excerpt'] }}

                </div>


                {{-- Article Content --}}

                <article
                    class="blog-article"
                >

                    @foreach(
                        $post['content'] as $section
                    )

                        @if(
                            $section['type'] === 'paragraph'
                        )

                            <p
                                class="text-secondary
                                       lh-lg
                                       mb-4"
                            >

                                {{ $section['text'] }}

                            </p>


                        @elseif(
                            $section['type'] === 'heading'
                        )

                            <h2
                                class="font-serif
                                       h2
                                       text-pn-brown
                                       mt-5
                                       mb-3"
                            >

                                {{ $section['text'] }}

                            </h2>


                        @elseif(
                            $section['type'] === 'quote'
                        )

                            <blockquote
                                class="border-start
                                       border-4
                                       border-warning
                                       bg-pn-cream
                                       rounded-end-4
                                       p-4
                                       my-5"
                            >

                                <div
                                    class="d-flex
                                           align-items-start
                                           gap-3"
                                >

                                    <i
                                        class="bi bi-quote
                                               text-pn-gold
                                               fs-2"
                                    ></i>


                                    <p
                                        class="font-serif
                                               fs-5
                                               text-pn-brown
                                               fst-italic
                                               mb-0"
                                    >

                                        {{ $section['text'] }}

                                    </p>

                                </div>

                            </blockquote>

                        @endif

                    @endforeach

                </article>


                {{-- Divider --}}

                <hr
                    class="my-5
                           border-warning-subtle"
                >


                {{-- Tags --}}

                <div>

                    <div
                        class="d-flex
                               align-items-center
                               flex-wrap
                               gap-2"
                    >

                        <strong
                            class="small
                                   text-pn-brown
                                   me-2"
                        >
                            Tags:
                        </strong>


                        @foreach(
                            $post['tags'] as $tag
                        )

                            <a
                                href="#"
                                class="badge
                                       bg-pn-cream
                                       text-pn-primary
                                       text-decoration-none
                                       rounded-pill
                                       px-3
                                       py-2"
                            >

                                #{{ $tag }}

                            </a>

                        @endforeach

                    </div>

                </div>


                {{-- Share --}}

                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           align-items-sm-center
                           justify-content-between
                           gap-3
                           border
                           border-warning-subtle
                           rounded-5
                           p-4
                           mt-5"
                >

                    <div>

                        <strong
                            class="d-block
                                   text-pn-brown
                                   mb-1"
                        >
                            Found this helpful?
                        </strong>


                        <small
                            class="text-secondary"
                        >
                            Share this article with someone
                            who may find it meaningful.
                        </small>

                    </div>


                    <div
                        class="d-flex
                               gap-2"
                    >

                        <button
                            type="button"
                            class="btn
                                   btn-light
                                   border
                                   rounded-circle
                                   share-button"
                            data-platform="facebook"
                            aria-label="Share on Facebook"
                        >

                            <i
                                class="bi bi-facebook"
                            ></i>

                        </button>


                        <button
                            type="button"
                            class="btn
                                   btn-light
                                   border
                                   rounded-circle
                                   share-button"
                            data-platform="whatsapp"
                            aria-label="Share on WhatsApp"
                        >

                            <i
                                class="bi bi-whatsapp"
                            ></i>

                        </button>


                        <button
                            type="button"
                            class="btn
                                   btn-light
                                   border
                                   rounded-circle
                                   share-button"
                            data-platform="copy"
                            aria-label="Copy article link"
                        >

                            <i
                                class="bi bi-link-45deg"
                            ></i>

                        </button>

                    </div>

                </div>


                {{-- Author --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mt-5"
                >

                    <div
                        class="card-body
                               p-4
                               p-md-5"
                    >

                        <div
                            class="d-flex
                                   align-items-start
                                   gap-3"
                        >

                            <div
                                class="rounded-circle
                                       bg-pn-primary
                                       text-white
                                       d-flex
                                       align-items-center
                                       justify-content-center
                                       flex-shrink-0"
                                style="width:60px;height:60px;"
                            >

                                <i
                                    class="bi bi-flower1 fs-4"
                                ></i>

                            </div>


                            <div>

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Written By
                                </span>


                                <h2
                                    class="font-serif
                                           h4
                                           text-pn-brown
                                           mt-1
                                           mb-2"
                                >
                                    {{ $post['author'] }}
                                </h2>


                                <p
                                    class="small
                                           text-secondary
                                           mb-0"
                                >

                                    Sharing devotional knowledge,
                                    pooja guidance and meaningful
                                    spiritual insights for the
                                    Pooja Nilayam community.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                 SIDEBAR
            ===================================================== --}}

            <div class="col-12 col-lg-4">

                <div
                    class="position-sticky"
                    style="top:100px;"
                >


                    {{-- Article Summary --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               mb-4"
                    >

                        <div
                            class="card-body
                                   p-4"
                        >

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >
                                Article
                            </span>


                            <h2
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mt-1
                                       mb-3"
                            >
                                At a Glance
                            </h2>


                            <div
                                class="vstack
                                       gap-3"
                            >

                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3"
                                >

                                    <span
                                        class="small
                                               text-secondary"
                                    >
                                        Category
                                    </span>


                                    <strong
                                        class="small
                                               text-pn-brown
                                               text-end"
                                    >
                                        {{ $post['category'] }}
                                    </strong>

                                </div>


                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3"
                                >

                                    <span
                                        class="small
                                               text-secondary"
                                    >
                                        Published
                                    </span>


                                    <strong
                                        class="small
                                               text-pn-brown
                                               text-end"
                                    >
                                        {{ $post['date'] }}
                                    </strong>

                                </div>


                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3"
                                >

                                    <span
                                        class="small
                                               text-secondary"
                                    >
                                        Reading Time
                                    </span>


                                    <strong
                                        class="small
                                               text-pn-brown
                                               text-end"
                                    >
                                        {{ $post['read_time'] }}
                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Related Articles --}}

                    <div
                        class="card
                               border
                               border-warning-subtle
                               rounded-5
                               mb-4"
                    >

                        <div class="card-body p-4">

                            <span
                                class="small
                                       text-pn-gold
                                       fw-semibold
                                       text-uppercase"
                            >
                                Continue Reading
                            </span>


                            <h2
                                class="font-serif
                                       h4
                                       text-pn-brown
                                       mt-1
                                       mb-4"
                            >
                                Related Articles
                            </h2>


                            <div class="vstack gap-3">

                                @foreach(
                                    $relatedPosts as $related
                                )

                                    <article
                                        class="d-flex
                                               align-items-start
                                               gap-3"
                                    >

                                        <div
                                            class="rounded-4
                                                   bg-pn-cream
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   flex-shrink-0"
                                            style="width:72px;height:72px;"
                                        >

                                            <i
                                                class="bi bi-journal-text
                                                       text-pn-primary
                                                       fs-4"
                                            ></i>

                                        </div>


                                        <div>

                                            <small
                                                class="text-pn-gold
                                                       fw-semibold"
                                            >

                                                {{ $related['category'] }}

                                            </small>


                                            <h3
                                                class="h6
                                                       text-pn-brown
                                                       mt-1
                                                       mb-1"
                                            >

                                                <a
                                                    href="{{ url(
                                                        '/blog/'
                                                        . $related['slug']
                                                    ) }}"
                                                    class="text-decoration-none
                                                           text-pn-brown"
                                                >

                                                    {{ $related['title'] }}

                                                </a>

                                            </h3>


                                            <small
                                                class="text-secondary"
                                            >

                                                {{ $related['date'] }}

                                                ·

                                                {{ $related['read_time'] }}

                                            </small>

                                        </div>

                                    </article>

                                @endforeach

                            </div>


                            <a
                                href="{{ url('/blog') }}"
                                class="btn
                                       btn-pn-outline
                                       w-100
                                       mt-4"
                            >

                                View All Articles

                                <i
                                    class="bi bi-arrow-right ms-1"
                                ></i>

                            </a>

                        </div>

                    </div>


                    {{-- Newsletter --}}

                    <div
                        class="pn-digital
                               rounded-5
                               overflow-hidden
                               text-white"
                    >

                        <div class="p-4">

                            <i
                                class="bi bi-envelope-heart
                                       text-warning
                                       fs-3"
                            ></i>


                            <h2
                                class="font-serif
                                       h4
                                       mt-3
                                       mb-2"
                            >
                                Stay Inspired
                            </h2>


                            <p
                                class="small
                                       text-white-50"
                            >

                                Receive devotional stories,
                                pooja guidance and festival
                                updates.

                            </p>


                            <form
                                id="articleNewsletterForm"
                            >

                                <label
                                    for="articleNewsletterEmail"
                                    class="visually-hidden"
                                >
                                    Email address
                                </label>


                                <input
                                    type="email"
                                    id="articleNewsletterEmail"
                                    class="form-control
                                           mb-2"
                                    placeholder="Email address"
                                    required
                                >


                                <button
                                    type="submit"
                                    class="btn
                                           btn-warning
                                           text-dark
                                           fw-semibold
                                           w-100"
                                >
                                    Subscribe
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     BACK TO BLOG
============================================================ --}}

<section
    class="bg-pn-beige
           py-5"
>

    <div class="container">

        <div
            class="text-center"
        >

            <span
                class="small
                       text-pn-gold
                       fw-semibold
                       text-uppercase"
            >
                More Stories
            </span>


            <h2
                class="font-serif
                       display-6
                       text-pn-brown
                       mt-2
                       mb-3"
            >
                Continue Your Journey
            </h2>


            <p
                class="text-secondary
                       mb-4"
            >

                Explore more devotional stories and spiritual
                insights from Pooja Nilayam.

            </p>


            <a
                href="{{ url('/blog') }}"
                class="btn btn-pn"
            >

                <i
                    class="bi bi-arrow-left me-2"
                ></i>

                Back to Blog

            </a>

        </div>

    </div>

</section>


{{-- ============================================================
     PAGE SCRIPT
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Social / Link Sharing
    |--------------------------------------------------------------------------
    */

    const shareButtons =
        document.querySelectorAll(
            '.share-button'
        );


    shareButtons.forEach(
        function (button) {

            button.addEventListener(
                'click',
                async function () {

                    const platform =
                        this.dataset.platform;


                    const pageUrl =
                        window.location.href;


                    const title =
                        document.title;


                    /*
                    |--------------------------------------------------------------------------
                    | Native Share
                    |--------------------------------------------------------------------------
                    */

                    if (
                        platform !== 'copy'
                        &&
                        navigator.share
                    ) {

                        try {

                            await navigator.share({

                                title: title,

                                url: pageUrl

                            });

                            return;

                        } catch (error) {

                            /*
                            |--------------------------------------------------------------------------
                            | User cancelled share.
                            |--------------------------------------------------------------------------
                            */

                        }

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | WhatsApp
                    |--------------------------------------------------------------------------
                    */

                    if (
                        platform === 'whatsapp'
                    ) {

                        const whatsappUrl =
                            'https://wa.me/?text='
                            +
                            encodeURIComponent(
                                title
                                +
                                ' '
                                +
                                pageUrl
                            );


                        window.open(
                            whatsappUrl,
                            '_blank',
                            'noopener,noreferrer'
                        );


                        return;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Copy Link
                    |--------------------------------------------------------------------------
                    */

                    if (
                        platform === 'copy'
                    ) {

                        try {

                            await navigator.clipboard.writeText(
                                pageUrl
                            );


                            const originalHTML =
                                this.innerHTML;


                            this.innerHTML =
                                '<i class="bi bi-check-lg"></i>';


                            setTimeout(
                                function () {

                                    button.innerHTML =
                                        originalHTML;

                                },
                                1200
                            );

                        } catch (error) {

                            /*
                            |--------------------------------------------------------------------------
                            | Clipboard unavailable.
                            |--------------------------------------------------------------------------
                            */

                        }


                        return;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Facebook
                    |--------------------------------------------------------------------------
                    */

                    if (
                        platform === 'facebook'
                    ) {

                        const facebookUrl =
                            'https://www.facebook.com/sharer/sharer.php?u='
                            +
                            encodeURIComponent(
                                pageUrl
                            );


                        window.open(
                            facebookUrl,
                            '_blank',
                            'noopener,noreferrer'
                        );

                    }

                }
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Newsletter
    |--------------------------------------------------------------------------
    */

    const newsletterForm =
        document.getElementById(
            'articleNewsletterForm'
        );


    newsletterForm?.addEventListener(
        'submit',
        function (event) {

            event.preventDefault();


            const email =
                document.getElementById(
                    'articleNewsletterEmail'
                );


            if (
                !email
                ||
                !email.checkValidity()
            ) {

                email?.reportValidity();

                return;

            }


            const button =
                this.querySelector(
                    'button[type="submit"]'
                );


            const originalHTML =
                button.innerHTML;


            button.disabled =
                true;


            button.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Subscribed';


            setTimeout(
                function () {

                    button.disabled =
                        false;


                    button.innerHTML =
                        originalHTML;


                    email.value = '';

                },
                800
            );

        }
    );

});
</script>

@endpush

@endsection