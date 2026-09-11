<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Website
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::view('/', 'frontend.home')
    ->name('home');


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
|
| Static UI routes for now.
| Authentication logic will be implemented later.
|--------------------------------------------------------------------------
*/

Route::prefix('auth')
    ->name('auth.')
    ->group(function () {

        Route::view('/login', 'frontend.auth.login')
            ->name('login');

        Route::view('/register', 'frontend.auth.register')
            ->name('register');

        Route::view('/forgot-password', 'frontend.auth.forgot-password')
            ->name('forgot-password');

        Route::view('/reset-password', 'frontend.auth.reset-password')
            ->name('reset-password');

        Route::view('/verify-email', 'frontend.auth.verify-email')
            ->name('verify-email');
			
		Route::view('/otp-verification', 'frontend.auth.otp-verification')
			->name('otp-verification');
    });


/*
|--------------------------------------------------------------------------
| Poojas
|--------------------------------------------------------------------------
*/

Route::prefix('poojas')
    ->name('pooja.')
    ->group(function () {

        Route::view('/', 'frontend.poojas.index')
            ->name('index');

        Route::view('/categories', 'frontend.poojas.categories')
            ->name('categories');

        Route::view('/category/{slug}', 'frontend.poojas.category')
            ->name('category');

        Route::view('/{slug}', 'frontend.poojas.show')
            ->name('show');

        Route::view('/{slug}/book', 'frontend.poojas.book')
            ->name('book');

        Route::view('/{slug}/booking-success', 'frontend.poojas.booking-success')
            ->name('booking.success');

        Route::view('/{slug}/booking-failed', 'frontend.poojas.booking-failed')
            ->name('booking.failed');
    });


/*
|--------------------------------------------------------------------------
| Digital Pooja
|--------------------------------------------------------------------------
*/

Route::prefix('digital-pooja')
    ->name('digital-pooja.')
    ->group(function () {

        Route::view('/', 'frontend.digital-poojas.index')
            ->name('index');

        Route::view('/{slug}', 'frontend.digital-pooja.show')
            ->name('show');

        Route::view('/{slug}/schedule', 'frontend.digital-pooja.schedule')
            ->name('schedule');

        Route::view('/{slug}/join-live', 'frontend.digital-pooja.join-live')
            ->name('join-live');

        Route::view('/{slug}/live', 'frontend.digital-pooja.live')
            ->name('live');

        Route::view('/{slug}/recording', 'frontend.digital-pooja.recording')
            ->name('recording');

        Route::view('/{slug}/booking-success', 'frontend.digital-pooja.booking-success')
            ->name('booking.success');
    });


/*
|--------------------------------------------------------------------------
| Festivals
|--------------------------------------------------------------------------
*/

Route::prefix('festivals')
    ->name('festival.')
    ->group(function () {

        Route::view('/', 'frontend.festivals.index')
            ->name('index');

        Route::view('/calendar', 'frontend.festivals.calendar')
            ->name('calendar');

        Route::view('/{slug}', 'frontend.festivals.show')
            ->name('show');
    });


/*
|--------------------------------------------------------------------------
| Temples
|--------------------------------------------------------------------------
*/

Route::prefix('temples')
    ->name('temple.')
    ->group(function () {

        Route::view('/', 'frontend.temples.index')
            ->name('index');

        Route::view('/{slug}', 'frontend.temples.show')
            ->name('show');

        Route::view('/{slug}/gallery', 'frontend.temples.gallery')
            ->name('gallery');

        Route::view('/{slug}/events', 'frontend.temples.events')
            ->name('events');

        Route::view('/{slug}/events/{event}/register', 'frontend.temples.event-register')
            ->name('event.register');

        Route::view('/{slug}/poojas', 'frontend.temples.poojas')
            ->name('poojas');

        Route::view('/{slug}/donations', 'frontend.temples.donations')
            ->name('donations');

        Route::view('/{slug}/timings', 'frontend.temples.timings')
            ->name('timings');
    });


/*
|--------------------------------------------------------------------------
| Priests / Pandits
|--------------------------------------------------------------------------
*/

Route::prefix('priests')
    ->name('priest.')
    ->group(function () {

        Route::view('/', 'frontend.priests.index')
            ->name('index');

        Route::view('/{slug}', 'frontend.priests.show')
            ->name('show');

        Route::view('/{slug}/book', 'frontend.priests.book')
            ->name('book');

        Route::view('/{slug}/booking-success', 'frontend.priests.booking-success')
            ->name('booking.success');

        Route::view('/{slug}/poojas', 'frontend.priests.poojas')
            ->name('poojas');
    });


