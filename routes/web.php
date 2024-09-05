<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CouponController as AdminCouponController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\ItemController as AdminItemController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::get('/offers', [OfferController::class, 'index'])->name('offers');

Route::get('/categories/{slug}', [CategoryController::class, 'slug'])->name('categories.slug');

Route::get('/items/{slug}', [ItemController::class, 'slug'])->name('items.slug');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::post('/search', [SearchController::class, 'index'])->name('search');

Route::post('/message', [MessageController::class, 'store'])->name('message');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/update-to-cart', [CartController::class, 'updateToCart'])->name('update.to.cart');
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove.from.cart');

Route::middleware(['empty'])->get('/empty-cart', [CartController::class, 'empty'])->name('cart.empty');
Route::middleware(['cart'])->get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::middleware(['auth', 'verified', 'cart'])->name('cart.')->group(function () {
    Route::get('/address', [CartController::class, 'address'])->name('address');
    Route::get('/delivery-here/{id}', [CartController::class, 'deliveryHere'])->name('delivery.here');
    Route::middleware(['address'])->group(function () {  
        Route::get('/payment', [CartController::class, 'payment'])->name('payment');
        Route::post('/payment', [CartController::class, 'method'])->name('method');
    });
    Route::post('/promo', [CartController::class, 'promo'])->name('promo');
    Route::post('/reservation', [CartController::class, 'reservation'])->name('reservation');
});

Route::middleware(['auth', 'verified', 'order'])->get('/order-confirm', [CartController::class, 'orderConfirm'])->name('cart.order.confirm');

Route::get('/order-tracking', [OrderController::class, 'tracking'])->name('order.tracking');
Route::put('/order-tracking', [OrderController::class, 'find'])->name('order.find');
Route::delete('/order-tracking', [OrderController::class, 'delete'])->name('order.delete');

Route::middleware(['auth', 'verified', 'cart'])->name('order.')->group(function () {
    Route::post('/', [OrderController::class, 'store'])->name('store');
    Route::post('/success', [OrderController::class, 'success'])->name('success');
    Route::post('/fail', [OrderController::class, 'fail'])->name('fail');
    Route::get('/cancel', [OrderController::class, 'cancel'])->name('cancel');
});

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile-name', [ProfileController::class, 'name'])->name('profile.name');
    Route::put('/profile-email', [ProfileController::class, 'email'])->name('profile.email');
    Route::put('/profile-phone', [ProfileController::class, 'phone'])->name('profile.phone');
    Route::put('/profile-password', [ProfileController::class, 'password'])->name('profile.password');
    Route::put('/profile-picture', [ProfileController::class, 'picture'])->name('profile.picture');

    Route::get('/saved-address', [AddressController::class, 'saved'])->name('saved.address');
    Route::post('/saved-address', [AddressController::class, 'store'])->name('store.address');
    Route::put('/saved-address', [AddressController::class, 'update'])->name('update.address');

    Route::get('/my-review', [ReviewController::class, 'index'])->name('my.review');
    Route::post('/my-review', [ReviewController::class, 'store'])->name('store.review');

    Route::get('/my-order', [OrderController::class, 'myOrder'])->name('my.order');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');

    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::put('/settings-name', [AdminSettingController::class, 'name'])->name('settings.name');
        Route::put('/settings-email', [AdminSettingController::class, 'email'])->name('settings.email');
        Route::put('/settings-phone', [AdminSettingController::class, 'phone'])->name('settings.phone');
        Route::put('/settings-logo', [AdminSettingController::class, 'logo'])->name('settings.logo');
        Route::put('/settings-charge', [AdminSettingController::class, 'charge'])->name('settings.charge');

        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
        Route::put('/categories', [AdminCategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories', [AdminCategoryController::class, 'delete'])->name('categories.delete');

        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::put('/users', [AdminUserController::class, 'update'])->name('users.update');
        Route::delete('/users', [AdminUserController::class, 'delete'])->name('users.delete');

        Route::get('/coupons', [AdminCouponController::class, 'index'])->name('coupons.index');
        Route::post('/coupons', [AdminCouponController::class, 'store'])->name('coupons.store');
        Route::put('/coupons', [AdminCouponController::class, 'update'])->name('coupons.update');
        Route::delete('/coupons', [AdminCouponController::class, 'delete'])->name('coupons.delete');

        Route::get('/faqs', [AdminFaqController::class, 'index'])->name('faqs.index');
        Route::post('/faqs', [AdminFaqController::class, 'store'])->name('faqs.store');
        Route::put('/faqs', [AdminFaqController::class, 'update'])->name('faqs.update');
        Route::delete('/faqs', [AdminFaqController::class, 'delete'])->name('faqs.delete');

        Route::get('/items', [AdminItemController::class, 'index'])->name('items.index');
        Route::post('/items', [AdminItemController::class, 'store'])->name('items.store');
        Route::put('/items', [AdminItemController::class, 'update'])->name('items.update');
        Route::delete('/items', [AdminItemController::class, 'delete'])->name('items.delete');

        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::put('/orders', [AdminOrderController::class, 'update'])->name('orders.update');
        Route::delete('/orders', [AdminOrderController::class, 'delete'])->name('orders.delete');

        Route::get('/messages', [AdminMessageController::class, 'index'])->name('messages.index');
        Route::put('/messages', [AdminMessageController::class, 'reply'])->name('messages.reply');
        Route::delete('/messages', [AdminMessageController::class, 'delete'])->name('messages.delete');
    });
});