<?php

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

Route::Resource('api/complaintCategory', 'ComplaintCategoryController');
Route::Resource('api/complaint', 'ComplaintsController');
Route::Resource('api/feedback', 'FeedbacksController');
Route::get('api/shortcuts', 'ComplaintsController@shortcuts');
Route::get('api/usernotifications', 'NotificationsController@usernotifications');
Route::Resource('api/locations', 'LocationController');
Route::Resource('api/notification', 'NotificationsController');
Route::Resource('api/emergencyHelp', 'EmergencyHelpsController');
Route::Resource('api/customer', 'CustomersController');
Route::Post('api/registerFront', 'OtherController@registerStore');
Route::get('thankyou', 'OtherController@thankyou');
Route::get('email_verification/{reg_no}', 'OtherController@email_verification');
Route::get('verified', 'OtherController@verified');
Route::get('excel_download', 'OtherController@excel_download');
Route::get('api/admin/{id}/edit', 'OtherController@admin_profile');
Route::patch('api/admin/{id}', 'OtherController@update_profile');
Route::post('api_ajax_report', 'ReportingController@report');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/{vue_capture?}', 'HomeController@index')->where('vue_capture', '^(?!storage).*$');
});
