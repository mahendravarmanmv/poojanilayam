@extends('layouts.app')

@section('title', 'Checkout | Pooja Nilayam')
@section('meta_description', 'Complete your Pooja Nilayam order with secure checkout and delivery details.')

@section('content')
{{-- Breadcrumb --}}
<section class="bg-pn-cream border-bottom">
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-pn-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}" class="text-pn-primary">Store</a></li>
                <li class="breadcrumb-item"><a href="{{ route('store.cart') }}" class="text-pn-primary">Cart</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</section>

{{-- Checkout Header --}}
<section class="bg-pn-cream py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <span class="small text-pn-gold fw-semibold text-uppercase">Secure Checkout</span>
                <h1 class="font-serif display-4 text-pn-brown mt-2 mb-3">Complete your order</h1>
                <p class="lead text-secondary mb-0">Confirm your contact details, delivery address and order before proceeding to payment.</p>
            </div>
        </div>
    </div>
</section>

{{-- Checkout Progress --}}
<section class="py-4 border-bottom">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center gap-2">
                <span class="rounded-circle bg-pn-primary text-white d-inline-flex align-items-center justify-content-center p-2 lh-1">
                    <i class="bi bi-check fs-6"></i>
                </span>
                <small class="fw-semibold text-pn-primary d-none d-sm-inline">Cart</small>
            </div>
            <div class="bg-pn-primary mx-2 mx-sm-3 p-0 border-top border-2" role="separator"></div>

            <div class="d-flex align-items-center gap-2">
                <span class="rounded-circle bg-pn-primary text-white d-inline-flex align-items-center justify-content-center px-2 py-1 small lh-1">2</span>
                <small class="fw-semibold text-pn-primary d-none d-sm-inline">Checkout</small>
            </div>
            <div class="bg-secondary-subtle mx-2 mx-sm-3 p-0 border-top border-2" role="separator"></div>

            <div class="d-flex align-items-center gap-2">
                <span class="rounded-circle border border-secondary text-secondary d-inline-flex align-items-center justify-content-center px-2 py-1 small lh-1">3</span>
                <small class="text-secondary d-none d-sm-inline">Payment</small>
            </div>
        </div>
    </div>
</section>

