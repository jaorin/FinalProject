<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('dormitory', 'DormitoryController');
Route::resource('type-room', 'TypeRoomController');
Route::resource('room', 'RoomController') ->middleware('auth');
Route::resource('lease', 'LeaseController');
Route::resource('invoices', 'InvoicesController');
Route::resource('incomes', 'IncomesController');
Route::resource('profile', 'ProfileController');
Route::resource('resetpassword', 'ResetpasswordController');
Route::resource('report', 'ReportController');
Auth::routes();
Route::resource('role', 'roleController');
Route::get('myprofile', 'ProfileController@myprofile');
Route::get('myInvoice', 'MyInvoiceController@myInvoice');
Route::get('myInvoiceIndex', 'MyInvoiceController@myInvoiceIndex');
Route::get('userUploads', 'UploadController@userUploads');
Route::resource('room-rent', 'RoomRentController');
Route::resource('checkout', 'CheckoutController');
Route::resource('payment', 'PaymentController');

Route::get('report1', 'ReportController@report1');
Route::post('report1', 'ReportController@report1');
Route::get('report1', 'ReportController@report1');
Route::get('reportRoom', 'ReportController@reportRoom');
Route::post('reportRoom', 'ReportController@reportRoom');
Route::get('reportUser', 'ReportController@reportUser');
Route::post('reportUser', 'ReportController@reportUser');
Route::get('reportLease', 'ReportController@reportLease');
Route::post('reportLease', 'ReportController@reportLease');



Route::get('/test/pdf', function () {
    $a = "hello";
    $b = "world";
    $c = "วันจันทร์";
    $pdf = PDF::loadView('testpdf', compact('a', 'b', 'c'));
    return $pdf->stream();
});




Route::resource('upload', 'UploadController');