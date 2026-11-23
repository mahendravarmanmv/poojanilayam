@extends('layouts.app')

@section('title', 'Secure Payment | Pooja Go')

@section('content')

<section class="bg-pn-cream py-5">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12 col-md-8 col-lg-6">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="card-body p-4 p-md-5 text-center">

                        <div class="mb-4">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success-subtle text-success"
                                 style="width:75px;height:75px;">

                                <i class="bi bi-shield-lock-fill fs-2"></i>

                            </div>
                        </div>

                        <h1 class="font-serif text-pn-brown h3 mb-2">
                            Secure Payment
                        </h1>

                        <p class="text-secondary mb-4">
                            Complete your pooja booking payment securely.
                        </p>

                        <div class="bg-light rounded-4 p-4 mb-4">

                            <div class="small text-secondary mb-2">
                                Booking Reference
                            </div>

                            <h5 class="fw-semibold mb-3">
                                {{ $payment->booking->booking_id }}
                            </h5>

                            <div class="small text-secondary mb-2">
                                Amount to Pay
                            </div>

                            <h2 class="text-pn-primary fw-bold mb-0">
                                ₹{{ number_format((float) $payment->amount, 2) }}
                            </h2>

                        </div>

                        <div id="payment-message"
                             class="alert alert-info mb-4">

                            Preparing secure payment gateway...

                        </div>

                        <button type="button"
                                id="pay-now-button"
                                class="btn btn-pn-primary btn-lg w-100 rounded-3">

                            <i class="bi bi-lock-fill me-2"></i>
                            Pay Now

                        </button>

                        <div class="small text-secondary mt-4">

                            <i class="bi bi-shield-check me-1"></i>

                            Secure payment powered by Cashfree

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const paymentSessionId = @json($payment->payment_session_id);

    const cashfreeMode = @json($cashfreeMode);

    const button = document.getElementById('pay-now-button');

    const message = document.getElementById('payment-message');

    let cashfree;

    try {

        cashfree = Cashfree({
            mode: cashfreeMode
        });

        message.textContent = 'Ready to proceed with secure payment.';

    } catch (error) {

        message.textContent = 'Unable to initialize payment gateway. Please refresh the page.';
        message.className = 'alert alert-danger mb-4';

        button.disabled = true;

    }

    button.addEventListener('click', async function () {

        if (!paymentSessionId) {

            message.textContent = 'Payment session is unavailable. Please try again.';
            message.className = 'alert alert-danger mb-4';

            return;
        }

        button.disabled = true;
        button.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Opening Payment...';

        message.textContent = 'Redirecting to secure Cashfree payment...';
        message.className = 'alert alert-info mb-4';

        try {

            await cashfree.checkout({
                paymentSessionId: paymentSessionId,
                redirectTarget: '_self'
            });

        } catch (error) {

            console.error('Cashfree checkout error:', error);

            message.textContent = 'Unable to open payment gateway. Please try again.';
            message.className = 'alert alert-danger mb-4';

            button.disabled = false;
            button.innerHTML = '<i class="bi bi-lock-fill me-2"></i>Pay Now';

        }

    });

});
</script>

@endsection