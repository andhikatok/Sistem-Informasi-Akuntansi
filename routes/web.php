<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardSalesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardHomeController;
use App\Http\Controllers\DashboardReportsController;
use App\Http\Controllers\DashboardBankController;
use App\Http\Controllers\DashboardInvoiceController;
use App\Http\Controllers\DashboardChargeController;
use App\Http\Controllers\DashboardContactController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardPurchasesController;
use App\Http\Controllers\DashboardBillsController;
use App\Http\Controllers\DashboardSupplierController;
use App\Http\Controllers\DashboardOutletController;
use App\Http\Controllers\DashboardLedgerController;
use App\Http\Controllers\DashboardEmployeeController;
use App\Http\Controllers\DashboardRekController;
use App\Http\Controllers\DashboardSpendingController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('home', [
        "title" => "HOME"
    ]);
});

Route::get('/company', [CompanyController::class, 'index']);



Route::get('/pricing', function () {
    $pricing_posts = [
        [
            "title" => "Prospera",
            "author" => "Prospera.corp",
            "body" => "FOR INFO PLEASE CONTACT ME"
        ],
    ];
    return view('pricing', [
        "title" => "PRICING",
        "pricing" => $pricing_posts
    ]);
});



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);



Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/detailsales', 'SalesController@detailSales')->name('detailsales.index');


Route::resource('/dashboard/sales', DashboardSalesController::class)->middleware('auth');
Route::resource('/dashboard/home', DashboardHomeController::class)->middleware('auth');
Route::resource('/dashboard/reports', DashboardReportsController::class)->middleware('auth');
Route::resource('/dashboard/bank', DashboardBankController::class)->middleware('auth');
Route::resource('/dashboard/invoice', DashboardInvoiceController::class)->middleware('auth');
Route::resource('/dashboard/charge', DashboardChargeController::class)->middleware('auth');
Route::resource('/dashboard/contact', DashboardContactController::class)->middleware('auth');
Route::resource('/dashboard/product', DashboardProductController::class)->middleware('auth');
Route::resource('/dashboard/purchases', DashboardPurchasesController::class)->middleware('auth');
Route::resource('/dashboard/bills', DashboardBillsController::class)->middleware('auth');
Route::resource('/dashboard/supplier', DashboardSupplierController::class)->middleware('auth');
Route::resource('/dashboard/outlet', DashboardOutletController::class)->middleware('auth');
Route::resource('/dashboard/ledger', DashboardLedgerController::class)->middleware('auth');
Route::resource('/dashboard/employee', DashboardEmployeeController::class)->middleware('auth');
Route::resource('/dashboard/rek', DashboardRekController::class)->middleware('auth');
Route::resource('/dashboard/spending', DashboardSpendingController::class)->middleware('auth');








//export PDF
Route::get('/dashboard/bank/laporan', 'DashboardBankController@laporan')->middleware('auth');
Route::get('/laporan', 'App\Http\Controllers\LaporanController@index');
Route::get('/exportlaporan', 'App\Http\Controllers\LaporanController@export');


Route::get('/exportoutletpdf', [DashboardOutletController::class, 'exportoutletpdf'])->name('exportoutletpdf');
Route::get('/exportemployeepdf', [DashboardEmployeeController::class, 'exportemployeepdf'])->name('exportemployeepdf');
Route::get('/exportproductpdf', [DashboardProductController::class, 'exportproductpdf'])->name('exportproductpdf');
Route::get('/exportsupplierpdf', [DashboardSupplierController::class, 'exportsupplierpdf'])->name('exportsupplierpdf');
Route::get('/exportcontactpdf', [DashboardContactController::class, 'exportcontactpdf'])->name('exportcontactpdf');
Route::get('/exportchargepdf', [DashboardChargeController::class, 'exportchargepdf'])->name('exportchargepdf');
Route::get('/exportspendingpdf', [DashboardSpendingController::class, 'exportspendingpdf'])->name('exportspendingpdf');
Route::get('/exportinvoicepdf', [DashboardInvoiceController::class, 'exportinvoicepdf'])->name('exportinvoicepdf');
Route::get('/exportbankpdf', [DashboardBankController::class, 'exportbankpdf'])->name('exportbankpdf');
