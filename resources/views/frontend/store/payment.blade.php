@extends('layouts.app')

@section('title', 'Payment | Pooja Nilayam')
@section('meta_description', 'Review your order and choose an available payment method at Pooja Nilayam.')

@section('content')
<section class="bg-pn-cream border-bottom">
    <div class="container py-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}">Store</a></li>
                <li class="breadcrumb-item"><a href="{{ route('store.cart') }}">Cart</a></li>
                <li class="breadcrumb-item"><a href="{{ route('store.checkout') }}">Checkout</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment</li>
            </ol>
        </nav>
        <h1 class="h2 text-pn-brown mb-1">Review &amp; Payment</h1>
        <p class="text-secondary mb-0">Review your delivery details and total before placing your order.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
        @endif

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card border-warning-subtle rounded-4 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h2 class="h5 text-pn-brown">Delivery address</h2>
                        <p class="mb-1 fw-semibold">{{ $deliveryAddress['name'] }}</p>
                        @if($deliveryAddress['phone'])<p class="mb-1">{{ $deliveryAddress['phone'] }}</p>@endif
                        <p class="mb-0 text-secondary">
                            {{ $deliveryAddress['address'] }}
                            @if($deliveryAddress['city']), {{ $deliveryAddress['city'] }}@endif
                            @if($deliveryAddress['state']), {{ $deliveryAddress['state'] }}@endif
                            @if($deliveryAddress['pincode']), {{ $deliveryAddress['pincode'] }}@endif
                        </p>
                        <a href="{{ route('store.checkout') }}" class="btn btn-outline-secondary btn-sm mt-3">Change address</a>
                    </div>
                </div>

                <div class="card border-warning-subtle rounded-4 shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="h5 text-pn-brown mb-3">Items in your order</h2>
                        @forelse($cartItems as $item)
                            <div class="d-flex align-items-center gap-3 py-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                @if(!empty($item['image']))
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="rounded border" style="width:64px;height:64px;object-fit:cover">
                                @else
                                    <div class="rounded border bg-light d-flex align-items-center justify-content-center" style="width:64px;height:64px"><i class="bi bi-image text-secondary"></i></div>
                                @endif
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">{{ $item['name'] }}</div>
                                    <small class="text-secondary">Qty: {{ $item['quantity'] }}</small>
                                </div>
                                <div class="fw-semibold">{{ $currencySymbol }}{{ number_format((float)$item['price'] * (int)$item['quantity'], 2) }}</div>
                            </div>
                        @empty
                            <p class="text-secondary mb-0">No items found. Please return to your cart.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card border-warning-subtle rounded-4 shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="h5 text-pn-brown mb-3">Order summary</h2>
                        <div class="d-flex justify-content-between mb-2"><span>Subtotal</span><span>{{ $currencySymbol }}{{ number_format((float)$order['subtotal'], 2) }}</span></div>
                        <div class="d-flex justify-content-between mb-2"><span>Discount</span><span>-{{ $currencySymbol }}{{ number_format((float)$order['discount'], 2) }}</span></div>
                        <div class="d-flex justify-content-between mb-2"><span>Delivery</span><span>{{ (float)$order['delivery'] > 0 ? $currencySymbol.number_format((float)$order['delivery'], 2) : 'Free' }}</span></div>
                        <div class="d-flex justify-content-between mb-3"><span>Tax</span><span>{{ $currencySymbol }}{{ number_format((float)$order['tax'], 2) }}</span></div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center mb-4"><strong class="fs-5">Total payable</strong><strong class="fs-4 text-pn-brown">{{ $currencySymbol }}{{ number_format((float)$order['total'], 2) }}</strong></div>

                        <h3 class="h6">Payment method</h3>
                        <div class="border rounded-3 p-3 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" checked disabled id="paymentCod">
                                <label class="form-check-label fw-semibold" for="paymentCod">Cash on Delivery (COD)</label>
                            </div>
                            <small class="text-secondary d-block ms-4 mt-1">Pay when your order is delivered. Online payment is not enabled yet.</small>
                        </div>
                        <form action="{{ route('store.payment.place-order') }}" method="POST">
                            @csrf
                            <input type="hidden" name="payment_method" value="cod">
                            <button type="submit" class="btn btn-pn btn-lg w-100" {{ empty($cartItems) ? 'disabled' : '' }}>
                                <i class="bi bi-bag-check me-2"></i>Place COD Order
                            </button>
                        </form>
                        <a href="{{ route('store.checkout') }}" class="btn btn-outline-secondary w-100 mt-2">Back to checkout</a>
                        <p class="small text-secondary mt-3 mb-0">No payment gateway is connected. Do not select or submit an online payment method.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
