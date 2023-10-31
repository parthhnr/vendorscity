<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\Colourcontroller;
use App\Http\Controllers\admin\Materialcontroller;
use App\Http\Controllers\admin\Style_typecontroller;
use App\Http\Controllers\admin\CollectionController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\Coupancontroller;
use App\Http\Controllers\admin\GroupController;
use App\Http\Controllers\admin\SubBannerController;
use App\Http\Controllers\admin\UserPermissionController;
use App\Http\Controllers\admin\Admin_userController;
use App\Http\Controllers\admin\CmsController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\SubscribeController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\StateController;



use App\Http\Controllers\front\UserRegistration\UserRegistration;
use App\Http\Controllers\front\checkoutcontroller;








// Route::get('/', function () {
//     return view('welcome');
// });

/*------Front routes start ------*/


Route::get('/', '\App\Http\Controllers\front\Homecontroller@index');

Route::get('/product-detail/{page_url}', '\App\Http\Controllers\front\Front_productcontroller@product_detail');
Route::get('/cart', '\App\Http\Controllers\front\Homecontroller@cart');

Route::get('/wishlist', '\App\Http\Controllers\front\Homecontroller@wishlist');
Route::get('/my-profile', '\App\Http\Controllers\front\Homecontroller@my_profile');
Route::get('/my-orders', '\App\Http\Controllers\front\Homecontroller@my_orders');
Route::get('/edit-profile', '\App\Http\Controllers\front\Homecontroller@edit_profile');
Route::get('/edit-address', '\App\Http\Controllers\front\Homecontroller@edit_address');
Route::get('/add-address', '\App\Http\Controllers\front\Homecontroller@add_address');
Route::get('/about-company', '\App\Http\Controllers\front\Homecontroller@about_company');
Route::get('/our-services', '\App\Http\Controllers\front\Homecontroller@our_services');
Route::get('/latest-blogs', '\App\Http\Controllers\front\Homecontroller@latest_blogs');
Route::get('/contact-us', '\App\Http\Controllers\front\Homecontroller@contact_us');
Route::get('/terms-conditions', '\App\Http\Controllers\front\Homecontroller@terms_conditions');
Route::get('/privacy-policy', '\App\Http\Controllers\front\Homecontroller@privacy_policy');
Route::get('/what-we-offer', '\App\Http\Controllers\front\Homecontroller@what_we_offer');
Route::get('/return', '\App\Http\Controllers\front\Homecontroller@return');

Route::get('/product/{groupurl}', '\App\Http\Controllers\front\Front_productcontroller@product_listing');
Route::get('/product/{groupurl}/{cat_url}', '\App\Http\Controllers\front\Front_productcontroller@product_listing');
Route::get('/product/{groupurl}/{cat_url}/{subcat_url}', '\App\Http\Controllers\front\Front_productcontroller@product_listing');

Route::get('/collection/{page_url}', '\App\Http\Controllers\front\Front_productcontroller@collection');


Route::post('size_show','\App\Http\Controllers\front\Front_productcontroller@size_show');
Route::post('price_show','\App\Http\Controllers\front\Front_productcontroller@price_show');

Route::post('add_to_cart','\App\Http\Controllers\front\Cartcontroller@add_to_cart');
Route::post('cart_remove', '\App\Http\Controllers\front\Cartcontroller@cart_remove');
Route::post('empty_cart', '\App\Http\Controllers\front\Cartcontroller@empty_cart');
Route::post('update_cart', '\App\Http\Controllers\front\Cartcontroller@update_cart');
Route::post('couponcheck', '\App\Http\Controllers\front\Cartcontroller@couponcheck');
Route::post('removecoupon', '\App\Http\Controllers\front\Cartcontroller@removecoupon');

Route::get('/checkout', '\App\Http\Controllers\front\checkoutcontroller@checkout');


// Route::get('/thank-you', 'checkoutcontroller@thank_you')->name('thank_you');
Route::get('thankyou', [checkoutcontroller::class, 'thankyou'])->name("thankyou");




