<?php
use Illuminate\Support\Facades\Auth;
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
use App\Http\Controllers\admin\UserPermissionController;
use App\Http\Controllers\admin\Admin_userController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SubserviceController;
use App\Http\Controllers\admin\VendorsController;

use App\Http\Controllers\admin\VendorsProfileController;

use App\Http\Controllers\admin\Pricecontroller;
use App\Http\Controllers\admin\SubscriptionController;
use App\Http\Controllers\admin\Subscriptiondetails_controller;
use App\Http\Controllers\admin\Leadscontroller;
use App\Http\Controllers\admin\AcceptLeadscontroller;


// Route::get('/', function () {
//     return view('welcome');
// });

//Clear config cache:
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return 'Config cache cleared';
}); 
// Clear application cache:
// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     return 'Application cache cleared';
// });
// // Clear view cache:
// Route::get('/view-clear', function() {
//     $exitCode = Artisan::call('view:clear');
//     return 'View cache cleared';
// });
//  Route::get('/optimize-clear', function() {
//     $exitCode = Artisan::call('optimize:clear');
//     return 'Application cache cleared successfully';
// });

/*------Front routes start ------*/




/*------End Front routes  ------*/

/*------vendors routes start ------*/

Route::get('/dashboard', '\App\Http\Controllers\admin\HomeController@redirectToDashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


    Route::get('/vendors', function () {
    return view('admin.vendorsdashboard');
})->middleware(['auth', 'verified'])->name('vendor.dashboard');

Route::get('/admin', function () {
    //echo "Welcome Admin";exit;
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

// Route::get('/vendor', function () {

//     echo "Welcome Vendor";exit;
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('vendor.dashboard');



// Route::middleware(['auth', 'verified'])->group(function () {

//     echo "Welcome vendor";exit;
//     Route::get('/vendor', 'VendorController@index')->name('vendor.dashboard');
//     // Define other vendor-specific routes here
// });





/*------vendors Front routes  ------*/





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {



    Route::resource('/admin/permission', '\App\Http\Controllers\admin\PermissionController');
    
    Route::resource('/admin/userpermission', '\App\Http\Controllers\admin\UserPermissionController');
    Route::get('delete_permission', [UserPermissionController::class, 'delete_permission'])->name('delete_permission');
    Route::get('destroyPermission', [UserPermissionController::class, 'destroyPermission'])->name('destroyPermission');    

    Route::resource('/admin/adminuser', '\App\Http\Controllers\admin\Admin_userController');
    Route::get('/admin/delete_admin', [Admin_userController::class, 'destroy'])->name('delete_admin');  

    Route::resource('admin/country','App\Http\Controllers\admin\CountryController');
    Route::get('delete_country',[CountryController::class,'destroy'])->name('delete_country');

    Route::resource('admin/state','App\Http\Controllers\admin\StateController');
    Route::get('delete_state',[StateController::class,'destroy'])->name('delete_state');

    Route::resource('admin/city','App\Http\Controllers\admin\CityController');
    Route::get('/admin/delete_city', [CityController::class, 'destroy'])->name('delete_city');
    Route::post('state_show', 'App\Http\Controllers\admin\CityController@state_show');
    Route::get('/admin/bulk_upload_city', [CityController::class, 'bulk_upload_city'])->name('bulk_upload_city');
    Route::post('/admin/bulk_upload_city', [CityController::class, 'bulk_upload_city'])->name('bulk_upload_city');




    Route::resource('admin/service','App\Http\Controllers\admin\ServiceController');  
    Route::get('delete_service',[ServiceController::class,'destroy'])->name('delete_service'); 
    
    Route::resource('admin/subservice','App\Http\Controllers\admin\SubserviceController');  
    Route::get('delete_subservice',[SubserviceController::class,'destroy'])->name('delete_subservice');

    Route::resource('admin/vendors','App\Http\Controllers\admin\VendorsController');  
    Route::get('delete_vendors',[VendorsController::class,'destroy'])->name('delete_vendors');
    Route::get('remove_vendors_att/{pid}/{id}', [VendorsController::class, 'remove_vendors_att'])->name('remove_vendors_att'); 
    Route::post('change_status_vendors','App\Http\Controllers\admin\VendorsController@change_status_vendors');


    Route::resource('vendorsprofile','App\Http\Controllers\admin\VendorsProfileController');
    Route::get('remove_vendorsprofile_att/{pid}/{id}', [VendorsProfileController::class, 'remove_vendorsprofile_att'])->name('remove_vendorsprofile_att');


    Route::resource('admin/price','App\Http\Controllers\admin\Pricecontroller');  
    Route::get('delete_price',[Pricecontroller::class,'destroy'])->name('delete_price');

    Route::resource('admin/subscription','App\Http\Controllers\admin\SubscriptionController');
    Route::get('base_on_service_lead',[SubscriptionController::class,'base_on_service_lead'])->name('base_on_service_lead');
    Route::get('based_on_booking_services',[SubscriptionController::class,'based_on_booking_services'])->name('based_on_booking_services');
    Route::get('based_on_listing_criteria',[SubscriptionController::class,'based_on_listing_criteria'])->name('based_on_listing_criteria');

    Route::post('state_show_subscription', 'App\Http\Controllers\admin\SubscriptionController@state_show_subscription');
    Route::post('city_show', 'App\Http\Controllers\admin\SubscriptionController@city_show');
    Route::post('subservice_change', 'App\Http\Controllers\admin\SubscriptionController@subservice_change');
    Route::post('subservice_table_change', 'App\Http\Controllers\admin\SubscriptionController@subservice_table_change');

    Route::post('base_on_service_lead',[SubscriptionController::class,'base_on_service_lead'])->name('base_on_service_lead');
    Route::post('based_on_booking_services',[SubscriptionController::class,'based_on_booking_services'])->name('based_on_booking_services');
    Route::post('based_on_listing_criteria',[SubscriptionController::class,'based_on_listing_criteria'])->name('based_on_listing_criteria');

    Route::resource('admin/subscription-details','App\Http\Controllers\admin\Subscriptiondetails_controller');

    Route::post('vendor_check_mail', 'App\Http\Controllers\admin\VendorsController@vendor_check_mail');
    Route::post('vendor_edit_check_mail', 'App\Http\Controllers\admin\VendorsController@vendor_edit_check_mail');

    Route::get('admin/vendor-invoice/{id}', 'App\Http\Controllers\admin\Subscriptiondetails_controller@vendor_invoice')->name('vendor-invoice');

    Route::resource('admin/leads','App\Http\Controllers\admin\Leadscontroller'); 
    Route::resource('admin/acceptleads','App\Http\Controllers\admin\AcceptLeadscontroller'); 
    


    

});

    Route::get('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';