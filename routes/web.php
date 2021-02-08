<?php

use Illuminate\Support\Facades\Route;
use App\Notification;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


#Base [Frontend routes]
Route::get('/test', function(){
    $unread = Auth::user()->unReadNotifications;
    return dd($unread);
});
#Auth routes
Route::get('/', 'Auth\LoginController@signin')->name('signin');
#Route::get('/signup', 'Auth\RegisterController@signup')->name('signup');
Route::get('/email-verification', 'Auth\RegisterController@emailVerification')->name('email-verification');
Route::get('/verify/{link}', 'Auth\RegisterController@verifyEmail')->name('verify-email');
Route::get('/reset-password', 'Auth\LoginController@showResetPasswordForm')->name('reset-password');
Route::get('/reset-password/{token}', 'Auth\LoginController@setPassword')->name('set-password');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

#Administrator routes
Route::get('/dashboard', 'CNX247\Backend\DashboardController@index')->name('dashboard');
Route::get('/roles', 'CNX247\Backend\AdminController@roles')->name('roles');
Route::post('/role/new', 'CNX247\Backend\AdminController@newRole')->name('new-role');
Route::get('/role/edit/{id}', 'CNX247\Backend\AdminController@editRole')->name('edit-role');
Route::post('/role/save', 'CNX247\Backend\AdminController@saveRoleChanges')->name('save-role-changes');
Route::get('/permissions', 'CNX247\Backend\AdminController@permissions')->name('permissions');
Route::get('/permission/edit/{id}', 'CNX247\Backend\AdminController@editPermission')->name('edit-permission');
Route::post('/permission/edit', 'CNX247\Backend\AdminController@savePermissionChanges')->name('save-permission-changes');
Route::post('/permission/new', 'CNX247\Backend\AdminController@newPermission')->name('new-permission');
Route::get('/assign/role-to-permission/{id}', 'CNX247\Backend\AdminController@assignRoleToPermission')
        ->name('assign-role-to-permission');
Route::post('/store/permission', 'CNX247\Backend\AdminController@storeRolePermission')->name('store-permission');

Route::get('/module-manager', 'CNX247\Backend\AdminController@moduleManager')->name('module-manager');
Route::post('/module/new', 'CNX247\Backend\AdminController@newModule')->name('new-module');
#Plans & Features
Route::get('/plans-n-features', 'CNX247\Backend\PlansnFeaturesController@index')->name('plans-n-features');
Route::get('/plans-n-features/new', 'CNX247\Backend\PlansnFeaturesController@create')->name('new-plans-n-features');
Route::post('/plans-n-features/new', 'CNX247\Backend\PlansnFeaturesController@store');
Route::get('/plans-n-features/edit/{id}', 'CNX247\Backend\PlansnFeaturesController@edit')->name('edit-plans-n-features');
Route::post('/plans-n-features/update', 'CNX247\Backend\PlansnFeaturesController@update')->name('update-plans-n-features');
Route::get('/plans-n-features/view/{url}', 'CNX247\Backend\PlansnFeaturesController@view')->name('view-plans-n-features');
#Constants
Route::get('/admin/constants', 'CNX247\Backend\ConstantController@index')->name('constants');
#Tenants
Route::get('/tenants', 'CNX247\Backend\TenantController@index')->name('tenants');
Route::get('/tenant/{slug}', 'CNX247\Backend\TenantController@view')->name('view-tenant');
Route::get('/tenant/analytics/financials', 'CNX247\Backend\TenantController@financials')->name('tenant-financials');
Route::get('/tenants/memberships', 'CNX247\Backend\TenantController@memberships')->name('tenant-memberships');
Route::post('/tenant/send-reminder', 'CNX247\Backend\TenantController@sendReminder');
Route::post('/tenant/email/send', 'CNX247\Backend\TenantController@sendMessage');
Route::get('/tenant/landlord/conversation/{slug}', 'CNX247\Backend\TenantController@viewConversation')->name('tenant-landlord-conversation');
#General settings
Route::get('/general-settings', 'CNX247\Backend\GeneralSettingsController@index')->name('general-settings');
Route::post('/change/company-assets', 'CNX247\Backend\GeneralSettingsController@changeCompanyAssets');


