<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Website Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('/','App\Http\Controllers\Frontend\PagesController@index')->name('home');

//Product and Product Single
route::get('/shop','App\Http\Controllers\Frontend\PagesController@shop')->name('shop');
route::get('/filter','App\Http\Controllers\Frontend\PagesController@shop_filter')->name('shop_filter');
route::group(['prefix'=>'product'],function(){
    route::get('/details/{slug}','App\Http\Controllers\Frontend\PagesController@productdetail')->name('product.details');
    //Product Search
    route::get('/search','App\Http\Controllers\Frontend\PagesController@search_product')->name('search.product');
    route::get('/search/category','App\Http\Controllers\Frontend\PagesController@category_search_product')->name('category.search.product');
    route::get('/search/menu/{id}','App\Http\Controllers\Frontend\PagesController@menu_search_product')->name('menu.search.product');
    route::get('/search/brand','App\Http\Controllers\Frontend\PagesController@brand_search_product')->name('brand.search.product');
});

//Blog and Blog Single
route::get('/blog','App\Http\Controllers\Frontend\PagesController@blog')->name('blog');
route::get('/blog/{slug}','App\Http\Controllers\Frontend\PagesController@blogdetails')->name('blog.details');

//Blog Post Search
route::get('/search','App\Http\Controllers\Frontend\PagesController@search')->name('search');
route::get('/search/category','App\Http\Controllers\Frontend\PagesController@category_search')->name('category_search');

// Contact Info
route::get('/contact','App\Http\Controllers\Frontend\PagesController@contact')->name('contact');

// Order Store
Route::group(['prefix' => 'checkout'],function(){
    Route::get('/page','App\Http\Controllers\Backend\OrderController@index')->name('checkout.page');
    Route::post('/store','App\Http\Controllers\Backend\OrderController@store')->name('order.submit');
});

//Cart
Route::group(['prefix' => 'cart'], function(){
	Route::get('/manage','App\Http\Controllers\Backend\CartController@index')->name('cart.manage');
	Route::post('/store','App\Http\Controllers\Backend\CartController@store')->name('cart.store');
	Route::post('/update/{id}','App\Http\Controllers\Backend\CartController@update')->name('cart.update');
	Route::post('/delete/{id}','App\Http\Controllers\Backend\CartController@destroy')->name('cart.delete');
});

// Comment
route::group(['prefix'=>'comment'],function(){
    route::get('/manage','App\Http\Controllers\Backend\CommentController@index')->name('comment.manage');
    route::get('/create','App\Http\Controllers\Backend\CommentController@create')->name('comment.create');
    route::post('/create','App\Http\Controllers\Backend\CommentController@store')->name('comment.store');
    route::get('/destroy/{id}','App\Http\Controllers\Backend\CommentController@destroy')->name('comment.delete');
});

//Wishlish
Route::group(['prefix' => 'wishlist'], function(){
	Route::get('/manage','App\Http\Controllers\Backend\WishlistController@index')->name('wishlist.manage');
	Route::post('/store','App\Http\Controllers\Backend\WishlistController@store')->name('wishlist.store');
	Route::post('/delete/{id}','App\Http\Controllers\Backend\WishlistController@destroy')->name('wishlist.delete');
});

// Menu
route::group(['prefix'=>'review'],function(){
    route::get('/manage','App\Http\Controllers\Backend\ReviewController@index')->name('review.manage');
    route::post('/create','App\Http\Controllers\Backend\ReviewController@store')->name('review.store');
    route::post('/approve/{id}','App\Http\Controllers\Backend\ReviewController@update')->name('review.update');
});

// User Home
Route::group(['prefix'=>'customer','middleware' => 'auth:customer'],function(){
    Route::get('home', 'App\Http\Controllers\Backend\UserProfileController@index')->name('account');
    Route::post('/profile/{id}', 'App\Http\Controllers\Backend\UserProfileController@profile')->name('account.profile');
    Route::post('/address/{id}', 'App\Http\Controllers\Backend\UserProfileController@address')->name('account.address');
    Route::post('/password/{id}', 'App\Http\Controllers\Backend\UserProfileController@password')->name('account.password');
    Route::get('/cancel/{id}','App\Http\Controllers\Backend\OrderController@update')->name('order.delete');
});