/*
|--------------------------------------------------------------------------
| Astrology
|--------------------------------------------------------------------------
*/

Route::prefix('astrology')
    ->name('astrology.')
    ->group(function () {

        Route::view('/', 'frontend.astrology.index')
            ->name('index');

        Route::view('/horoscope', 'frontend.astrology.horoscope')
            ->name('horoscope');

        Route::view('/kundli', 'frontend.astrology.kundli')
            ->name('kundli');

        Route::view('/match-making', 'frontend.astrology.match-making')
            ->name('match-making');

        Route::view('/numerology', 'frontend.astrology.numerology')
            ->name('numerology');

        Route::view('/palm-reading', 'frontend.astrology.palm-reading')
            ->name('palm-reading');

        Route::view('/vastu-consultation', 'frontend.astrology.vastu')
            ->name('vastu');

        Route::view('/booking', 'frontend.astrology.booking')
            ->name('booking');
    });


/*
|--------------------------------------------------------------------------
| Store / Ecommerce
|--------------------------------------------------------------------------
*/

Route::prefix('store')
    ->name('store.')
    ->group(function () {

        Route::view('/', 'frontend.store.index')
            ->name('index');

        Route::view('/products', 'frontend.store.products')
            ->name('products');
			
		Route::view('/wishlist', 'frontend.store.wishlist')
			->name('wishlist');

        Route::view('/products/{slug}', 'frontend.store.product-details')
            ->name('product');

        Route::view('/category/{slug}', 'frontend.store.category')
            ->name('category');

        Route::view('/cart', 'frontend.store.cart')
            ->name('cart');

        Route::view('/checkout', 'frontend.store.checkout')
            ->name('checkout');

        Route::view('/payment', 'frontend.store.payment')
            ->name('payment');

        Route::view('/order-success', 'frontend.store.order-success')
            ->name('order.success');

        Route::view('/order-failed', 'frontend.store.order-failed')
            ->name('order.failed');
    });


/*
|--------------------------------------------------------------------------
| Order Utilities
|--------------------------------------------------------------------------
*/

Route::prefix('orders')
    ->name('orders.')
    ->group(function () {

        Route::view('/{order}/track', 'frontend.orders.track')
            ->name('track');

        Route::view('/{order}/invoice', 'frontend.orders.invoice')
            ->name('invoice');

        Route::view('/{order}', 'frontend.orders.show')
            ->name('show');
    });


/*
|--------------------------------------------------------------------------
| Donations
|--------------------------------------------------------------------------
*/

Route::prefix('donations')
    ->name('donation.')
    ->group(function () {

        Route::view('/', 'frontend.donations.index')
            ->name('index');

        Route::view('/donate', 'frontend.donations.donate')
            ->name('donate');

        Route::view('/success', 'frontend.donations.success')
            ->name('success');
    });


/*
|--------------------------------------------------------------------------
| Blog
|--------------------------------------------------------------------------
*/

Route::prefix('blog')
    ->name('blog.')
    ->group(function () {

        Route::view('/', 'frontend.blog.index')
            ->name('index');

        Route::view('/{slug}', 'frontend.blog.show')
            ->name('show');
    });


/*
|--------------------------------------------------------------------------
| Support
|--------------------------------------------------------------------------
*/

Route::prefix('support')
    ->name('support.')
    ->group(function () {

        Route::view('/', 'frontend.support.help-center')
            ->name('index');

        Route::view('/help-center', 'frontend.support.help-center')
            ->name('help-center');

        Route::view('/contact', 'frontend.support.contact')
            ->name('contact');

        Route::view('/raise-ticket', 'frontend.support.raise-ticket')
            ->name('raise-ticket');

        Route::view('/ticket/{ticket}', 'frontend.support.ticket-details')
            ->name('ticket');

        Route::view('/feedback', 'frontend.support.feedback')
            ->name('feedback');
    });


/*
|--------------------------------------------------------------------------
| Global Search
|--------------------------------------------------------------------------
*/

Route::view('/search', 'frontend.search.index')
    ->name('search');


/*
|--------------------------------------------------------------------------
| CMS / Informational Pages
|--------------------------------------------------------------------------
*/

