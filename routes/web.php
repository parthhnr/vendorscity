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
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\Ordercontroller;
use App\Http\Controllers\admin\ReviewController;

// Route::get('/', function () {
//     return view('welcome');
// });

//Clear config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
}); 
// Clear application cache:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});
// Clear view cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});
 Route::get('/optimize-clear', function() {
    $exitCode = Artisan::call('optimize:clear');
    return 'Application cache cleared successfully';
});

/*------Front routes start ------*/




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

    Route::resource('admin/city','App\Http\Controllers\admin\CityController');
    Route::get('/admin/delete_city', [CityController::class, 'destroy'])->name('delete_city');
    Route::post('state_show', 'App\Http\Controllers\admin\CityController@state_show');


    Route::resource('admin/order','App\Http\Controllers\admin\Ordercontroller');  
    Route::get('delete_order',[Ordercontroller::class,'destroy'])->name('delete_order');
    Route::get('admin/order/detail/{order_id}', [Ordercontroller::class, 'detail'])->name('detail');


    Route::resource('admin/review','App\Http\Controllers\admin\ReviewController');   
    Route::get('delete_review',[ReviewController::class,'destroy'])->name('delete_review');
    Route::post('change_status_review','App\Http\Controllers\admin\ReviewController@change_status_review');
    

});

    Route::get('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';