{{-- Checkout Content --}}
<section class="py-5">
    <div class="container">
        <form action="{{ route('store.checkout.store') }}" method="POST" id="checkoutForm">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
            @endif

            <div class="row g-4 g-xl-5">
                {{-- LEFT — CUSTOMER & DELIVERY --}}
                <div class="col-12 col-lg-7">
                    {{-- Contact Information --}}
                    <div class="card border border-warning-subtle rounded-5 mb-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-start justify-content-between gap-3 mb-4">
                                <div>
                                    <span class="small text-pn-gold fw-semibold text-uppercase">Step 1</span>
                                    <h2 class="font-serif h3 text-pn-brown mt-1 mb-1">Contact Information</h2>
                                    <p class="small text-secondary mb-0">Enter the details we can use for order communication.</p>
                                </div>
                                <i class="bi bi-person-circle text-pn-primary fs-3"></i>
                            </div>

                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="customerName" class="form-label small fw-semibold text-pn-brown">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" id="customerName" name="name" class="form-control form-control-lg" value="{{ $customer['name'] }}" placeholder="Enter your full name" autocomplete="name" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="customerEmail" class="form-label small fw-semibold text-pn-brown">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" id="customerEmail" name="email" class="form-control form-control-lg" value="{{ $customer['email'] }}" placeholder="you@example.com" autocomplete="email" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="customerPhone" class="form-label small fw-semibold text-pn-brown">Mobile Number <span class="text-danger">*</span></label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text">+91</span>
                                        <input type="tel" id="customerPhone" name="phone" class="form-control" value="{{ $customer['phone'] }}" placeholder="Enter mobile number" autocomplete="tel" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Delivery Address --}}
                    <div class="card border border-warning-subtle rounded-5 mb-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-start justify-content-between gap-3 mb-4">
                                <div>
                                    <span class="small text-pn-gold fw-semibold text-uppercase">Step 2</span>
                                    <h2 class="font-serif h3 text-pn-brown mt-1 mb-1">Delivery Address</h2>
                                    <p class="small text-secondary mb-0">Where should we deliver your order?</p>
                                </div>
                                <i class="bi bi-geo-alt text-pn-primary fs-3"></i>
                            </div>

                            @foreach($addresses as $address)
                                <div class="mb-4">
                                    <label for="address{{ $address['id'] }}"
                                           class="checkout-address-option border border-warning-subtle rounded-4 p-4 w-100 text-start d-block"
                                           style="cursor: pointer; transition: border-color .15s ease, box-shadow .15s ease;">
                                        <input type="radio"
                                               class="form-check-input checkout-address-radio"
                                               name="delivery_address"
                                               required
                                               id="address{{ $address['id'] }}"
                                               value="{{ $address['id'] }}"
                                               @checked($address['selected'])
                                               style="float: right; margin-left: 1rem;">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="rounded-circle bg-pn-cream text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0 p-3">
                                                <i class="bi bi-house fs-5"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center flex-wrap gap-2">
                                                    <strong class="text-pn-brown">{{ $address['type'] }}</strong>
                                                    <span class="badge bg-success-subtle text-success rounded-pill checkout-address-selected-badge {{ $address['selected'] ? '' : 'd-none' }}">Selected</span>
                                                </div>
                                                <div class="mt-2">
                                                    <strong class="d-block small text-pn-brown">{{ $address['name'] }}</strong>
                                                    <small class="text-secondary d-block">{{ $address['phone'] }}</small>
                                                    <small class="text-secondary d-block mt-1">{{ $address['address'] }}</small>
                                                    <small class="text-secondary">{{ $address['city'] }}, {{ $address['state'] }} - {{ $address['pincode'] }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            @endforeach

                            <button type="button" class="btn btn-pn-outline w-100" data-bs-toggle="collapse" data-bs-target="#newAddressForm" aria-expanded="false" aria-controls="newAddressForm">
                                <i class="bi bi-plus-circle me-2"></i> Add New Address
                            </button>

                            <div class="collapse mt-4" id="newAddressForm">
                                <div class="border border-warning-subtle rounded-4 bg-pn-cream p-4">
                                    <h3 class="font-serif h4 text-pn-brown mb-4">Add New Address</h3>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="newAddressName" class="form-label small fw-semibold">Address Name</label>
                                            <input type="text" id="newAddressName" class="form-control" placeholder="Home / Office">
                                        </div>
                                        <div class="col-12">
                                            <label for="newAddressLine" class="form-label small fw-semibold">Address</label>
                                            <textarea id="newAddressLine" class="form-control" rows="3" placeholder="House / Flat number, street, area"></textarea>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="newAddressCity" class="form-label small fw-semibold">City</label>
                                            <input type="text" id="newAddressCity" class="form-control" placeholder="City">
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="newAddressState" class="form-label small fw-semibold">State</label>
                                            <select id="newAddressState" class="form-select">
                                                <option selected>Select State</option>
                                                <option>Telangana</option>
                                                <option>Andhra Pradesh</option>
                                                <option>Karnataka</option>
                                                <option>Tamil Nadu</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="newAddressPincode" class="form-label small fw-semibold">Pincode</label>
                                            <input type="text" id="newAddressPincode" class="form-control" placeholder="Pincode" inputmode="numeric">
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="newAddressPhone" class="form-label small fw-semibold">Contact Number</label>
                                            <input type="tel" id="newAddressPhone" class="form-control" placeholder="Mobile number">
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="saveAddress">
                                                <label class="form-check-label small" for="saveAddress">Save this address for future orders</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div id="checkoutAddressMessage" class="alert d-none mb-3" role="alert"></div>
                                            <button type="button" class="btn btn-pn" id="saveCheckoutAddressButton" data-url="{{ route('store.checkout.address.store') }}">Save Address</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Delivery Information --}}
                    <div class="card border border-warning-subtle rounded-5 mb-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="d-flex align-items-start gap-3">
                                <div class="rounded-circle bg-pn-cream text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0 p-3">
                                    <i class="bi bi-truck fs-5"></i>
                                </div>
                                <div>
                                    <h2 class="font-serif h4 text-pn-brown mb-1">Delivery Information</h2>
                                    <p class="small text-secondary mb-3">Delivery availability and charges will be confirmed based on your delivery location.</p>
                                    <div class="alert alert-success rounded-4 mb-0">
                                        <div class="d-flex align-items-start gap-2">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <small>Estimated delivery details will be displayed once the delivery address is confirmed.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Order Notes --}}
                    <div class="card border border-warning-subtle rounded-5">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="font-serif h4 text-pn-brown mb-3">Order Notes</h2>
                            <p class="small text-secondary">Optional instructions for your order.</p>
                            <textarea class="form-control" rows="4" name="order_notes" maxlength="2000" placeholder="Add any special instructions...">{{ old('order_notes') }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- RIGHT — ORDER SUMMARY --}}
                <div class="col-12 col-lg-5">
                    <aside class="card border border-warning-subtle rounded-5 sticky-lg-top top-0 pt-lg-5">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="font-serif h3 text-pn-brown mb-4">Your Order</h2>

                            <div class="vstack gap-3 mb-4">
                                @foreach($cartItems as $item)
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="position-relative flex-shrink-0">
                                            <div class="rounded-3 overflow-hidden ratio ratio-1x1 w-auto" style="width: 4rem;">
                                                <img src="{{ !empty($item['image']) && \Illuminate\Support\Str::startsWith($item['image'], ['http://', 'https://']) ? $item['image'] : asset($item['image'] ?: 'images/home/hero.webp') }}" class="w-100 h-100 object-fit-cover" alt="{{ $item['name'] }}" loading="lazy">
                                            </div>
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-pn-primary">
                                                {{ $item['quantity'] }}
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <strong class="d-block small text-pn-brown">{{ $item['name'] }}</strong>
                                            <small class="text-secondary">{{ $item['category'] }}</small>
                                        </div>
                                        <strong class="small text-pn-brown">{{ $currencySymbol }}{{ number_format($item['price'] * $item['quantity'], 2) }}</strong>
                                    </div>
                                @endforeach
                            </div>

                            <hr class="border-warning-subtle">

                            <div class="d-flex justify-content-between gap-3 mb-3">
                                <span class="text-secondary">Subtotal</span>
                                <strong class="text-pn-brown">{{ $currencySymbol }}{{ number_format($subtotal, 2) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between gap-3 mb-3">
                                <span class="text-secondary">Discount</span>
                                <strong class="text-success">- {{ $currencySymbol }}{{ number_format($discount, 2) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between gap-3 mb-3">
                                <span class="text-secondary">Delivery</span>
                                <span class="text-success">FREE</span>
                            </div>
                            <div class="d-flex justify-content-between gap-3 mb-3">
                                <span class="text-secondary">Taxes</span>
                                <span class="text-secondary">{{ $currencySymbol }}{{ number_format($tax, 2) }}</span>
                            </div>

                            <hr class="border-warning-subtle">

                            <div class="d-flex align-items-center justify-content-between gap-3 py-2 mb-4">
                                <strong class="font-serif h4 text-pn-brown mb-0">Order Total</strong>
                                <strong class="fs-3 text-pn-primary">{{ $currencySymbol }}{{ number_format($total, 2) }}</strong>
                            </div>

                            <div class="mb-4">
                                <label for="checkoutCoupon" class="form-label small fw-semibold text-pn-brown">Coupon Code</label>
                                <div class="input-group">
                                    <input type="text" id="checkoutCoupon" class="form-control" placeholder="Enter coupon code">
                                    <button type="button" class="btn btn-outline-secondary">Apply</button>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" form="checkoutForm" class="btn btn-pn btn-lg">
                                    Continue to Payment
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>

                            <div class="border border-warning-subtle rounded-4 bg-pn-cream p-3 mt-4">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="bi bi-shield-lock text-pn-primary fs-5"></i>
                                    <div>
                                        <strong class="small d-block text-pn-brown">Secure Checkout</strong>
                                        <small class="text-secondary">Your information is protected during checkout.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </form>
    </div>
</section>

{{-- Checkout Features / Information --}}
<section class="py-5 bg-pn-cream">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-circle bg-white text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0 p-3">
                        <i class="bi bi-shield-check fs-5"></i>
                    </div>
                    <div>
                        <strong class="d-block text-pn-brown">Secure Checkout</strong>
                        <small class="text-secondary">Your checkout information is handled securely.</small>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-circle bg-white text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0 p-3">
                        <i class="bi bi-truck fs-5"></i>
                    </div>
                    <div>
                        <strong class="d-block text-pn-brown">Reliable Delivery</strong>
                        <small class="text-secondary">Delivery details are confirmed before payment.</small>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-circle bg-white text-pn-primary d-flex align-items-center justify-content-center flex-shrink-0 p-3">
                        <i class="bi bi-headset fs-5"></i>
                    </div>
                    <div>
                        <strong class="d-block text-pn-brown">Need Help?</strong>
                        <small class="text-secondary">Customer support can assist with your shopping experience.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Keep the selected address card and its badge in sync with the actual radio input.
    const addressRadios = document.querySelectorAll('input[name="delivery_address"]');
    const updateSelectedAddress = () => {
        addressRadios.forEach((radio) => {
            const label = document.querySelector('label[for="' + radio.id + '"]');
            if (!label) return;

            label.style.borderColor = radio.checked ? 'var(--bs-primary, #a9472d)' : '';
            label.style.boxShadow = radio.checked ? '0 0 0 2px rgba(169, 71, 45, 0.12)' : '';

            const badge = label.querySelector('.checkout-address-selected-badge');
            if (badge) badge.classList.toggle('d-none', !radio.checked);
        });
    };

    addressRadios.forEach((radio) => radio.addEventListener('change', updateSelectedAddress));
    updateSelectedAddress();

    const saveButton = document.getElementById('saveCheckoutAddressButton');
    if (!saveButton) return;

    const messageBox = document.getElementById('checkoutAddressMessage');
    const showMessage = (message, type = 'danger') => {
        messageBox.textContent = message;
        messageBox.className = 'alert alert-' + type + ' mb-3';
    };

    saveButton.addEventListener('click', async function () {
        const addressType = document.getElementById('newAddressName').value.trim();
        const addressLine = document.getElementById('newAddressLine').value.trim();
        const city = document.getElementById('newAddressCity').value.trim();
        const state = document.getElementById('newAddressState').value.trim();
        const pincode = document.getElementById('newAddressPincode').value.trim();
        const phone = document.getElementById('newAddressPhone').value.trim();
        const customerName = document.getElementById('customerName').value.trim();

        if (!addressType || !addressLine || !city || !state || state === 'Select State' || !pincode || !phone || !customerName) {
            showMessage('Please fill in Address Name, Address, City, State, Pincode, Contact Number, and Full Name before saving.');
            return;
        }

        saveButton.disabled = true;
        const originalText = saveButton.textContent;
        saveButton.textContent = 'Saving...';

        try {
            const csrfInput = document.querySelector('#checkoutForm input[name="_token"]');
            const response = await fetch(saveButton.dataset.url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfInput ? csrfInput.value : ''
                },
                body: JSON.stringify({
                    address_type: addressType,
                    address_line_1: addressLine,
                    city: city,
                    state: state,
                    postal_code: pincode,
                    phone: phone,
                    name: customerName,
                    save_for_future: document.getElementById('saveAddress').checked ? 1 : 0
                })
            });

            const data = await response.json().catch(() => ({}));
            if (!response.ok || !data.success) {
                const firstError = data.errors ? Object.values(data.errors).flat()[0] : null;
                throw new Error(firstError || data.message || 'Unable to save this address. Please check the details and try again.');
            }

            showMessage(data.message || 'Address saved successfully. Refreshing checkout...', 'success');
            window.location.href = data.redirect || window.location.href;
        } catch (error) {
            showMessage(error.message || 'Unable to save this address. Please try again.');
        } finally {
            saveButton.disabled = false;
            saveButton.textContent = originalText;
        }
    });
});
</script>
@endpush

@endsection