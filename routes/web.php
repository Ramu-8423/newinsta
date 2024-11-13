<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientPublicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ReportPdf\ReportPdfController;
use App\Http\Controllers\InvoiceController;

Route::get('/socket',function(){
    return view('websocket.socket');
});

Route::get("/chat",function(){
    return view('websocket.chat');
});
Route::get("/proper-chat",function(){
    return view('websocket.properchat');
});
Route::get("/socket-room",function(){
    return view('websocket.socketroom');
});
Route::get("/socket-multi-room",function(){
    return view('websocket.multiroom');
});
Route::get("/full-chat-app",function(){
    return view('websocket.fullchat');
});


Route::get('/',[ClientPublicController::class,'client_login'])->name('client_login');
Route::get('/testt',function(){
    return view('testt');
});

Route::any('/client_onboarding',[ClientPublicController::class,'client_onboarding'])->name('client_onboarding');
Route::post('/update_layout_order',[ClientPublicController::class,'update_layout_order'])->name('update_layout_order');
Route::get('/approve_layout_order/{id}/{remark_status}',[ClientPublicController::class,'approve_layout_order'])->name('approve_layout_order');
Route::get('/mark_as_completed/{id}',[ClientPublicController::class,'mark_as_completed'])->name('mark_as_completed');


Route::post('/client_agreement',[ClientPublicController::class,'client_agreement'])->name('client_agreement');
Route::post('/client_logout',[ClientPublicController::class,'client_logout'])->name('client_logout');
Route::get('/client-register',[ClientPublicController::class,'client_register'])->name('client_register');
Route::post('/create-account', [ClientPublicController::class, 'create_account'])->name('create_account');
Route::get('/thank-you', [ClientPublicController::class, 'thank_you'])->name('thank_you');
Route::post('/fileupload', [ClientPublicController::class, 'fileupload'])->name('fileupload');


Route::post('/recharge', [LoginController::class, 'rechargeAccount'])->name('recharge.account');


//Route::get('/userlist', [LoginController::class, 'showUserList'])->name('user.list');
//Route::post('/recharge', [LoginController::class, 'rechargeAccount'])->name('recharge.account');



Route::get('/filter-data', [LoginController::class, 'filterData']);

Route::get('/reset-filters', [LoginController::class, 'resetFilters'])->name('resetFilters');

Route::any('/reset_filters_users',[LoginController::class,'reset_filters_users'])->name('reset_filters_users');
Route::any('/reset_filters_approved_case',[LoginController::class,'reset_filters_approved_case'])->name('reset_filters_approved_case');

Route::any('/clientreports/{id}', [LoginController::class, 'clientreports'])->name('clientreports');
Route::get('/transactionhistory/{id}', [LoginController::class, 'transaction_history'])->name('transactionhistory');


Route::any('/users',[LoginController::class, 'user_create'])->name('users');

Route::get('/adduserdetails', [LoginController::class, 'add_user'])->name('adduser');

Route::get('/myprofile1', [LoginController::class, 'myprofile_section1'])->name('profile1');

Route::get('/cases/all', [LoginController::class, 'allCases'])->name('cases.all');
Route::get('cases/pending',[LoginController::class,'pendingCases'])->name('cases.pending');
Route::get('/cases/insuff', [LoginController::class, 'insuffCases'])->name('cases.insuff');
Route::get('/cases/hold', [LoginController::class, 'holdCases'])->name('cases.hold');
Route::get('/cases/rejected', [LoginController::class, 'rejectedCases'])->name('cases.rejected');
Route::get('/cases/reopen', [LoginController::class, 'reopenCases'])->name('cases.reopen');

Route::any('/dashboard/{id}', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::any('/newallocation', [AllocationController::class, 'newallocation'])->name('newallocation');
Route::get('/wallet', [WalletController::class, 'wallet'])->name('wallet');

Route::any('/addressreportpdf',[ReportPdfController::class, 'addressreportpdf'])->name('addressreportpdf');
Route::any('/sitereportpdf',[ReportPdfController::class, 'sitereportpdf'])->name('sitereportpdf');

Route::any('/pdf', function () {
    return view('pdf');
});

// CREATED BY RAMU SHARMA
Route::get('/invoiceform/{status}',[InvoiceController::class, 'invoice'])->name('invoice');
Route::post('/updateinvoice',[InvoiceController::class, 'updateinvoice'])->name('update.spendings');
Route::get('/download-file', [InvoiceController::class, 'downloadFile'])->name('download.file');



Route::get('/report/{id}/{layout_type}', [ClientPublicController::class, 'report'])->name('report');
Route::post('/Customfile',[ClientPublicController::class, 'Customfile'])->name('Customfile');
Route::post('/client_details_order',[ClientPublicController::class,'client_details_order'])->name('client_details_order');
// Route::post('/upload',[InvoiceController::class, 'uploadInvoice'])->name('update.invoice');

// CREATED BY RAMU SHARMA END