// Customer Login And Registration
Route::get('/customer/login', 'App\Http\Controllers\Auth\LoginController@showCustomerLoginForm')->name('login.form');
Route::post('/customer/login', 'App\Http\Controllers\Auth\LoginController@customerLogin')->name('login.pro');
Route::get('/customer/register', 'App\Http\Controllers\Auth\RegisterController@showCustomerRegisterForm')->name('reg.form');
Route::post('/customer/register', 'App\Http\Controllers\Auth\RegisterController@createCustomer')->name('reg.pro');



Route::post('payment/omise', 'App\Http\Controllers\Backend\OrderController@omisePayment')->name('payment.omise');

Route::get('payment', 'App\Http\Controllers\Backend\OrderController@payment')->name('payment');
Route::get('cancel', 'App\Http\Controllers\Backend\OrderController@cancel')->name('payment.cancel');
Route::get('payment/success', 'App\Http\Controllers\Backend\OrderController@success')->name('payment.success');

Route::get('newsletter','App\Http\Controllers\Backend\NewsletterController@create');
Route::post('newsletter','App\Http\Controllers\Backend\NewsletterController@store');


Route::get('user-password/reset','App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('user-password/email','App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('user-password/reset/{token}','App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('user-password/reset','App\Http\Controllers\Auth\ResetPasswordController@reset')->name('admin.password.update');

/*
|--------------------------------------------------------------------------
| Website Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);
Route::group(['prefix'=>'admin','middleware' => 'auth'],function(){
    // Dashboard
    route::get('dashboard','App\Http\Controllers\Backend\AdminController@index')->name('dashboard');

    // Category
    route::group(['prefix'=>'category'],function(){
        route::get('/manage','App\Http\Controllers\Backend\CategoryController@index')->name('cat.manage');
        route::get('/create','App\Http\Controllers\Backend\CategoryController@create')->name('cat.create');
        route::post('/create','App\Http\Controllers\Backend\CategoryController@store')->name('cat.store');
        route::get('/edit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->name('cat.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('cat.update');
        route::get('/destroy/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->name('cat.delete');
    });

    // Brand
    route::group(['prefix'=>'brand'],function(){
        route::get('/manage','App\Http\Controllers\Backend\BrandController@index')->name('brand.manage');
        route::get('/create','App\Http\Controllers\Backend\BrandController@create')->name('brand.create');
        route::post('/create','App\Http\Controllers\Backend\BrandController@store')->name('brand.store');
        route::get('/edit/{id}','App\Http\Controllers\Backend\BrandController@edit')->name('brand.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\BrandController@update')->name('brand.update');
        route::post('/destroy/{id}','App\Http\Controllers\Backend\BrandController@destroy')->name('brand.delete');
    });

    // Post
    route::group(['prefix'=>'post'],function(){
        route::get('/manage','App\Http\Controllers\Backend\PostController@index')->name('post.manage');
        route::get('/create','App\Http\Controllers\Backend\PostController@create')->name('post.create');
        route::post('/create','App\Http\Controllers\Backend\PostController@store')->name('post.store');
        route::get('/edit/{id}','App\Http\Controllers\Backend\PostController@edit')->name('post.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\PostController@update')->name('post.update');
        route::get('/destroy/{id}','App\Http\Controllers\Backend\PostController@destroy')->name('post.delete');
    });

    // Product
    route::group(['prefix'=>'product'],function(){
        route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->name('product.manage');
        route::get('/create','App\Http\Controllers\Backend\ProductController@create')->name('product.create');
        route::post('/create','App\Http\Controllers\Backend\ProductController@store')->name('product.store');
        route::get('/show/{id}','App\Http\Controllers\Backend\ProductController@preview')->name('product.show');
        route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->name('product.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\ProductController@update')->name('product.update');
        route::post('/destroy/{id}','App\Http\Controllers\Backend\ProductController@destroy')->name('product.delete');
    });

    // Color
    route::group(['prefix'=>'color'],function(){
        route::get('/manage','App\Http\Controllers\Backend\ColorController@index')->name('color.manage');
        route::get('/create','App\Http\Controllers\Backend\ColorController@create')->name('color.create');
        route::post('/create','App\Http\Controllers\Backend\ColorController@store')->name('color.store');
        route::get('/edit/{id}','App\Http\Controllers\Backend\ColorController@edit')->name('color.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\ColorController@update')->name('color.update');
        route::post('/destroy/{id}','App\Http\Controllers\Backend\ColorController@destroy')->name('color.delete');
    });

    // Order
    route::group(['prefix'=>'order'],function(){
        route::get('/manage','App\Http\Controllers\Backend\OrderController@index')->name('order.manage');
        route::get('/create','App\Http\Controllers\Backend\OrderController@create')->name('order.create');
        route::post('/create','App\Http\Controllers\Backend\OrderController@store')->name('order.store');
        route::get('/show/{id}','App\Http\Controllers\Backend\OrderController@show')->name('order.show');
        route::get('/edit/{id}','App\Http\Controllers\Backend\OrderController@edit')->name('order.edit');
        route::get('/destroy/{id}','App\Http\Controllers\Backend\OrderController@destroy')->name('order.destroy');
        Route::get('/complete/{id}','App\Http\Controllers\Backend\OrderController@complete')->name('order.complete');
        Route::get('/shiped/{id}','App\Http\Controllers\Backend\OrderController@shiped')->name('order.shiped');
        Route::get('/cancel/{id}','App\Http\Controllers\Backend\OrderController@update')->name('order.cancel');
    });

    // Order
    route::group(['prefix'=>'ManageOrder'],function(){
        route::get('/complete','App\Http\Controllers\Backend\OrderManagerController@complete')->name('admin.order.complete');
        route::get('/pending','App\Http\Controllers\Backend\OrderManagerController@pending')->name('admin.order.pending');
        route::get('/cancel','App\Http\Controllers\Backend\OrderManagerController@cancel')->name('admin.order.cancel');
        route::get('/edit/{id}','App\Http\Controllers\Backend\OrderManagerController@edit')->name('admin.order.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\OrderManagerController@update')->name('admin.order.update');
        route::get('/destroy/{id}','App\Http\Controllers\Backend\OrderManagerController@destroy')->name('admin.order.delete');
    });

    // Slider
    route::group(['prefix'=>'slider'],function(){
        route::get('/manage','App\Http\Controllers\Backend\SliderController@index')->name('slider.manage');
        route::get('/create','App\Http\Controllers\Backend\SliderController@create')->name('slider.create');
        route::post('/create','App\Http\Controllers\Backend\SliderController@store')->name('slider.store');
        route::get('/edit/{id}','App\Http\Controllers\Backend\SliderController@edit')->name('slider.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\SliderController@update')->name('slider.update');
        route::post('/destroy/{id}','App\Http\Controllers\Backend\SliderController@destroy')->name('slider.delete');
    });

    // Baner
    route::group(['prefix'=>'baner'],function(){
        route::get('/manage','App\Http\Controllers\Backend\BanerController@index')->name('baner.manage');
        route::get('/create','App\Http\Controllers\Backend\BanerController@create')->name('baner.create');
        route::post('/create','App\Http\Controllers\Backend\BanerController@store')->name('baner.store');
        route::get('/edit/{id}','App\Http\Controllers\Backend\BanerController@edit')->name('baner.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\BanerController@update')->name('baner.update');
        route::post('/destroy/{id}','App\Http\Controllers\Backend\BanerController@destroy')->name('baner.delete');
    });

    // Feature
    route::group(['prefix'=>'feature'],function(){
        route::get('/manage','App\Http\Controllers\Backend\FeaturedController@index')->name('feature.manage');
        route::get('/create','App\Http\Controllers\Backend\FeaturedController@create')->name('feature.create');
        route::post('/create','App\Http\Controllers\Backend\FeaturedController@store')->name('feature.store');
        route::get('/edit/{id}','App\Http\Controllers\Backend\FeaturedController@edit')->name('feature.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\FeaturedController@update')->name('feature.update');
        route::post('/destroy/{id}','App\Http\Controllers\Backend\FeaturedController@destroy')->name('feature.delete');
    });

    // Menu
    route::group(['prefix'=>'menu'],function(){
        route::get('/manage','App\Http\Controllers\Backend\MenuController@index')->name('menu.manage');
        route::get('/create','App\Http\Controllers\Backend\MenuController@create')->name('menu.create');
        route::post('/create','App\Http\Controllers\Backend\MenuController@store')->name('menu.store');
        route::get('/edit/{id}','App\Http\Controllers\Backend\MenuController@edit')->name('menu.edit');
        route::post('/edit/{id}','App\Http\Controllers\Backend\MenuController@update')->name('menu.update');
        route::post('/destroy/{id}','App\Http\Controllers\Backend\MenuController@destroy')->name('menu.delete');
    });

    // Menu
    route::group(['prefix'=>'cms'],function(){
        route::group(['prefix'=>'pageinfo'],function(){
            route::get('/manage','App\Http\Controllers\Backend\PageheaderController@index')->name('header.manage');
            route::get('/edit/{id}','App\Http\Controllers\Backend\PageheaderController@edit')->name('header.edit');
            route::post('/edit/{id}','App\Http\Controllers\Backend\PageheaderController@update')->name('header.update');
        });
        route::group(['prefix'=>'heading'],function(){
            route::get('/manage','App\Http\Controllers\Backend\HeadertitleController@index')->name('heading.manage');
            route::get('/edit/{id}','App\Http\Controllers\Backend\HeadertitleController@edit')->name('heading.edit');
            route::post('/edit/{id}','App\Http\Controllers\Backend\HeadertitleController@update')->name('heading.update');
        });

        route::group(['prefix'=>'contact'],function(){
            route::get('/manage','App\Http\Controllers\Backend\ContactController@index')->name('contact.manage');
            route::get('/edit/{id}','App\Http\Controllers\Backend\ContactController@edit')->name('contact.edit');
            route::post('/edit/{id}','App\Http\Controllers\Backend\ContactController@update')->name('contact.update');
        });

        route::group(['prefix'=>'footer'],function(){
            route::get('/manage','App\Http\Controllers\Backend\FooterController@index')->name('footer.manage');
            route::get('/edit/{id}','App\Http\Controllers\Backend\FooterController@edit')->name('footer.edit');
            route::post('/edit/{id}','App\Http\Controllers\Backend\FooterController@update')->name('footer.update');
        });
    });
    Route::prefix('customer')->group(function () {
        Route::get('/manage','App\Http\Controllers\Backend\UserController@user_index')->name('user.manage');
        Route::get('/create','App\Http\Controllers\Backend\UserController@user_create')->name('user.create');
        Route::post('/store','App\Http\Controllers\Backend\UserController@user_store')->name('user.store');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\UserController@user_edit')->name('user.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\UserController@user_update')->name('user.update');
        Route::get('/delete/{id}','App\Http\Controllers\Backend\UserController@user_destroy')->name('user.delete');
    });
    Route::prefix('admin')->group(function () {
        Route::get('/manage','App\Http\Controllers\Backend\UserController@admin_index')->name('admin.manage');
        Route::get('/create','App\Http\Controllers\Backend\UserController@admin_create')->name('admin.create');
        Route::post('/store','App\Http\Controllers\Backend\UserController@admin_store')->name('admin.store');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\UserController@admin_edit')->name('admin.edit');
        Route::post('/update/{id}','App\Http\Controllers\Backend\UserController@admin_update')->name('admin.update');
        Route::get('/delete/{id}','App\Http\Controllers\Backend\UserController@admin_destroy')->name('admin.delete');
    });
	//District Route
	Route::group(['prefix' => 'delivery'], function(){
        Route::group(['prefix' => 'country'], function(){
            Route::get('/manage','App\Http\Controllers\Backend\CountryController@index')->name('country.manage');
            Route::get('/create','App\Http\Controllers\Backend\CountryController@create')->name('country.create');
            Route::post('/store','App\Http\Controllers\Backend\CountryController@store')->name('country.store');
            Route::get('/edit/{id}','App\Http\Controllers\Backend\CountryController@edit')->name('country.edit');
            Route::post('/update/{id}','App\Http\Controllers\Backend\CountryController@update')->name('country.update');
            Route::get('/delete/{id}','App\Http\Controllers\Backend\CountryController@destroy')->name('country.delete');
	    });
        Route::group(['prefix' => 'state'], function(){
            Route::get('/manage','App\Http\Controllers\Backend\StateController@index')->name('state.manage');
            Route::get('/create','App\Http\Controllers\Backend\StateController@create')->name('state.create');
            Route::post('/store','App\Http\Controllers\Backend\StateController@store')->name('state.store');
            Route::get('/edit/{id}','App\Http\Controllers\Backend\StateController@edit')->name('state.edit');
            Route::post('/update/{id}','App\Http\Controllers\Backend\StateController@update')->name('state.update');
            Route::get('/delete/{id}','App\Http\Controllers\Backend\StateController@destroy')->name('state.delete');
	    });
        Route::group(['prefix' => 'city'], function(){
            Route::get('/manage','App\Http\Controllers\Backend\CityController@index')->name('city.manage');
            Route::get('/create','App\Http\Controllers\Backend\CityController@create')->name('city.create');
            Route::post('/store','App\Http\Controllers\Backend\CityController@store')->name('city.store');
            Route::get('/edit/{id}','App\Http\Controllers\Backend\CityController@edit')->name('city.edit');
            Route::post('/update/{id}','App\Http\Controllers\Backend\CityController@update')->name('city.update');
            Route::get('/delete/{id}','App\Http\Controllers\Backend\CityController@destroy')->name('city.delete');
	    });
	});
    Route::group(['prefix' => 'WebsiteSettings'], function(){
        Route::get('/info','App\Http\Controllers\Backend\WebSettingsController@info_show')->name('info.show');
        Route::get('/optimization','App\Http\Controllers\Backend\WebSettingsController@optimize_show')->name('optimize.show');
        Route::get('/payment-settings','App\Http\Controllers\Backend\WebSettingsController@payment_show')->name('payment.settings');
        Route::post('/payment-settings','App\Http\Controllers\Backend\WebSettingsController@update_payment')->name('payment.settings.update');
        Route::get('/edit/{id}','App\Http\Controllers\Backend\WebSettingsController@edit')->name('edit');
        Route::post('/edit/{id}','App\Http\Controllers\Backend\WebSettingsController@update_info')->name('edit.update');
	});

    Route::get('/cache', function() {
        $exitCode = Artisan::call('cache:clear');
        return redirect()->route('optimize.show');
    })->name('cache');
    Route::get('/optimize', function() {
        $exitCode = Artisan::call('optimize');
        return redirect()->route('optimize.show');
    })->name('optimize');
    Route::get('/config', function() {
        $exitCode = Artisan::call('config:cache');
        return redirect()->route('optimize.show');
    })->name('config');
    Route::get('/event', function() {
        $exitCode = Artisan::call('event:cache');
        return redirect()->route('optimize.show');
    })->name('event');
    Route::get('/route', function() {
        $exitCode = Artisan::call('route:clear');
        return redirect()->route('optimize.show');
    })->name('route');
    Route::get('/view', function() {
        $exitCode = Artisan::call('view:clear');
        return redirect()->route('optimize.show');
    })->name('view');
    Route::get('/totaloptimize', function() {
        Artisan::call('cache:clear');
        Artisan::call('optimize');
        Artisan::call('config:cache');
        Artisan::call('event:cache');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return "Cleared!";
    });

});
