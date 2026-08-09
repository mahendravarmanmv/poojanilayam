@extends('layouts.app')

@section('title', 'Ticket Details | Pooja Nilayam')

@section(
    'meta_description',
    'View your Pooja Nilayam support ticket details, status, conversation and resolution updates.'
)

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | TEMPORARY TICKET DATA
    |--------------------------------------------------------------------------
    | This will later come from the authenticated user's support ticket.
    |--------------------------------------------------------------------------
    */

    $ticket = [

        'id' => 'PN-TKT-102458',

        'status' => 'In Progress',

        'status_class' => 'warning',

        'priority' => 'Normal',

        'category' => 'Booking Issue',

        'subject' => 'Unable to confirm my pooja booking',

        'reference_id' => 'PN-BKG-45821',

        'created_at' => '08 August 2026, 10:35 AM',

        'updated_at' => '08 August 2026, 02:15 PM',

        'description' =>
            'I completed the booking process but have not yet
            received the final booking confirmation. Please check
            the status of my booking.',

        'assigned_to' => 'Pooja Nilayam Support Team'

    ];


    $messages = [

        [
            'sender' => 'You',

            'type' => 'customer',

            'date' => '08 August 2026, 10:35 AM',

            'message' =>
                'I completed the booking process but have not yet
                received the final booking confirmation.'
        ],

        [
            'sender' => 'Support Team',

            'type' => 'support',

            'date' => '08 August 2026, 02:15 PM',

            'message' =>
                'Thank you for contacting Pooja Nilayam support.
                We are checking the booking information associated
                with your reference ID.'
        ]

    ];


    $statusSteps = [

        [
            'title' => 'Ticket Raised',
            'description' => 'Your support request was submitted.',
            'completed' => true
        ],

        [
            'title' => 'Support Review',
            'description' => 'Support team is reviewing your request.',
            'completed' => true
        ],

        [
            'title' => 'Investigation',
            'description' => 'The issue is being investigated.',
            'completed' => false
        ],

        [
            'title' => 'Resolution',
            'description' => 'A resolution will be provided.',
            'completed' => false
        ],

        [
            'title' => 'Closed',
            'description' => 'Ticket will close after resolution.',
            'completed' => false
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
                        href="#"
                        class="text-pn-primary"
                    >
                        Support
                    </a>

                </li>


                <li class="breadcrumb-item">

                    <a
                        href="#"
                        class="text-pn-primary"
                    >
                        My Tickets
                    </a>

                </li>


                <li
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    {{ $ticket['id'] }}
                </li>

            </ol>

        </nav>

    </div>

</section>


{{-- ============================================================
     PAGE HEADER
============================================================ --}}

<section class="bg-pn-cream py-5">

    <div class="container">

        <div
            class="d-flex
                   flex-column
                   flex-lg-row
                   justify-content-between
                   align-items-lg-center
                   gap-4"
        >

            <div>

                <div
                    class="d-flex
                           flex-wrap
                           align-items-center
                           gap-2
                           mb-2"
                >

                    <span
                        class="small
                               text-pn-gold
                               fw-semibold
                               text-uppercase"
                    >
                        Support Ticket
                    </span>


                    <span
                        class="badge
                               text-bg-{{ $ticket['status_class'] }}
                               rounded-pill"
                    >

                        {{ $ticket['status'] }}

                    </span>

                </div>


                <h1
                    class="font-serif
                           display-6
                           text-pn-brown
                           mb-2"
                >

                    {{ $ticket['subject'] }}

                </h1>


                <p
                    class="text-secondary
                           mb-0"
                >

                    Ticket ID:
                    <strong>{{ $ticket['id'] }}</strong>

                </p>

            </div>


            <div
                class="d-flex
                       flex-wrap
                       gap-2"
            >

                <a
                    href="#"
                    class="btn
                           btn-pn-outline"
                >

                    <i
                        class="bi bi-arrow-left me-1"
                    ></i>

                    My Tickets

                </a>


                <button
                    type="button"
                    class="btn
                           btn-outline-danger"
                    id="closeTicketButton"
                >

                    <i
                        class="bi bi-x-circle me-1"
                    ></i>

                    Close Ticket

                </button>

            </div>

        </div>

    </div>

</section>


{{-- ============================================================
     MAIN CONTENT
============================================================ --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4 g-xl-5">


            {{-- ==================================================
                 LEFT / MAIN
            =================================================== --}}

            <div class="col-12 col-lg-8">


                {{-- Ticket Information --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div
                        class="card-body
                               p-4
                               p-md-5"
                    >

                        <div
                            class="d-flex
                                   justify-content-between
                                   align-items-center
                                   gap-3
                                   mb-4"
                        >

                            <div>

                                <span
                                    class="small
                                           text-pn-gold
                                           fw-semibold
                                           text-uppercase"
                                >
                                    Ticket Information
                                </span>


                                <h2
                                    class="font-serif
                                           h3
                                           text-pn-brown
                                           mt-1
                                           mb-0"
                                >
                                    Issue Details
                                </h2>

                            </div>


                            <span
                                class="badge
                                       bg-pn-cream
                                       text-pn-primary
                                       rounded-pill
                                       px-3
                                       py-2"
                            >

                                {{ $ticket['category'] }}

                            </span>

                        </div>


                        <div
                            class="row
                                   g-3"
                        >

                            <div class="col-12 col-md-6">

                                <div
                                    class="bg-pn-cream
                                           rounded-4
                                           p-3"
                                >

                                    <small
                                        class="text-secondary
                                               d-block
                                               mb-1"
                                    >
                                        Booking / Reference ID
                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >

                                        {{ $ticket['reference_id'] }}

                                    </strong>

                                </div>

                            </div>


                            <div class="col-12 col-md-6">

                                <div
                                    class="bg-pn-cream
                                           rounded-4
                                           p-3"
                                >

                                    <small
                                        class="text-secondary
                                               d-block
                                               mb-1"
                                    >
                                        Priority
                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >

                                        {{ $ticket['priority'] }}

                                    </strong>

                                </div>

                            </div>


                            <div class="col-12 col-md-6">

                                <div
                                    class="bg-pn-cream
                                           rounded-4
                                           p-3"
                                >

                                    <small
                                        class="text-secondary
                                               d-block
                                               mb-1"
                                    >
                                        Created
                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >

                                        {{ $ticket['created_at'] }}

                                    </strong>

                                </div>

                            </div>


                            <div class="col-12 col-md-6">

                                <div
                                    class="bg-pn-cream
                                           rounded-4
                                           p-3"
                                >

                                    <small
                                        class="text-secondary
                                               d-block
                                               mb-1"
                                    >
                                        Last Updated
                                    </small>


                                    <strong
                                        class="text-pn-brown"
                                    >

                                        {{ $ticket['updated_at'] }}

                                    </strong>

                                </div>

                            </div>


                            <div class="col-12">

                                <div
                                    class="border
                                           border-warning-subtle
                                           rounded-4
                                           p-4"
                                >

                                    <small
                                        class="text-secondary
                                               d-block
                                               mb-2"
                                    >
                                        Description
                                    </small>


                                    <p
                                        class="text-secondary
                                               lh-lg
                                               mb-0"
                                    >

                                        {{ $ticket['description'] }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Ticket Timeline --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5
                           mb-4"
                >

                    <div
                        class="card-body
                               p-4
                               p-md-5"
                    >

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Ticket Progress
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-1
                                   mb-4"
                        >
                            Support Status
                        </h2>


                        <div
                            class="vstack
                                   gap-0"
                        >

                            @foreach(
                                $statusSteps as $index => $step
                            )

                                <div
                                    class="d-flex
                                           align-items-start
                                           gap-3
                                           position-relative
                                           pb-4"
                                >

                                    @if(
                                        $index <
                                        count($statusSteps) - 1
                                    )

                                        <div
                                            class="position-absolute
                                                   bg-warning-subtle"
                                            style="
                                                width:2px;
                                                left:18px;
                                                top:38px;
                                                bottom:0;
                                            "
                                        ></div>

                                    @endif


                                    <div
                                        class="rounded-circle
                                               d-flex
                                               align-items-center
                                               justify-content-center
                                               flex-shrink-0
                                               {{ $step['completed']
                                                   ? 'bg-pn-primary text-white'
                                                   : 'bg-light text-secondary border'
                                               }}"
                                        style="width:38px;height:38px;z-index:1;"
                                    >

                                        @if(
                                            $step['completed']
                                        )

                                            <i
                                                class="bi bi-check"
                                            ></i>

                                        @else

                                            {{ $index + 1 }}

                                        @endif

                                    </div>


                                    <div>

                                        <strong
                                            class="d-block
                                                   text-pn-brown"
                                        >

                                            {{ $step['title'] }}

                                        </strong>


                                        <small
                                            class="text-secondary"
                                        >

                                            {{ $step['description'] }}

                                        </small>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                {{-- Conversation --}}

                <div
                    class="card
                           border
                           border-warning-subtle
                           rounded-5"
                >

                    <div
                        class="card-body
                               p-4
                               p-md-5"
                    >

                        <span
                            class="small
                                   text-pn-gold
                                   fw-semibold
                                   text-uppercase"
                        >
                            Support Conversation
                        </span>


                        <h2
                            class="font-serif
                                   h3
                                   text-pn-brown
                                   mt-1
                                   mb-4"
                        >
                            Messages
                        </h2>


                        <div
                            class="vstack
                                   gap-4"
                        >

                            @foreach(
                                $messages as $message
                            )

                                <div
                                    class="d-flex
                                           gap-3
                                           {{ $message['type'] === 'customer'
                                               ? 'justify-content-end'
                                               : ''
                                           }}"
                                >

                                    @if(
                                        $message['type'] === 'support'
                                    )

                                        <div
                                            class="rounded-circle
                                                   bg-pn-primary
                                                   text-white
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   flex-shrink-0"
                                            style="width:42px;height:42px;"
                                        >

                                            <i
                                                class="bi bi-headset"
                                            ></i>

                                        </div>

                                    @endif


                                    <div
                                        class="
                                            {{ $message['type'] === 'customer'
                                                ? 'bg-pn-cream'
                                                : 'bg-light'
                                            }}
                                            rounded-4
                                            p-3
                                            {{ $message['type'] === 'customer'
                                                ? 'text-end'
                                                : ''
                                            }}"
                                        style="max-width:85%;"
                                    >

                                        <div
                                            class="d-flex
                                                   flex-wrap
                                                   align-items-center
                                                   gap-2
                                                   {{ $message['type'] === 'customer'
                                                       ? 'justify-content-end'
                                                       : ''
                                                   }}"
                                        >

                                            <strong
                                                class="small
                                                       text-pn-brown"
                                            >

                                                {{ $message['sender'] }}

                                            </strong>


                                            <small
                                                class="text-secondary"
                                            >

                                                {{ $message['date'] }}

                                            </small>

                                        </div>


                                        <p
                                            class="small
                                                   text-secondary
                                                   lh-lg
                                                   mt-2
                                                   mb-0"
                                        >

                                            {{ $message['message'] }}

                                        </p>

                                    </div>


                                    @if(
                                        $message['type'] === 'customer'
                                    )

                                        <div
                                            class="rounded-circle
                                                   bg-pn-cream
                                                   text-pn-primary
                                                   d-flex
                                                   align-items-center
                                                   justify-content-center
                                                   flex-shrink-0"
                                            style="width:42px;height:42px;"
                                        >

                                            <i
                                                class="bi bi-person"
                                            ></i>

                                        </div>

                                    @endif

                                </div>

                            @endforeach

                        </div>


                        {{-- Reply --}}

                        <div
                            class="border-top
                                   border-warning-subtle
                                   mt-4
                                   pt-4"
                        >

                            <label
                                for="ticketReply"
                                class="form-label
                                       fw-semibold
                                       text-pn-brown"
                            >

                                Add a Reply

                            </label>


                            <textarea
                                id="ticketReply"
                                class="form-control"
                                rows="4"
                                maxlength="1000"
                                placeholder="Write your message..."
                            ></textarea>


                            <div
                                class="d-flex
                                       flex-column
                                       flex-sm-row
                                       align-items-sm-center
                                       justify-content-between
                                       gap-3
                                       mt-3"
                            >

                                <small
                                    class="text-secondary"
                                >

                                    Our support team will be notified
                                    of your reply.

                                </small>


                                <button
                                    type="button"
                                    id="sendReply"
                                    class="btn
                                           btn-pn"
                                >

                                    <i
                                        class="bi bi-send me-1"
                                    ></i>

                                    Send Reply

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ==================================================
                 SIDEBAR
            =================================================== --}}

            <div class="col-12 col-lg-4">

                <div
                    class="position-sticky"
                    style="top:100px;"
                >

                    {{-- Current Status --}}

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
                                Current Status
                            </span>


                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3
                                       mt-3"
                            >

                                <div
                                    class="rounded-circle
                                           bg-warning-subtle
                                           text-warning
                                           d-flex
                                           align-items-center
                                           justify-content-center"
                                    style="width:52px;height:52px;"
                                >

                                    <i
                                        class="bi bi-hourglass-split fs-5"
                                    ></i>

                                </div>


                                <div>

                                    <strong
                                        class="d-block
                                               text-pn-brown
                                               fs-5"
                                    >

                                        {{ $ticket['status'] }}

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >

                                        Our team is working on your
                                        request.

                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Assignment --}}

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
                                Assigned To
                            </span>


                            <div
                                class="d-flex
                                       align-items-center
                                       gap-3
                                       mt-3"
                            >

                                <div
                                    class="rounded-circle
                                           bg-pn-cream
                                           text-pn-primary
                                           d-flex
                                           align-items-center
                                           justify-content-center"
                                    style="width:48px;height:48px;"
                                >

                                    <i
                                        class="bi bi-headset"
                                    ></i>

                                </div>


                                <div>

                                    <strong
                                        class="d-block
                                               text-pn-brown"
                                    >

                                        {{ $ticket['assigned_to'] }}

                                    </strong>


                                    <small
                                        class="text-secondary"
                                    >
                                        Support Executive
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Ticket Details --}}

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
                                Ticket Summary
                            </span>


                            <div
                                class="vstack
                                       gap-3
                                       mt-3"
                            >

                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3"
                                >

                                    <small
                                        class="text-secondary"
                                    >
                                        Ticket ID
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown
                                               text-end"
                                    >

                                        {{ $ticket['id'] }}

                                    </strong>

                                </div>


                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3"
                                >

                                    <small
                                        class="text-secondary"
                                    >
                                        Category
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown
                                               text-end"
                                    >

                                        {{ $ticket['category'] }}

                                    </strong>

                                </div>


                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3"
                                >

                                    <small
                                        class="text-secondary"
                                    >
                                        Priority
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown
                                               text-end"
                                    >

                                        {{ $ticket['priority'] }}

                                    </strong>

                                </div>


                                <div
                                    class="d-flex
                                           justify-content-between
                                           gap-3"
                                >

                                    <small
                                        class="text-secondary"
                                    >
                                        Reference
                                    </small>


                                    <strong
                                        class="small
                                               text-pn-brown
                                               text-end"
                                    >

                                        {{ $ticket['reference_id'] }}

                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Support CTA --}}

                    <div
                        class="bg-pn-cream
                               rounded-5
                               p-4"
                    >

                        <i
                            class="bi bi-question-circle
                                   text-pn-primary
                                   fs-4"
                        ></i>


                        <h2
                            class="font-serif
                                   h5
                                   text-pn-brown
                                   mt-3"
                        >
                            Need More Help?
                        </h2>


                        <p
                            class="small
                                   text-secondary"
                        >

                            Visit the Help Center or contact our
                            support team if you need additional
                            assistance.

                        </p>


                        <div
                            class="d-grid
                                   gap-2"
                        >

                            <a
                                href="{{ url('/help-center') }}"
                                class="btn
                                       btn-pn-outline"
                            >

                                Help Center

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

        </div>

    </div>