Route::post('/ship_state_change', '\App\Http\Controllers\front\checkoutcontroller@ship_state_change');
Route::post('/bill_state_change', '\App\Http\Controllers\front\checkoutcontroller@bill_state_change');
Route::post('/order_place', '\App\Http\Controllers\front\checkoutcontroller@order_place')->name('order_place');



Route::controller(UserRegistration::class)->group(function () {

    Route::match(['get', 'post'], '/signup', 'register')->name('signup');
    Route::match(['get', 'post'], '/signin', 'login')->name('signin');
    Route::post('checkmail', 'checkmail');
    Route::post('check-login','checklogin');
    Route::post('email-check-login','emailCheck');

    
    Route::post('resetpassword', 'get_password')->name('reset-password');
    Route::get('reset-password/{uid}', 'reset_password')->name('reset_password');
    Route::post('set_password/{uid}', 'set_password')->name('set_password');
    Route::get('forget-password','lost_password');
    Route::get('signout','signout');


    Route::get('/my-profile', 'my_profile');
    Route::get('/my-orders', 'my_orders');
    Route::get('/edit-profile', 'edit_profile');
    Route::get('/edit-address/{id}', 'edit_address');
    Route::get('/add-address', 'add_address');
    Route::get('/wishlist', 'wishlist');
    Route::post('update-profile', 'update_profile')->name('update_profile');
    Route::post('add-address', 'add_useraddress')->name('add_address');
    Route::post('update-address', 'update_address')->name('update_address');
});

