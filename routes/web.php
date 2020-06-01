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

Route::get('/', function () {
    return view('home');
});



Route::get('test','studentPayment@test')->name('test');
Route::get('test2','studentPayment@test2')->name('test2');

/* ========== ADMIN ============ */

Route::get('admin-login','adminController@login')->name('admin-login');

Route::get('admin-getdashboard','superAdminController@getdashboard')->name('admin-getdashboard');

Route::get('admin-logout','superAdminController@logout')->name('admin-logout');

Route::post('admin-dashboard','adminController@dashboard')->name('admin-dashboard');

Route::get('admin-registered-students','adminController@AdminRegisteredStudentsPage')->name('admin-registered-students');

Route::get('admin-final-registered-students','adminController@AdminFinalRegisteredStudentsPage')->name('admin-final-registered-students');

Route::get('admin-view-transaction','adminController@viewTransaction')->name('admin-view-transaction');

Route::get('admin-view-student-transaction','adminController@viewStudentTransaction')->name('admin-view-student-transaction');

Route::get('admin-final-student-profile/{id}','adminController@viewStudentProfile')->name('admin-final-student-profile');

Route::get('admin_create_notice','notice@admin_create_notice')->name('admin_create_notice');

Route::post('admin_store_notice','notice@admin_store_notice')->name('admin_store_notice');

Route::get('admin_view_notice','notice@admin_view_notice')->name('admin_view_notice');


Route::get('admin_edit_notice/{id}','notice@admin_edit_notice')->name('admin_edit_notice');

Route::post('admin_edit_notice/{id}','notice@admin_update_notice')->name('admin_edit_notice');

Route::get('admin_delete_notice/{id}','notice@admin_delete_notice')->name('admin_delete_notice');

/* ADMIN END */




Auth::routes(['verify'=>true]);
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





/* ========== Student ============ */


Route::get('student-dashboard','studentController@GetStudentDashboardPage')->name('student-dashboard');

Route::get('student-final-register','studentController@FinalRegisterpage')->name('student-final-register');




Route::get('student-view-register','studentController@FinalRegisterViewpage')->name('student-view-register');

Route::post('final-register','studentController@FinalRegistrationProcess')->name('final-register');

Route::get('student-edit-register','studentController@EditRegisterpage')->name('student-edit-register');

Route::post('edit-register','studentController@EditRegistrationProcess')->name('edit-register');

Route::get('student-view-idcard','studentController@idcardView')->name('student-view-idcard');

Route::get('student-download-idcard','studentController@idcardDownload')->name('student-download-idcard');


// Route::get('student-download-idcard','studentController@idcardDownload')->name('student-download-idcard');


/*===================Bkash==============*/
Route::get('student-payment','studentPayment@StudentPayment')->name('student-payment');
Route::get('student-payment-status','studentPayment@StudentPaymentProcess')->name('student-payment-status');

Route::post('bkash_checkout_action','studentPayment@StudentPaymentAction')->name('bkash_checkout_action');

Route::post('bkash_create_payment','studentPayment@StudentPaymentCreate')->name('bkash_create_payment');

// Route::get('bkash_execute_payment','studentPayment@StudentPaymentExecute')->name('bkash_execute_payment');
Route::post('bkash_execute_payment','studentPayment@StudentPaymentExecute')->name('bkash_execute_payment');

/************** Final search ****************/

Route::get('finalsearch','FinalSearch@index')->name('finalsearch');

Route::get('finalsearchtable','FinalSearch@finalsearchtable')->name('finalsearchtable');

Route::resource('customsearch', 'CustomSearchController');

Route::post('download','FinalSearch@download')->name('download');


Route::get('/export_excel', 'ExportExcelController@index');

Route::get('/export_excel/excel', 'ExportExcelController@excel')->name('export_excel.excel');