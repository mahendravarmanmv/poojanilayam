<?php

use App\Http\Controllers\Web\PoojaController;
use App\Http\Controllers\Web\DigitalPoojaController;
use App\Http\Controllers\Web\PriestController;
use App\Http\Controllers\Web\TempleController;
use App\Http\Controllers\Web\StoreCatalogController;
use App\Http\Controllers\Web\StoreCartController;
use App\Http\Controllers\Web\StoreCheckoutController;
use App\Http\Controllers\Web\StoreWishlistController;
use App\Http\Controllers\Web\DonationController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\CmsController;
use App\Http\Controllers\Web\NewsletterController;
use App\Http\Controllers\Web\SupportController;
use App\Http\Controllers\Web\SearchController;
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

require __DIR__ . '/auth-web.php';

/*
|--------------------------------------------------------------------------
| Poojas
|--------------------------------------------------------------------------
*/

Route::prefix('poojas')
    ->name('pooja.')
    ->group(function () {

        Route::get('/', [PoojaController::class, 'index'])
            ->name('index');

        Route::get('/categories', [PoojaController::class, 'categories'])
            ->name('categories');

        Route::get('/category/{slug}', [PoojaController::class, 'category'])
            ->name('category');

        Route::get('/{slug}', [PoojaController::class, 'show'])
            ->name('show');

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

        Route::get('/', [DigitalPoojaController::class, 'index'])
            ->name('index');

        Route::get('/{slug}', [DigitalPoojaController::class, 'show'])
            ->name('show');

        Route::get('/{slug}/schedule', [DigitalPoojaController::class, 'schedule'])
            ->name('schedule');

        Route::view('/{slug}/join-live', 'frontend.digital-poojas.join')
            ->name('join-live');

        Route::view('/{slug}/live', 'frontend.digital-poojas.live')
            ->name('live');

        Route::view('/{slug}/recording', 'frontend.digital-poojas.recording')
            ->name('recording');

        Route::view('/{slug}/booking-success', 'frontend.digital-poojas.booking-success')
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

        Route::get('/', [\App\Http\Controllers\FestivalController::class, 'index'])
            ->name('index');

        Route::get('/calendar', [\App\Http\Controllers\FestivalController::class, 'calendar'])
            ->name('calendar');

        Route::get('/{slug}', [\App\Http\Controllers\FestivalController::class, 'show'])
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

        Route::get('/', [TempleController::class, 'index'])
            ->name('index');

        Route::get('/{slug}', [TempleController::class, 'show'])
            ->name('show');

        Route::get('/{slug}/gallery', [TempleController::class, 'gallery'])
            ->name('gallery');

        Route::get('/{slug}/events', [TempleController::class, 'events'])
            ->name('events');

        Route::view('/{slug}/events/{event}/register', 'frontend.temples.event-register')
            ->name('event.register');

        Route::get('/{slug}/poojas', [TempleController::class, 'poojas'])
            ->name('poojas');

        Route::get('/{slug}/donations', [TempleController::class, 'donations'])
            ->name('donations');

        Route::get('/{slug}/timings', [TempleController::class, 'timings'])
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

        Route::get('/', [PriestController::class, 'index'])
            ->name('index');

        Route::get('/{slug}', [PriestController::class, 'show'])
            ->name('show');

        Route::get('/{slug}/book', [PriestController::class, 'book'])
            ->name('book');

        Route::view('/{slug}/booking-success', 'frontend.priests.booking-success')
            ->name('booking.success');

        Route::get('/{slug}/poojas', [PriestController::class, 'poojas'])
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

        Route::get('/', [\App\Http\Controllers\Web\AstrologyController::class, 'index'])
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

        Route::view('/vastu-consultation', 'frontend.astrology.vastu-consultation')
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

        Route::get('/', [StoreCatalogController::class, 'index'])
            ->name('index');

        Route::get('/products', [StoreCatalogController::class, 'index'])
            ->name('products');
			
        Route::middleware('auth')->group(function () {
            Route::get('/wishlist', [StoreWishlistController::class, 'index'])->name('wishlist');
            Route::post('/wishlist/items', [StoreWishlistController::class, 'add'])->name('wishlist.add');
            Route::delete('/wishlist/items', [StoreWishlistController::class, 'remove'])->name('wishlist.remove');

            Route::get('/cart', [StoreCartController::class, 'index'])->name('cart');
            Route::post('/cart/items', [StoreCartController::class, 'add'])->name('cart.add');
            Route::patch('/cart/items', [StoreCartController::class, 'update'])->name('cart.update');
            Route::delete('/cart/items', [StoreCartController::class, 'remove'])->name('cart.remove');
            Route::delete('/cart', [StoreCartController::class, 'clear'])->name('cart.clear');
			
			Route::get('/checkout', [StoreCheckoutController::class, 'index'])->name('checkout');
			Route::post('/checkout', [StoreCheckoutController::class, 'store'])->name('checkout.store');
        });

        Route::get('/products/{slug}', [StoreCatalogController::class, 'show'])
            ->name('product');

        Route::get('/category/{slug}', [StoreCatalogController::class, 'category'])
            ->name('category');        

        Route::view('/payment', 'frontend.store.payment')
            ->name('payment');

        // Public order tracking entry point.
        Route::view('/track-order', 'frontend.orders.track')
            ->name('track-order');

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

        Route::get('/', [DonationController::class, 'index'])
            ->name('index');

        Route::get('/donate', [DonationController::class, 'donate'])
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

        Route::get('/', [BlogController::class, 'index'])
            ->name('index');

        Route::get('/{slug}', [BlogController::class, 'show'])
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

        Route::get('/', [SupportController::class, 'index'])
            ->name('index');

        Route::get('/help-center', [SupportController::class, 'helpCenter'])
            ->name('help-center');

        Route::get('/contact', [SupportController::class, 'contact'])
            ->name('contact');

        Route::post('/contact', [SupportController::class, 'submitContact'])
            ->name('contact.submit');

        Route::middleware('auth')->group(function () {
            Route::get('/raise-ticket', [SupportController::class, 'raiseTicket'])
                ->name('raise-ticket');

            Route::post('/raise-ticket', [SupportController::class, 'storeTicket'])
                ->name('raise-ticket.store');

            Route::get('/tickets', [SupportController::class, 'tickets'])
                ->name('tickets');

            Route::get('/ticket/{ticket}', [SupportController::class, 'showTicket'])
                ->name('ticket');

            Route::post('/ticket/{ticket}/reply', [SupportController::class, 'replyToTicket'])
                ->name('ticket.reply');

            Route::post('/ticket/{ticket}/close', [SupportController::class, 'closeTicket'])
                ->name('ticket.close');

            Route::get('/feedback', [SupportController::class, 'feedback'])
                ->name('feedback');

            Route::post('/feedback', [SupportController::class, 'submitFeedback'])
                ->name('feedback.submit');
        });
    });