/*------End Front routes  ------*/





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/admin/category', '\App\Http\Controllers\admin\CategoryController');
    Route::get('/admin/delete', [CategoryController::class, 'destroy'])->name('delete');
    Route::post('set_order_category', '\App\Http\Controllers\admin\CategoryController@set_order_category');

    Route::resource('/admin/subcategory', '\App\Http\Controllers\admin\SubcategoryController');
    Route::get('/admin/delete_subcategory', [SubcategoryController::class, 'destroy'])->name('delete_subcategory');
    Route::post('set_order_subcategory', '\App\Http\Controllers\admin\SubcategoryController@set_order');


    Route::resource('/admin/banner', '\App\Http\Controllers\admin\BannerController');
    Route::get('/admin/delete_banner', [BannerController::class, 'destroy'])->name('delete_banner');
    Route::post('set_order_banner', '\App\Http\Controllers\admin\BannerController@set_order');


    Route::resource('/admin/size', '\App\Http\Controllers\admin\SizeController');
    Route::get('/admin/delete_size', [SizeController::class, 'destroy'])->name('delete_size');


    Route::resource('/admin/colour', '\App\Http\Controllers\admin\Colourcontroller');
    Route::get('/admin/delete_colour', [Colourcontroller::class, 'destroy'])->name('delete_colour');

    Route::resource('/admin/material', '\App\Http\Controllers\admin\Materialcontroller');
    Route::get('/admin/delete_material', [Materialcontroller::class, 'destroy'])->name('delete_material');

    Route::resource('/admin/style_type', '\App\Http\Controllers\admin\Style_typecontroller');
    Route::get('/admin/delete_style_type', [Style_typecontroller::class, 'destroy'])->name('delete_style_type');

    Route::resource('admin/collection', '\App\Http\Controllers\admin\CollectionController');
    Route::get('/admin/delete_collection', [CollectionController::class, 'destroy'])->name('delete_collection');
    Route::post('collection_set_order', '\App\Http\Controllers\admin\CollectionController@collection_set_order');


    Route::resource('/admin/product', '\App\Http\Controllers\admin\ProductController');
    Route::get('/admin/delete_product', [ProductController::class, 'destroy'])->name('delete_product');
    Route::post('product_show_subcategory', '\App\Http\Controllers\admin\ProductController@product_show_subcategory');
    Route::get('remove_product_att/{pid}/{id}', [ProductController::class, 'remove_product_att'])->name('remove_product_att');
    Route::post('product_feature', '\App\Http\Controllers\admin\ProductController@product_feature');
    Route::post('product_recent', '\App\Http\Controllers\admin\ProductController@product_recent');
    Route::post('product_sale', '\App\Http\Controllers\admin\ProductController@product_sale');
    Route::post('product_hot', '\App\Http\Controllers\admin\ProductController@product_hot');
    Route::post('product_new', '\App\Http\Controllers\admin\ProductController@product_new');
    Route::post('product_best_seller', '\App\Http\Controllers\admin\ProductController@product_best_seller');
    Route::get('editimage/{id}', [ProductController::class, 'editimage'])->name('editimage');
    Route::post('editimage_store', [ProductController::class, 'editimage_store'])->name('editimage_store');
    Route::post('product_setbaseimage', [ProductController::class, 'product_setbaseimage'])->name('product_setbaseimage');
    Route::post('product_setbaseimghover', [ProductController::class, 'product_setbaseimghover'])->name('product_setbaseimghover');
    Route::get('product_removeimage/{pid}/{id}', [ProductController::class, 'product_removeimage'])->name('product_removeimage');

    Route::resource('admin/blog', '\App\Http\Controllers\admin\BlogController');
    Route::get('/admin/delete_blog', [BlogController::class, 'destroy'])->name('delete_blog');


    Route::resource('/admin/coupan', '\App\Http\Controllers\admin\Coupancontroller');
    Route::get('/admin/delete_coupan', [Coupancontroller::class, 'destroy'])->name('delete_coupan');

    Route::post('coupan_show_category', 'App\Http\Controllers\admin\Coupancontroller@coupan_show_category');
    Route::post('show_subcategory', 'App\Http\Controllers\admin\Coupancontroller@show_subcategory');
    Route::post('change_status_coupan','App\Http\Controllers\admin\Coupancontroller@change_status_coupan');
    Route::get('/admin/delete_coupan', [Coupancontroller::class, 'destroy'])->name('delete_coupan');

    Route::resource('/admin/group', '\App\Http\Controllers\admin\GroupController');
    Route::get('/admin/delete_group', [GroupController::class, 'destroy'])->name('delete_group');
    Route::post('set_order_group', '\App\Http\Controllers\admin\GroupController@set_order');


    Route::post('group_shows_category','App\Http\Controllers\admin\SubcategoryController@group_shows_category');
    Route::post('product_show_category','App\Http\Controllers\admin\ProductController@product_show_category');

    Route::resource('/admin/subbanner', '\App\Http\Controllers\admin\SubBannerController');
    Route::get('/admin/delete_subbanner', [SubBannerController::class, 'destroy'])->name('delete_subbanner');    
    Route::post('set_order_subbanner', '\App\Http\Controllers\admin\SubBannerController@set_order_subbanner');


    Route::resource('/admin/permission', '\App\Http\Controllers\admin\PermissionController');
    
    Route::resource('/admin/userpermission', '\App\Http\Controllers\admin\UserPermissionController');
    Route::get('delete_permission', [UserPermissionController::class, 'delete_permission'])->name('delete_permission');
    Route::get('destroyPermission', [UserPermissionController::class, 'destroyPermission'])->name('destroyPermission');
    

    Route::resource('/admin/adminuser', '\App\Http\Controllers\admin\Admin_userController');
    Route::get('/admin/delete_admin', [Admin_userController::class, 'destroy'])->name('delete_admin'); 
    
    
    Route::resource('admin/cms','App\Http\Controllers\admin\CmsController');
    Route::get('cms-delete',[CmsController::class,'destroy'])->name('cms-delete');

    Route::resource('admin/customer','App\Http\Controllers\admin\CustomerController');

    Route::resource('admin/subscribe','App\Http\Controllers\admin\SubscribeController');   
    Route::get('delete_subscribe',[SubscribeController::class,'destroy'])->name('delete_subscribe');

    Route::resource('admin/country','App\Http\Controllers\admin\CountryController');
    Route::get('delete_country',[CountryController::class,'destroy'])->name('delete_country');


    Route::resource('admin/state','App\Http\Controllers\admin\StateController');
    Route::get('delete_state',[StateController::class,'destroy'])->name('delete_state');



    

});

    Route::get('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';