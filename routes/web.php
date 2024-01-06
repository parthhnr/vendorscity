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
use App\Http\Controllers\admin\RejectLeadscontroller;
use App\Http\Controllers\admin\Vendorinquirycontroller;
use App\Http\Controllers\admin\CmsController;
use App\Http\Controllers\admin\PackageCategoryController;
use App\Http\Controllers\admin\PackagesController;
use App\Http\Controllers\admin\WalletController;
use App\Http\Controllers\admin\AdminWalletController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\FrontuserController;
use App\Http\Controllers\admin\EnquiryController;

use App\Http\Controllers\admin\Form_fieldController;
use App\Http\Controllers\admin\Ordercontroller;
use App\Http\Controllers\admin\VendorOrderController;
use App\Http\Controllers\admin\SubscribeController;





use App\Http\Controllers\front\FrontloginregisterController;
use App\Http\Controllers\front\FrontvendorController;
use App\Http\Controllers\front\checkoutcontroller;
use App\Http\Controllers\front\Packagecontroller;
use App\Http\Controllers\front\MyaccountController;





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


Route::get('/', '\App\Http\Controllers\front\Homecontroller@index');
Route::post('search', '\App\Http\Controllers\front\Homecontroller@search')->name('search');

Route::get('/book-services', '\App\Http\Controllers\front\Homecontroller@book_services');
Route::get('/become-vendor', '\App\Http\Controllers\front\Homecontroller@become_vendor');
Route::get('Sign-Up/{id?}', '\App\Http\Controllers\front\FrontloginregisterController@test');
Route::resource('Sign-Up', '\App\Http\Controllers\front\FrontloginregisterController');
Route::get('Sign-in', '\App\Http\Controllers\front\FrontloginregisterController@Sign_in')->name('Sign-in');
Route::get('user_signout', 'App\Http\Controllers\front\FrontloginregisterController@user_signout')->name('user_signout');
Route::post('check_login', 'App\Http\Controllers\front\FrontloginregisterController@check_login');

Route::get('search-package', 'App\Http\Controllers\front\FrontloginregisterController@search_package')->name('search_package');
// Route::post('search-package', 'App\Http\Controllers\front\Homecontroller@search_package');

// Route::match(['get', 'post'], 'search-package', [FrontloginregisterController::class, 'search_package'])->name('search_package');

Route::post('user_login','App\Http\Controllers\front\FrontloginregisterController@user_login')->name('user_login');

Route::post('registration_mail_check', '\App\Http\Controllers\front\FrontloginregisterController@registration_mail_check');


Route::get('forget-password','\App\Http\Controllers\front\FrontloginregisterController@lost_password'); 
Route::post('email-check-login','\App\Http\Controllers\front\FrontloginregisterController@emailCheck'); 
Route::post('resetpassword','\App\Http\Controllers\front\FrontloginregisterController@get_password')->name('reset-password');
Route::get('reset-password/{uid}','\App\Http\Controllers\front\FrontloginregisterController@reset_password')->name('reset_password');


Route::post('check_email','\App\Http\Controllers\front\FrontloginregisterController@check_email');
Route::post('news_letter_email','\App\Http\Controllers\front\FrontloginregisterController@news_letter_email');


Route::post('set_password/{uid}','\App\Http\Controllers\front\FrontloginregisterController@set_password')->name('set_password');

        

Route::match(['get', 'post'], 'vendor-database', [FrontvendorController::class, 'vendor_database'])->name('vendor_database');

Route::get('/package-lists/{page_url}', '\App\Http\Controllers\front\Packagecontroller@package_lists')->name('package-lists');
Route::get('/package-detail/{page_url}', '\App\Http\Controllers\front\Packagecontroller@package_detail');
Route::get('enquiry/{id}/', '\App\Http\Controllers\front\Packagecontroller@enquiry')->name('enquiry');
Route::get('enquiry/{id}/{service_id}/', '\App\Http\Controllers\front\Packagecontroller@enquiry')->name('enquiry');