Route::view('/pages/about-us', 'frontend.pages.about')
    ->name('about');

Route::view('/pages/contact-us', 'frontend.pages.contact')
    ->name('contact');

Route::view('/pages/faq', 'frontend.pages.faq')
    ->name('faq');

Route::view('/pages/privacy-policy', 'frontend.pages.privacy-policy')
    ->name('privacy');

Route::view('/pages/terms-conditions', 'frontend.pages.terms')
    ->name('terms');

Route::view('/pages/refund-policy', 'frontend.pages.refund-policy')
    ->name('refund');

Route::view('/pages/shipping-policy', 'frontend.pages.shipping-policy')
    ->name('shipping');

Route::view('/pages/disclaimer', 'frontend.pages.disclaimer')
    ->name('disclaimer');

Route::view('/pages/careers', 'frontend.pages.careers')
    ->name('careers');

Route::view('/pages/testimonials', 'frontend.pages.testimonials')
    ->name('testimonials');

Route::view('/pages/resources', 'frontend.pages.resources')
    ->name('resources');


/*
|--------------------------------------------------------------------------
| Utility Pages
|--------------------------------------------------------------------------
*/

Route::prefix('system')
    ->name('system.')
    ->group(function () {

        Route::view('/coming-soon', 'frontend.system.coming-soon')
            ->name('coming-soon');

        Route::view('/maintenance', 'frontend.system.maintenance')
            ->name('maintenance');
    });


/*
|--------------------------------------------------------------------------
| HTML Sitemap
|--------------------------------------------------------------------------
*/

Route::view('/sitemap', 'frontend.sitemap')
    ->name('sitemap');


/*
|--------------------------------------------------------------------------
| Customer Dashboard
|--------------------------------------------------------------------------
|
| Authentication middleware will be added during backend/auth phase.
| For now these are static UI routes.
|--------------------------------------------------------------------------
*/

Route::prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {

        Route::view('/', 'frontend.dashboard.index')
            ->name('index');

        Route::view('/profile', 'frontend.dashboard.profile')
            ->name('profile');
			
		Route::view('/profile/edit', 'frontend.dashboard.edit-profile')
			->name('profile.edit');

        Route::view('/addresses', 'frontend.dashboard.addresses')
            ->name('addresses');

        Route::view('/addresses/add', 'frontend.dashboard.add-address')
            ->name('addresses.add');

        Route::view('/bookings', 'frontend.dashboard.bookings')
            ->name('bookings');

        Route::view('/digital-bookings', 'frontend.dashboard.digital-bookings')
            ->name('digital-bookings');

        Route::view('/orders', 'frontend.dashboard.orders')
            ->name('orders');

        Route::view('/wishlist', 'frontend.dashboard.wishlist')
            ->name('wishlist');

        Route::view('/notifications', 'frontend.dashboard.notifications')
            ->name('notifications');

        Route::view('/notifications/{notification}', 'frontend.dashboard.notification-details')
            ->name('notifications.show');

        Route::view('/reviews', 'frontend.dashboard.reviews')
            ->name('reviews');

        Route::view('/coupons', 'frontend.dashboard.coupons')
            ->name('coupons');

        Route::view('/wallet', 'frontend.dashboard.wallet')
            ->name('wallet');

        Route::view('/change-password', 'frontend.dashboard.change-password')
            ->name('change-password');
    });