#User routes
Route::get('/my-profile', 'CNX247\Backend\UserController@myProfile')->name('my-profile');
Route::get('/my-feedback', 'CNX247\Backend\UserController@myFeedback')->name('my-feedback');
Route::post('/my-feedback', 'CNX247\Backend\UserController@submitFeedback');
Route::post('/switch-theme', 'CNX247\Backend\UserController@switchTheme');

#HR routes
Route::get('/employees', 'CNX247\Backend\HRController@index')->name('employees');
Route::get('/on-boarding', 'CNX247\Backend\HRController@onBoarding')->name('on-boarding');

    #Assign permission(s) to employee
        Route::get('/assign/permission-to-employee/{url}', 'CNX247\Backend\HRController@assignPermissionToEmployee')
        ->name('assign-permission-to-employee');
        Route::post('/store/user/permission', 'CNX247\Backend\HRController@storeUserPermission')
               ->name('store-user-permission');
    #Query employee
        Route::get('/employee/queries', 'CNX247\Backend\HRController@queries')->name('queries');
        Route::get('/query/employee/{url}', 'CNX247\Backend\HRController@queryEmployee')->name('query-employee');
        Route::post('/store/query/employee', 'CNX247\Backend\HRController@storeQueryEmployee')->name('store-query-employee');
        Route::get('/employee/query/view/{slug}', 'CNX247\Backend\HRController@viewQuery')->name('view-query');

#Support
Route::get('/support/ticket', 'CNX247\Backend\SupportController@ticket')->name('ticket');
Route::get('/support/ticket-history', 'CNX247\Backend\SupportController@ticketHistory')->name('ticket-history');
Route::get('/support/view-ticket/{slug}', 'CNX247\Backend\SupportController@viewTicket')->name('view-ticket');
#Admin area support
Route::get('/crm/support/tickets', 'CNX247\Backend\SupportController@adminTicketIndex')->name('admin-support');
Route::post('/crm/support/ticket/category/new', 'CNX247\Backend\SupportController@newTicketCategory')->name('new-ticket-category');
Route::get('/feedbacks', 'CNX247\Backend\CRMController@feedbacks')->name('feedbacks');
Route::post('/feedback-status', 'CNX247\Backend\CRMController@feedbackStatus');


#Tenant terms -n privacy routes
Route::get('/cnx247/terms-n-conditions', 'CNX247\Backend\TenantController@termsAndConditions')->name('cnx247-terms-n-conditions');
Route::get('/cnx247/privacy-policy', 'CNX247\Backend\TenantController@privacyPolicy')->name('cnx247-privacy-policy');

#Administration routes
Route::get('/terms-n-conditions', 'CNX247\Backend\AdminController@termsAndConditions')->name('terms-n-conditions');
Route::get('/edit/terms-n-conditions/{id}', 'CNX247\Backend\AdminController@showEditTermsForm')->name('edit-terms-n-conditions');
Route::post('/update-terms-n-conditions', 'CNX247\Backend\AdminController@editTermsAndConditions')->name('update-terms-n-conditions');
Route::get('/privacy-policy', 'CNX247\Backend\AdminController@privacyPolicy')->name('privacy-policy');
Route::get('/edit/privacy-policy/{id}', 'CNX247\Backend\AdminController@showEditPrivacyPolicyForm')->name('edit-privacy-policy');
Route::post('/update-privacy-policy', 'CNX247\Backend\AdminController@editPrivacyPolicy')->name('update-privacy-policy');
Route::get('/theme-gallery', 'CNX247\Backend\AdminController@themeGallery')->name('admin-theme-gallery');
Route::post('/theme/gallery/upload', 'CNX247\Backend\AdminController@themeGalleryUpload');
Route::get('/admin/access-faqs', 'CNX247\Backend\AdminController@accessFaqs')->name('access-faqs');
Route::post('/faq/new', 'CNX247\Backend\AdminController@storeFaq');
#Error routes
Route::get('/404', 'CNX247\Backend\ErrorController@error404')->name('404');
