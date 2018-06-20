<?php

//AdminRoutes

Route::namespace('Admin')->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/home', 'HomeController@index')->name('admin.home');
        Route::resource('/admins', 'AdminController');
        Route::resource('/products', 'ProductController');
        Route::post('/products/change', 'ProductController@change');
        Route::resource('/users', 'UserController');
        Route::resource('/coupons', 'CouponController');
        Route::post('/coupon/send', 'CouponController@sendCoupon')->name('coupons.send');
        Route::post('/users/sendMail', 'UserController@sendMail')->name('users.sendMail');
        Route::get('/orders', 'OrderController@index')->name('orders.index');
        Route::post('/yes_order', 'OrderController@YesFunction')->name('order.yes');
        Route::post('/accept_order', 'OrderController@AcceptFunction')->name('order.accept');
        Route::post('/no_order', 'OrderController@NoFunction')->name('order.no');
        Route::get('/fulfilled_order', 'FulfilledOrderController@index')->name('fulfilled_order.index');
        Route::get('/analytics', 'AnalyticController@index')->name('analytics.index');
        Route::post('/analytics/sales', 'AnalyticController@sales')->name('analytics.sales');

        // AdminAuth
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    });
});

//UserRoutes

Route::namespace('User')->group(function () {
    Route::get('/home','HomeController@index')->name('home');
    Route::get('/profile','ProfileController@index')->name('profile');
    Route::post('/profile','ProfileController@info')->name('profile.info');
    Route::get('cart','CartController@index')->name('cart');
    Route::post('cart','CartController@store')->name('cart.store');
    Route::post('/cart/delete','CartController@delete')->name('cart.delete');
    Route::post('/cart/qty','CartController@qty')->name('cart.qty');
    Route::post('/coupon','CouponController@coupon')->name('coupon');
    Route::get('/coupon/destroy','CouponController@destroy')->name('coupon.destroy');
    Route::post('/contact','HomeController@contact')->name('contact');
    Route::get('/pre-checkout','CheckoutController@index')->name('pre-checkout');
    Route::post('/checkout','CheckoutController@store')->name('pre-checkout.store');
    Route::post('/order','OrderController@store')->name('order.delivery');
    Route::get('/', function () { return view('user.preload'); });

    Route::post('/payment_paypal','PaymentController@payment_paypal')->name('payment_paypal');
    Route::get('/status', 'PaymentController@getPaymentStatus')->name('status');

    Route::post('/payment_credit_card','PaymentController@payment_credit_card')->name('payment_credit_card');

    Route::get('404', function () {
        return view('user.404');
    })->name('404');

    Route::get('checkout', function () {
        return view('user.checkout');
    });


    //UserAuth
    Auth::routes();

    Route::get('/login/google', 'Auth\LoginController@redirectToProvider')->name('google.login');
    Route::get('/login/google/callback', 'Auth\LoginController@handleProviderCallback');
});