Route::get('service/{page_url}', '\App\Http\Controllers\front\Homecontroller@subservices')->name('subservices');




Route::post('package_inquiry', '\App\Http\Controllers\front\Packagecontroller@package_inquiry')->name('package_inquiry');




Route::post('vendors_check_mail', '\App\Http\Controllers\front\Homecontroller@vendors_check_mail'); 
Route::post('/vendors_data', '\App\Http\Controllers\front\Homecontroller@vendors_data');

Route::get('/cart', '\App\Http\Controllers\front\Cartcontroller@cart')->name('cart');
Route::post('add_to_cart','\App\Http\Controllers\front\Cartcontroller@add_to_cart');
Route::post('cart_remove', '\App\Http\Controllers\front\Cartcontroller@cart_remove');
Route::get('/checkout', '\App\Http\Controllers\front\checkoutcontroller@checkout');
Route::post('/order_place', '\App\Http\Controllers\front\checkoutcontroller@order_place')->name('order_place');
Route::get('thankyou', [checkoutcontroller::class, 'thankyou'])->name("thankyou");

Route::post('/bill_state_change', '\App\Http\Controllers\front\checkoutcontroller@bill_state_change');
Route::post('/ship_state_change', '\App\Http\Controllers\front\checkoutcontroller@ship_state_change');


Route::get('/my-account', '\App\Http\Controllers\front\MyaccountController@my_account');
Route::get('/my-order', '\App\Http\Controllers\front\MyaccountController@my_order');
Route::get('/my-profile', '\App\Http\Controllers\front\MyaccountController@my_profile');
Route::get('/order-detail', '\App\Http\Controllers\front\MyaccountController@order_detail');
Route::get('refer&earn', '\App\Http\Controllers\front\MyaccountController@refer_earn');
Route::get('refer_and_earn/{userid}', '\App\Http\Controllers\front\MyaccountController@refer_earn_frend');

Route::match(['get', 'post'], 'edit-profile', [MyaccountController::class, 'edit_profile'])->name('edit_profile');
Route::get('my-wallet', '\App\Http\Controllers\front\MyaccountController@my_wallet');

//Route::get('/edit-profile', '\App\Http\Controllers\front\MyaccountController@edit_profile');

// Route::get('/checkout', '\App\Http\Controllers\front\checkoutcontroller@checkout');
// Route::post('/order_place', '\App\Http\Controllers\front\checkoutcontroller@order_place')->name('order_place');
// Route::get('thankyou', [checkoutcontroller::class, 'thankyou'])->name("thankyou");



