@extends('layouts.app')

@section('title', 'Search Results | Pooja Nilayam')

@section(
    'meta_description',
    'Search Pooja Nilayam for poojas, temples, priests, digital pooja, astrology services, products, donations and spiritual content.'
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
                    Search Results
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     SEARCH HEADER
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="row
                   justify-content-center
                   text-center"
        >

            <div class="col-12 col-lg-9">

                <span
                    class="small
                           text-pn-gold
                           fw-semibold
                           text-uppercase"
                >
                    Search Pooja Nilayam
                </span>


                <h1
                    class="font-serif
                           display-5
                           text-pn-brown
                           mt-2
                           mb-4"
                >
                    Search Results
                </h1>


                {{-- Search Box --}}

                <form
                    id="globalSearchForm"
                    method="GET"
                    action="{{ route('search') }}"
                >

                    <div
                        class="input-group
                               input-group-lg
                               mx-auto"
                        style="max-width:800px;"
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
                            id="globalSearchInput"
                            name="q"
                            value="{{ $keyword }}"
                            class="form-control
                                   border-start-0"
                            placeholder="Search poojas, temples, priests, products..."
                            autocomplete="off"
                            aria-label="Search Pooja Nilayam"
                        >


                        <button
                            type="button"
                            id="clearSearch"
                            class="btn
                                   btn-light
                                   border
                                   {{ empty($keyword)
                                       ? 'd-none'
                                       : ''
                                   }}"
                            aria-label="Clear search"
                        >

                            <i
                                class="bi bi-x-lg"
                            ></i>

                        </button>


                        <button
                            type="submit"
                            class="btn btn-pn px-4"
                        >

                            Search

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     RESULTS SECTION
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4">


            {{-- ==================================================
                 FILTER SIDEBAR
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
                                   p-4"
                        >

                            <div
                                class="d-flex
                                       justify-content-between
                                       align-items-center
                                       mb-3"
                            >

                                <h2
                                    class="font-serif
                                           h5
                                           text-pn-brown
                                           mb-0"
                                >
                                    Filter Results
                                </h2>


                                <button
                                    type="button"
                                    id="clearFilters"
                                    class="btn
                                           btn-sm
                                           btn-link
                                           text-pn-primary
                                           p-0"
                                >
                                    Clear
                                </button>

                            </div>


                            <hr
                                class="border-warning-subtle"
                            >


                            <h3
                                class="small
                                       fw-semibold
                                       text-pn-brown
                                       mb-3"
                            >
                                Content Type
                            </h3>


                            <div
                                class="vstack
                                       gap-2"
                                id="searchFilters"
                            >

                                @foreach(
                                    $categories as $index => $category
                                )

                                    <div
                                        class="form-check"
                                    >

                                        <input
                                            type="radio"
                                            class="form-check-input search-type-filter"
                                            name="result_type"
                                            id="filter{{ $index }}"
                                            value="{{ strtolower($category) }}"
                                            {{ $index === 0
                                                ? 'checked'
                                                : ''
                                            }}
                                        >


                                        <label
                                            for="filter{{ $index }}"
                                            class="form-check-label
                                                   small"
                                        >

                                            {{ $category }}

                                        </label>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </div>


                    {{-- Helpful Search Tips --}}

                    <div
                        class="bg-pn-cream
                               rounded-5
                               p-4
                               mt-4"
                    >

                        <i
                            class="bi bi-lightbulb
                                   text-pn-primary
                                   fs-4"
                        ></i>


                        <h3
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >
                            Search Tips
                        </h3>


                        <ul
                            class="small
                                   text-secondary
                                   ps-3
                                   mb-0"
                        >

                            <li class="mb-2">
                                Try a specific pooja name.
                            </li>

                            <li class="mb-2">
                                Search by temple name.
                            </li>

                            <li class="mb-2">
                                Search for a service or product.
                            </li>

                            <li>
                                Try shorter keywords if needed.
                            </li>

                        </ul>

                    </div>

                </div>

            </div>


            {{-- ==================================================
                 RESULTS
            =================================================== --}}

            <div class="col-12 col-lg-9">

                {{-- Result Summary --}}

                <div
                    class="d-flex
                           flex-column
                           flex-sm-row
                           justify-content-between
                           align-items-sm-center
                           gap-3
                           mb-4"
                >

                    <div>

                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mb-1"
                        >

                            Results for
                            <span
                                class="text-pn-primary"
                                id="searchedKeyword"
                            >
                                "{{ $keyword }}"
                            </span>

                        </h2>


                        <p
                            class="small
                                   text-secondary
                                   mb-0"
                        >

                            <span id="resultCount">
                                {{ count($results) }}
                            </span>

                            results found

                        </p>

                    </div>


                    {{-- Sort --}}

                    <div
                        class="d-flex
                               align-items-center
                               gap-2"
                    >

                        <label
                            for="sortResults"
                            class="small
                                   text-secondary
                                   text-nowrap"
                        >
                            Sort by
                        </label>


                        <select
                            id="sortResults"
                            class="form-select
                                   form-select-sm"
                            style="width:auto;"
                        >

                            <option value="relevance">
                                Relevance
                            </option>

                            <option value="newest">
                                Newest
                            </option>

                            <option value="az">
                                A - Z
                            </option>

                        </select>

                    </div>

                </div>


                {{-- ==================================================
                     RESULT CARDS
                =================================================== --}}

                <div
                    id="searchResults"
                    class="vstack
                           gap-3"
                >

                    @foreach(
                        $results as $index => $result
                    )

                        <article
                            class="card
                                   border
                                   border-warning-subtle
                                   rounded-5
                                   search-result-card"
                            data-type="{{ strtolower(
                                $result['type']
                            ) }}"
                            data-title="{{ strtolower(
                                $result['title']
                            ) }}"
                            data-index="{{ $index }}"
                            data-date="{{ $result['date'] ?? 0 }}"
                        >

                            <div
                                class="card-body
                                       p-4"
                            >

                                <div
                                    class="d-flex
                                           align-items-start
                                           gap-3"
                                >

                                    {{-- Icon --}}

                                    <div
                                        class="rounded-4
                                               bg-pn-cream
                                               text-pn-primary
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               flex-shrink-0"
                                        style="width:58px;height:58px;"
                                    >

                                        <i
                                            class="bi {{ $result['icon'] }}
                                                   fs-5"
                                        ></i>

                                    </div>


                                    {{-- Content --}}

                                    <div
                                        class="flex-grow-1
                                               min-w-0"
                                    >

                                        <div
                                            class="d-flex
                                                   flex-wrap
                                                   align-items-center
                                                   gap-2
                                                   mb-2"
                                        >

                                            <span
                                                class="badge
                                                       bg-pn-cream
                                                       text-pn-primary
                                                       rounded-pill"
                                            >

                                                {{ $result['type'] }}

                                            </span>

                                        </div>


                                        <h3
                                            class="font-serif
                                                   h5
                                                   text-pn-brown
                                                   mb-2"
                                        >

                                            <a
                                                href="{{ $result['url'] }}"
                                                class="text-decoration-none
                                                       text-pn-brown"
                                            >

                                                {{ $result['title'] }}

                                            </a>

                                        </h3>


                                        <p
                                            class="small
                                                   text-secondary
                                                   mb-3"
                                        >

                                            {{ $result['description'] }}

                                        </p>


                                        <a
                                            href="{{ $result['url'] }}"
                                            class="small
                                                   fw-semibold
                                                   text-pn-primary
                                                   text-decoration-none"
                                        >

                                            View Details

                                            <i
                                                class="bi bi-arrow-right ms-1"
                                            ></i>

                                        </a>

                                    </div>


                                    {{-- Arrow --}}

                                    <div
                                        class="d-none
                                               d-sm-flex
                                               align-items-center"
                                    >

                                        <i
                                            class="bi bi-chevron-right
                                                   text-secondary"
                                        ></i>

                                    </div>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>


                {{-- ==================================================
                     EMPTY STATE
                =================================================== --}}

                <div
                    id="searchEmptyState"
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
                        style="width:82px;height:82px;"
                    >

                        <i
                            class="bi bi-search
                                   fs-2"
                        ></i>

                    </div>


                    <h2
                        class="font-serif
                               h3
                               text-pn-brown
                               mb-2"
                    >
                        No Results Found
                    </h2>


                    <p
                        class="text-secondary
                               mx-auto
                               mb-4"
                        style="max-width:520px;"
                    >

                        We couldn't find anything matching your
                        search. Try another keyword or browse one
                        of our main categories.

                    </p>


                    <a
                        href="{{ route('home') }}"
                        class="btn btn-pn"
                    >

                        Explore Pooja Nilayam

                        <i
                            class="bi bi-arrow-right ms-1"
                        ></i>

                    </a>

                </div>


                {{-- ==================================================
                     PAGINATION
                =================================================== --}}

                <nav
                    id="searchPagination"
                    class="mt-5"
                    aria-label="Search result pages"
                >

                    <ul
                        id="searchPaginationList"
                        class="pagination
                               justify-content-center
                               mb-0"
                    ></ul>

                </nav>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     SEARCH CTA
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
                            Discover More
                        </span>


                        <h2
                            class="font-serif
                                   display-6
                                   mt-2
                                   mb-2"
                        >

                            Explore the Spiritual World of
                            Pooja Nilayam

                        </h2>


                        <p
                            class="text-white-50
                                   mb-0"
                        >

                            Discover poojas, temples, priests,
                            digital pooja, astrology services,
                            products and devotional content.

                        </p>

                    </div>


                    <div
                        class="col-12 col-lg-4
                               text-lg-end"
                    >

                        <a
                            href="{{ route('home') }}"
                            class="btn
                                   btn-warning
                                   text-dark
                                   fw-semibold
                                   px-4"
                        >

                            Explore Now

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

    const searchInput = document.getElementById('globalSearchInput');
    const clearSearch = document.getElementById('clearSearch');
    const resultCards = Array.from(document.querySelectorAll('.search-result-card'));
    const filterInputs = document.querySelectorAll('.search-type-filter');
    const clearFilters = document.getElementById('clearFilters');
    const resultCount = document.getElementById('resultCount');
    const emptyState = document.getElementById('searchEmptyState');
    const resultsContainer = document.getElementById('searchResults');
    const pagination = document.getElementById('searchPagination');
    const paginationList = document.getElementById('searchPaginationList');
    const sortResults = document.getElementById('sortResults');
    const pageSize = 8;
    let currentPage = 1;

    function filteredCards() {
        const selectedFilter =
            document.querySelector('.search-type-filter:checked')?.value || 'all';

        return resultCards.filter(function (card) {
            const type = (card.dataset.type || '').toLowerCase();
            return selectedFilter === 'all' || type === selectedFilter;
        });
    }

    function renderPagination(totalItems) {
        if (!pagination || !paginationList) {
            return;
        }

        const totalPages = Math.ceil(totalItems / pageSize);
        paginationList.innerHTML = '';

        if (totalPages <= 1) {
            pagination.classList.add('d-none');
            return;
        }

        pagination.classList.remove('d-none');

        const addButton = function (label, page, disabled, active) {
            const item = document.createElement('li');
            item.className = 'page-item' + (disabled ? ' disabled' : '') + (active ? ' active' : '');

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'page-link';
            button.textContent = label;
            button.disabled = disabled;

            if (!disabled) {
                button.addEventListener('click', function () {
                    currentPage = page;
                    renderResults();
                    window.scrollTo({
                        top: resultsContainer?.offsetTop ? resultsContainer.offsetTop - 120 : 0,
                        behavior: 'smooth'
                    });
                });
            }

            item.appendChild(button);
            paginationList.appendChild(item);
        };

        addButton('‹', Math.max(1, currentPage - 1), currentPage === 1, false);

        for (let page = 1; page <= totalPages; page++) {
            addButton(String(page), page, false, page === currentPage);
        }

        addButton('›', Math.min(totalPages, currentPage + 1), currentPage === totalPages, false);
    }

    function renderResults() {
        const cards = filteredCards();
        const totalItems = cards.length;
        const totalPages = Math.max(1, Math.ceil(totalItems / pageSize));

        if (currentPage > totalPages) {
            currentPage = totalPages;
        }

        resultCards.forEach(function (card) {
            card.classList.add('d-none');
        });

        if (resultCount) {
            resultCount.textContent = totalItems;
        }

        if (totalItems === 0) {
            resultsContainer?.classList.add('d-none');
            emptyState?.classList.remove('d-none');
            pagination?.classList.add('d-none');
            return;
        }

        resultsContainer?.classList.remove('d-none');
        emptyState?.classList.add('d-none');

        const start = (currentPage - 1) * pageSize;
        cards.slice(start, start + pageSize).forEach(function (card) {
            card.classList.remove('d-none');
        });

        renderPagination(totalItems);
    }

    filterInputs.forEach(function (input) {
        input.addEventListener('change', function () {
            currentPage = 1;
            renderResults();
        });
    });

    clearFilters?.addEventListener('click', function () {
        const allFilter = document.getElementById('filter0');

        if (allFilter) {
            allFilter.checked = true;
        }

        currentPage = 1;
        renderResults();
    });

    clearSearch?.addEventListener('click', function () {
        if (searchInput) {
            searchInput.value = '';
            searchInput.focus();
        }

        this.classList.add('d-none');
    });

    searchInput?.addEventListener('input', function () {
        clearSearch?.classList.toggle('d-none', !this.value.trim());
    });

    sortResults?.addEventListener('change', function () {
        resultCards.sort(function (a, b) {
            if (this.value === 'az') {
                return (a.dataset.title || '').localeCompare(b.dataset.title || '');
            }

            if (this.value === 'newest') {
                return Number(b.dataset.date || 0) - Number(a.dataset.date || 0);
            }

            return Number(a.dataset.index || 0) - Number(b.dataset.index || 0);
        }.bind(this));

        resultCards.forEach(function (card) {
            resultsContainer?.appendChild(card);
        });

        currentPage = 1;
        renderResults();
    });

    renderResults();

});
</script>

@endpush

@endsection