/*
|--------------------------------------------------------------------------
| Global Search
|--------------------------------------------------------------------------
*/

Route::get('/search', [SearchController::class, 'index'])
    ->name('search');

Route::post('/newsletter/subscribe', [NewsletterController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('newsletter.subscribe');


/*
|--------------------------------------------------------------------------
| CMS / Informational Pages
|--------------------------------------------------------------------------
*/

Route::get('/pages/about-us', [CmsController::class, 'about'])
    ->name('about');

Route::get('/pages/faq', [CmsController::class, 'faq'])
    ->name('faq');

Route::get('/pages/privacy-policy', [CmsController::class, 'privacyPolicy'])
    ->name('privacy');

Route::get('/pages/terms-conditions', [CmsController::class, 'termsConditions'])
    ->name('terms');

Route::get('/pages/refund-policy', [CmsController::class, 'refundPolicy'])
    ->name('refund');

Route::get('/pages/shipping-policy', [CmsController::class, 'shippingPolicy'])
    ->name('shipping');

Route::get('/pages/disclaimer', [CmsController::class, 'disclaimer'])
    ->name('disclaimer');

Route::get('/pages/careers', [CmsController::class, 'careers'])
    ->name('careers');

Route::get('/pages/testimonials', [CmsController::class, 'testimonials'])
    ->name('testimonials');

Route::view('/pages/resources', 'frontend.cms.resources')
    ->name('resources');


/*
|--------------------------------------------------------------------------
| Utility Pages
|--------------------------------------------------------------------------
*/

Route::prefix('system')
    ->name('system.')
    ->group(function () {

        Route::view('/coming-soon', 'frontend.cms.coming-soon')
            ->name('coming-soon');

        Route::view('/maintenance', 'frontend.cms.maintenance')
            ->name('maintenance');
    });

/*
|--------------------------------------------------------------------------
| Error / Utility Pages
|--------------------------------------------------------------------------
| These routes expose the designed frontend error pages for direct QA and
| controlled links. Laravel's global exception rendering is intentionally
| left unchanged in this phase.
|--------------------------------------------------------------------------
*/

Route::view('/403', 'frontend.cms.403')
    ->name('system.403');

Route::view('/404', 'frontend.cms.404')
    ->name('system.404');

Route::view('/500', 'frontend.cms.500')
    ->name('system.500');


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
*/

require __DIR__ . '/customer-dashboard.php';
require __DIR__ . '/customer-security.php';
require __DIR__ . '/customer-family-members.php';
require __DIR__ . '/customer-profile-completion.php';
require __DIR__ . '/customer-preferences.php';
require __DIR__ . '/customer-notifications.php';
require __DIR__ . '/booking.php';
require __DIR__ . '/customer-bookings.php';


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