/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
|
| Single-admin foundation for now.
| Authentication / authorization will be added later.
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::view('/', 'admin.dashboard.index')
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */

        Route::prefix('users')
            ->name('users.')
            ->group(function () {

                Route::view('/', 'admin.users.index')
                    ->name('index');

                Route::view('/create', 'admin.users.create')
                    ->name('create');

                Route::view('/{user}', 'admin.users.show')
                    ->name('show');

                Route::view('/{user}/edit', 'admin.users.edit')
                    ->name('edit');
            });


        /*
        |--------------------------------------------------------------------------
        | Temples
        |--------------------------------------------------------------------------
        */

        Route::prefix('temples')
            ->name('temples.')
            ->group(function () {

                Route::view('/', 'admin.temples.index')
                    ->name('index');

                Route::view('/create', 'admin.temples.create')
                    ->name('create');

                Route::view('/{temple}', 'admin.temples.show')
                    ->name('show');

                Route::view('/{temple}/edit', 'admin.temples.edit')
                    ->name('edit');

                Route::view('/{temple}/gallery', 'admin.temples.gallery')
                    ->name('gallery');

                Route::view('/{temple}/events', 'admin.temples.events')
                    ->name('events');

                Route::view('/{temple}/timings', 'admin.temples.timings')
                    ->name('timings');

                Route::view('/{temple}/donations', 'admin.temples.donations')
                    ->name('donations');

                Route::view('/{temple}/seo', 'admin.temples.seo')
                    ->name('seo');
            });


        /*
        |--------------------------------------------------------------------------
        | Priests
        |--------------------------------------------------------------------------
        */

        Route::prefix('priests')
            ->name('priests.')
            ->group(function () {

                Route::view('/', 'admin.priests.index')
                    ->name('index');

                Route::view('/create', 'admin.priests.create')
                    ->name('create');

                Route::view('/{priest}', 'admin.priests.show')
                    ->name('show');

                Route::view('/{priest}/edit', 'admin.priests.edit')
                    ->name('edit');
            });


        /*
        |--------------------------------------------------------------------------
        | Poojas
        |--------------------------------------------------------------------------
        */

        Route::prefix('poojas')
            ->name('poojas.')
            ->group(function () {

                Route::view('/', 'admin.poojas.index')
                    ->name('index');

                Route::view('/create', 'admin.poojas.create')
                    ->name('create');

                Route::view('/{pooja}', 'admin.poojas.show')
                    ->name('show');

                Route::view('/{pooja}/edit', 'admin.poojas.edit')
                    ->name('edit');
            });


        /*
        |--------------------------------------------------------------------------
        | Digital Pooja
        |--------------------------------------------------------------------------
        */

        Route::prefix('digital-pooja')
            ->name('digital-pooja.')
            ->group(function () {

                Route::view('/', 'admin.digital-pooja.index')
                    ->name('index');

                Route::view('/create', 'admin.digital-pooja.create')
                    ->name('create');

                Route::view('/{pooja}', 'admin.digital-pooja.show')
                    ->name('show');

                Route::view('/{pooja}/edit', 'admin.digital-pooja.edit')
                    ->name('edit');

                Route::view('/schedules', 'admin.digital-pooja.schedules')
                    ->name('schedules');
            });


        /*
        |--------------------------------------------------------------------------
        | Bookings
        |--------------------------------------------------------------------------
        */

        Route::prefix('bookings')
            ->name('bookings.')
            ->group(function () {

                Route::view('/', 'admin.bookings.index')
                    ->name('index');

                Route::view('/{booking}', 'admin.bookings.show')
                    ->name('show');
            });


        /*
        |--------------------------------------------------------------------------
        | Astrology
        |--------------------------------------------------------------------------
        */

        Route::prefix('astrology')
            ->name('astrology.')
            ->group(function () {

                Route::view('/', 'admin.astrology.index')
                    ->name('index');

                Route::view('/bookings', 'admin.astrology.bookings')
                    ->name('bookings');
            });


        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */

        Route::prefix('products')
            ->name('products.')
            ->group(function () {

                Route::view('/', 'admin.products.index')
                    ->name('index');

                Route::view('/create', 'admin.products.create')
                    ->name('create');

                Route::view('/{product}', 'admin.products.show')
                    ->name('show');

                Route::view('/{product}/edit', 'admin.products.edit')
                    ->name('edit');
            });


        /*
        |--------------------------------------------------------------------------
        | Orders
        |--------------------------------------------------------------------------
        */

        Route::prefix('orders')
            ->name('orders.')
            ->group(function () {

                Route::view('/', 'admin.orders.index')
                    ->name('index');

                Route::view('/{order}', 'admin.orders.show')
                    ->name('show');

                Route::view('/{order}/invoice', 'admin.orders.invoice')
                    ->name('invoice');
            });


        /*
        |--------------------------------------------------------------------------
        | Donations
        |--------------------------------------------------------------------------
        */

        Route::prefix('donations')
            ->name('donations.')
            ->group(function () {

                Route::view('/', 'admin.donations.index')
                    ->name('index');

                Route::view('/{donation}', 'admin.donations.show')
                    ->name('show');
            });


        /*
        |--------------------------------------------------------------------------
        | Payments
        |--------------------------------------------------------------------------
        */

        Route::prefix('payments')
            ->name('payments.')
            ->group(function () {

                Route::view('/', 'admin.payments.index')
                    ->name('index');

                Route::view('/{payment}', 'admin.payments.show')
                    ->name('show');
            });


        /*
        |--------------------------------------------------------------------------
        | Coupons
        |--------------------------------------------------------------------------
        */

        Route::prefix('coupons')
            ->name('coupons.')
            ->group(function () {

                Route::view('/', 'admin.coupons.index')
                    ->name('index');

                Route::view('/create', 'admin.coupons.create')
                    ->name('create');

                Route::view('/{coupon}/edit', 'admin.coupons.edit')
                    ->name('edit');
            });


        /*
        |--------------------------------------------------------------------------
        | Banners
        |--------------------------------------------------------------------------
        */

        Route::prefix('banners')
            ->name('banners.')
            ->group(function () {

                Route::view('/', 'admin.banners.index')
                    ->name('index');

                Route::view('/create', 'admin.banners.create')
                    ->name('create');

                Route::view('/{banner}/edit', 'admin.banners.edit')
                    ->name('edit');
            });


        /*
        |--------------------------------------------------------------------------
        | CMS
        |--------------------------------------------------------------------------
        */

        Route::prefix('cms')
            ->name('cms.')
            ->group(function () {

                Route::view('/', 'admin.cms.index')
                    ->name('index');

                Route::view('/pages', 'admin.cms.pages')
                    ->name('pages');

                Route::view('/pages/{page}/edit', 'admin.cms.page-edit')
                    ->name('page.edit');

                Route::view('/blogs', 'admin.cms.blogs')
                    ->name('blogs');

                Route::view('/blogs/create', 'admin.cms.blog-create')
                    ->name('blog.create');

                Route::view('/blogs/{blog}/edit', 'admin.cms.blog-edit')
                    ->name('blog.edit');
            });


        /*
        |--------------------------------------------------------------------------
        | Notifications
        |--------------------------------------------------------------------------
        */

        Route::prefix('notifications')
            ->name('notifications.')
            ->group(function () {

                Route::view('/', 'admin.notifications.index')
                    ->name('index');

                Route::view('/create', 'admin.notifications.create')
                    ->name('create');

                Route::view('/{notification}', 'admin.notifications.show')
                    ->name('show');
            });


        /*
        |--------------------------------------------------------------------------
        | Support
        |--------------------------------------------------------------------------
        */

        Route::prefix('support')
            ->name('support.')
            ->group(function () {

                Route::view('/tickets', 'admin.support.tickets')
                    ->name('tickets');

                Route::view('/tickets/{ticket}', 'admin.support.ticket-details')
                    ->name('ticket');

                Route::view('/feedback', 'admin.support.feedback')
                    ->name('feedback');
            });


        /*
        |--------------------------------------------------------------------------
        | Reports
        |--------------------------------------------------------------------------
        */

        Route::prefix('reports')
            ->name('reports.')
            ->group(function () {

                Route::view('/', 'admin.reports.index')
                    ->name('index');

                Route::view('/bookings', 'admin.reports.bookings')
                    ->name('bookings');

                Route::view('/orders', 'admin.reports.orders')
                    ->name('orders');

                Route::view('/payments', 'admin.reports.payments')
                    ->name('payments');

                Route::view('/donations', 'admin.reports.donations')
                    ->name('donations');
            });


        /*
        |--------------------------------------------------------------------------
        | SEO
        |--------------------------------------------------------------------------
        */

        Route::prefix('seo')
            ->name('seo.')
            ->group(function () {

                Route::view('/', 'admin.seo.index')
                    ->name('index');

                Route::view('/settings', 'admin.seo.settings')
                    ->name('settings');
            });


        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        Route::prefix('settings')
            ->name('settings.')
            ->group(function () {

                Route::view('/', 'admin.settings.index')
                    ->name('index');

                Route::view('/general', 'admin.settings.general')
                    ->name('general');

                Route::view('/notifications', 'admin.settings.notifications')
                    ->name('notifications');

                Route::view('/payment', 'admin.settings.payment')
                    ->name('payment');
            });


        /*
        |--------------------------------------------------------------------------
        | Utilities
        |--------------------------------------------------------------------------
        */

        Route::prefix('utilities')
            ->name('utilities.')
            ->group(function () {

                Route::view('/', 'admin.utilities.index')
                    ->name('index');

                Route::view('/logs', 'admin.utilities.logs')
                    ->name('logs');

                Route::view('/audit', 'admin.utilities.audit')
                    ->name('audit');
            });
    });