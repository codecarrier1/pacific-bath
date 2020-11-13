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

use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Spatie\WebTinker\Http\Controllers\WebTinkerController;
use Spatie\WebTinker\Http\Middleware\Authorize;

Route::get('login', 'Auth\LoginWithGoogleController@show')->middleware('guest')->name('login');
Route::get('login/google', 'Auth\LoginWithGoogleController@redirectToProvider')->name('google.login');
Route::get('login/google/callback', 'Auth\LoginWithGoogleController@handleProviderCallback')->name('google.callback');


Route::prefix('data')->group(function () {
    /*
     * These routes all return json responses and a
     */
    Route::get('colors', 'ColorController@index')->name('color.index');
    Route::post('color', 'ColorController@store')->name('color.store');
    Route::get('product-categories/{productCategory}/sub-categories', 'ProductSubCategoryController@show')->name('product-sub-category.show');
    Route::post('product-categories/{productCategory}/sub-category', 'ProductSubCategoryController@store')->name('product-sub-category.store');
    Route::post('product', 'ProductController@store')->name('product.store');
    Route::get('admin/dashboard/charts', 'AdminDashboardController@charts')->name('admin.dashboard.charts');
    Route::get('sales/dashboard/charts', 'SalesRepDashboardController@charts')->name('sales.dashboard.charts');
    Route::put('sales-disposition/{lead}/{salesDispositionId}', 'UpdateSalesDispositionController@update')->name('sales-disposition.update');
});
Route::get('logout', 'Auth\LogoutController@logout')->name('logout');
Route::redirect('/', '/home');

Route::any('salesforce/callback', 'SalesforceController@callback')->name('salesforce.callback');
Route::prefix(config('web-tinker.path'))->middleware([
    EncryptCookies::class,
    StartSession::class,
    Authorize::class,
])->group(function () {
    Route::get('/', [WebTinkerController::class, 'index'])->name('tinker.show');
    Route::post('/', [WebTinkerController::class, 'execute']);
});