// Route::match(['get', 'post'], 'vendor-database', [FrontvendorController::class, 'vendor_database'])->name('vendor_database');


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
    Route::post('set_order_service', '\App\Http\Controllers\admin\ServiceController@set_order_service');
    
    Route::resource('admin/subservice','App\Http\Controllers\admin\SubserviceController');  
    Route::get('delete_subservice',[SubserviceController::class,'destroy'])->name('delete_subservice');
    Route::post('set_order_subservice', '\App\Http\Controllers\admin\SubserviceController@set_order_subservice');

    Route::resource('admin/vendors','App\Http\Controllers\admin\VendorsController');  
    Route::get('delete_vendors',[VendorsController::class,'destroy'])->name('delete_vendors');
    Route::get('remove_vendors_att/{pid}/{id}', [VendorsController::class, 'remove_vendors_att'])->name('remove_vendors_att'); 
    Route::post('change_status_vendors','App\Http\Controllers\admin\VendorsController@change_status_vendors');

    Route::get('admin/vendors/{id}/subscription', 'App\Http\Controllers\admin\VendorsController@subscription')->name('vendors.subscription');


    Route::resource('vendorsprofile','App\Http\Controllers\admin\VendorsProfileController');
    Route::get('remove_vendorsprofile_att/{pid}/{id}', [VendorsProfileController::class, 'remove_vendorsprofile_att'])->name('remove_vendorsprofile_att');


    Route::resource('admin/price','App\Http\Controllers\admin\Pricecontroller');  
    Route::get('delete_price',[Pricecontroller::class,'destroy'])->name('delete_price');

    Route::resource('admin/subscription','App\Http\Controllers\admin\SubscriptionController');

    // Route::get('base_on_service_lead',[SubscriptionController::class,'base_on_service_lead'])->name('base_on_service_lead');

    // Route::get('based_on_booking_services',[SubscriptionController::class,'based_on_booking_services'])->name('based_on_booking_services');
    // Route::get('based_on_listing_criteria',[SubscriptionController::class,'based_on_listing_criteria'])->name('based_on_listing_criteria');

    Route::post('state_show_subscription', 'App\Http\Controllers\admin\SubscriptionController@state_show_subscription');
    Route::post('city_show', 'App\Http\Controllers\admin\SubscriptionController@city_show');
    Route::post('subservice_change', 'App\Http\Controllers\admin\SubscriptionController@subservice_change');
    Route::post('subservice_table_change', 'App\Http\Controllers\admin\SubscriptionController@subservice_table_change');

    
    Route::match(['get', 'post'], 'base_on_service_lead/{id}', [SubscriptionController::class, 'base_on_service_lead'])->name('base_on_service_lead');
    Route::match(['get', 'post'], 'based_on_booking_services/{id}', [SubscriptionController::class, 'based_on_booking_services'])->name('based_on_booking_services');
    Route::match(['get', 'post'], 'based_on_listing_criteria/{id}', [SubscriptionController::class, 'based_on_listing_criteria'])->name('based_on_listing_criteria');

    // Route::post('base_on_service_lead',[SubscriptionController::class,'base_on_service_lead'])->name('base_on_service_lead');
    // Route::post('based_on_booking_services',[SubscriptionController::class,'based_on_booking_services'])->name('based_on_booking_services');
    // Route::post('based_on_listing_criteria',[SubscriptionController::class,'based_on_listing_criteria'])->name('based_on_listing_criteria');

    Route::resource('admin/subscription-details','App\Http\Controllers\admin\Subscriptiondetails_controller');

    Route::post('vendor_check_mail', 'App\Http\Controllers\admin\VendorsController@vendor_check_mail');
    Route::post('vendor_edit_check_mail', 'App\Http\Controllers\admin\VendorsController@vendor_edit_check_mail');

    Route::get('admin/vendor-invoice/{id}', 'App\Http\Controllers\admin\Subscriptiondetails_controller@vendor_invoice')->name('vendor-invoice');

    Route::resource('admin/leads','App\Http\Controllers\admin\Leadscontroller'); 
    Route::resource('admin/acceptleads','App\Http\Controllers\admin\AcceptLeadscontroller'); 
    Route::resource('admin/rejectleads','App\Http\Controllers\admin\RejectLeadscontroller'); 
    Route::resource('admin/vendorinquiry','App\Http\Controllers\admin\Vendorinquirycontroller');
    Route::get('accept_vendor_inquiry', 'App\Http\Controllers\admin\Vendorinquirycontroller@accept_vendor_inquiry')->name('accept_vendor_inquiry');


    Route::get('enquiry_detail/{enquiry_id}', [Vendorinquirycontroller::class, 'enquiry_details'])->name('enquiry_detail');
    Route::post('reason_reject_form', 'App\Http\Controllers\admin\Vendorinquirycontroller@add_reject_reason')->name('reason_reject_form');


    


    Route::resource('admin/cms','App\Http\Controllers\admin\CmsController'); 
    Route::get('delete_cms',[CmsController::class,'destroy'])->name('delete_cms');

    Route::resource('admin/packagecategory', '\App\Http\Controllers\admin\PackageCategoryController');
    Route::post('subservice_show', 'App\Http\Controllers\admin\PackageCategoryController@subservice_show');
    Route::get('delete_packagecategory',[PackageCategoryController::class,'destroy'])->name('delete_packagecategory');
    
    
    Route::resource('admin/packages', '\App\Http\Controllers\admin\PackagesController');
    Route::post('subservice_show', 'App\Http\Controllers\admin\PackagesController@subservice_show');
    Route::post('packagecategory_show', 'App\Http\Controllers\admin\PackagesController@packagecategory_show');
    Route::get('delete_packages',[PackagesController::class,'destroy'])->name('delete_packages');
    Route::get('editimage/{id}', [PackagesController::class, 'editimage'])->name('editimage');
    Route::post('editimage_store', [PackagesController::class, 'editimage_store'])->name('editimage_store');
    Route::get('packages_removeimage/{pid}/{id}', [PackagesController::class, 'packages_removeimage'])->name('packages_removeimage');

    Route::resource('wallet', '\App\Http\Controllers\admin\WalletController');

    Route::resource('admin/adminwallet', '\App\Http\Controllers\admin\AdminWalletController');
    Route::post('change_status_wallet','App\Http\Controllers\admin\AdminWalletController@change_status_wallet');

    Route::resource('admin/faq', '\App\Http\Controllers\admin\FaqController');
    Route::get('delete_faq',[FaqController::class,'destroy'])->name('delete_faq');

    Route::resource('/admin/frontuser', '\App\Http\Controllers\admin\FrontuserController');
    Route::post('change_status_frontuser','App\Http\Controllers\admin\FrontuserController@change_status_frontuser');

    Route::get('export-all', [App\Http\Controllers\admin\FrontuserController::class, 'downloadXls'])->name('export-excel');
    
    Route::resource('/enquiry', '\App\Http\Controllers\admin\EnquiryController');
    Route::get('enquiry_page/{enquiry_id}', [EnquiryController::class, 'enquiry_details'])->name('enquiry_page');

    


    Route::resource('/admin/form_field', '\App\Http\Controllers\admin\Form_fieldController');
    Route::get('/admin/delete_form_field', [Form_fieldController::class, 'delete_form_field'])->name('delete_form_field');
    Route::get('remove_attribute/{form_id}/{id}', [Form_fieldController::class, 'remove_attribute'])->name('remove_attribute');
    Route::post('set_order_form_fields', '\App\Http\Controllers\admin\Form_fieldController@set_order_form_fields');
    
    Route::resource('admin/order','App\Http\Controllers\admin\Ordercontroller');  
    Route::get('delete_order',[Ordercontroller::class,'destroy'])->name('delete_order');
    Route::get('admin/order/detail/{order_id}', [Ordercontroller::class, 'detail'])->name('detail');

    Route::resource('admin/order','App\Http\Controllers\admin\Ordercontroller');  
    Route::get('delete_order',[Ordercontroller::class,'destroy'])->name('delete_order');
    Route::get('admin/order/detail/{order_id}', [Ordercontroller::class, 'detail'])->name('detail');

    Route::post('assign_vendor', '\App\Http\Controllers\admin\Ordercontroller@assign_vendor');
    Route::post('order_vendor_form', '\App\Http\Controllers\admin\Ordercontroller@order_vendor_form');
    Route::post('set_booking_percentage', '\App\Http\Controllers\admin\Ordercontroller@set_booking_percentage');

    Route::resource('admin/vendororder','App\Http\Controllers\admin\VendorOrderController');
    Route::get('admin/order/vendororderdetail/{vendororder_id}', [VendorOrderController::class, 'vendordetail'])->name('vendordetail');


    Route::resource('admin/subscribe','App\Http\Controllers\admin\SubscribeController');   
    Route::get('delete_subscribe',[SubscribeController::class,'destroy'])->name('delete_subscribe');

    Route::get('remove_packages_att/{pid}/{id}', [PackagesController::class, 'remove_packages_att'])->name('remove_packages_att'); 
    Route::get('remove_package_att/{pid}/{id}', [PackagesController::class, 'remove_package_att'])->name('remove_package_att'); 

   


});

    Route::get('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';