</section>


{{-- ============================================================
     CLOSE TICKET MODAL
============================================================ --}}

<div
    class="modal fade"
    id="closeTicketModal"
    tabindex="-1"
    aria-labelledby="closeTicketModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog
               modal-dialog-centered"
    >

        <div
            class="modal-content
                   border-0
                   rounded-5"
        >

            <div class="modal-header">

                <h2
                    class="modal-title
                           font-serif
                           h5
                           text-pn-brown"
                    id="closeTicketModalLabel"
                >
                    Close Support Ticket?
                </h2>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>


            <div class="modal-body">

                <p
                    class="text-secondary
                           mb-0"
                >

                    Are you sure you want to close this ticket?
                    You should close it only after your issue has
                    been resolved.

                </p>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn
                           btn-light
                           border"
                    data-bs-dismiss="modal"
                >
                    Cancel
                </button>


                <button
                    type="button"
                    class="btn
                           btn-danger"
                    id="confirmCloseTicket"
                >

                    Close Ticket

                </button>

            </div>

        </div>

    </div>

</div>


{{-- ============================================================
     PAGE SCRIPT
============================================================ --}}

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Close Ticket
    |--------------------------------------------------------------------------
    */

    const closeButton =
        document.getElementById(
            'closeTicketButton'
        );


    const closeModalElement =
        document.getElementById(
            'closeTicketModal'
        );


    const confirmClose =
        document.getElementById(
            'confirmCloseTicket'
        );


    if (
        closeButton
        &&
        closeModalElement
    ) {

        const closeModal =
            new bootstrap.Modal(
                closeModalElement
            );


        closeButton.addEventListener(
            'click',
            function () {

                closeModal.show();

            }
        );


        confirmClose?.addEventListener(
            'click',
            function () {

                /*
                |--------------------------------------------------------------------------
                | Backend status update will be connected later.
                |--------------------------------------------------------------------------
                */

                closeModal.hide();


                closeButton.disabled =
                    true;


                closeButton.innerHTML =
                    '<i class="bi bi-check-circle me-1"></i> Ticket Closed';


                closeButton.classList.remove(
                    'btn-outline-danger'
                );


                closeButton.classList.add(
                    'btn-outline-success'
                );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Send Reply
    |--------------------------------------------------------------------------
    */

    const replyInput =
        document.getElementById(
            'ticketReply'
        );


    const sendReply =
        document.getElementById(
            'sendReply'
        );


    sendReply?.addEventListener(
        'click',
        function () {

            const message =
                replyInput
                    ?.value
                    ?.trim();


            if (
                !message
            ) {

                replyInput?.classList.add(
                    'is-invalid'
                );


                return;

            }


            if (
                message.length < 3
            ) {

                replyInput?.classList.add(
                    'is-invalid'
                );


                return;

            }


            replyInput?.classList.remove(
                'is-invalid'
            );


            const originalHTML =
                this.innerHTML;


            this.disabled =
                true;


            this.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>' +
                'Sending...';


            /*
            |--------------------------------------------------------------------------
            | Backend reply submission will be connected later.
            |--------------------------------------------------------------------------
            */

            setTimeout(
                function () {

                    this.disabled =
                        false;


                    this.innerHTML =
                        originalHTML;


                    replyInput.value =
                        '';


                    alert(
                        'Your reply has been submitted.'
                    );

                }.bind(this),
                700
            );

        }
    );

});
</script>

@endpush

@endsection