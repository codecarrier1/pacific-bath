<?php

/**
 * These routes are only available if app.env === 'local'.
 */

use App\Lead;

Route::get('devlogin/{user}', 'Auth\DevLoginController@store')->name('dev.login');

//Route::view('measurements', 'needs-analysis/measurements');
//
//Route::view('buildestimate/shower-pans', 'build-estimate/shower-pans');
//Route::view('buildestimate/walls-joints-trim', 'build-estimate/walls-joints-trim');
//Route::view('buildestimate/fixtures-accessories', 'build-estimate/fixtures-accessories');
//Route::view('buildestimate/construction-addition', 'build-estimate/construction-addition');
//
//Route::view('rollsheet/order-summary', 'roll-sheet/order-summary');
//Route::view('rollsheet/product-information', 'roll-sheet/product-information');
//Route::view('rollsheet/payment-options', 'roll-sheet/payment-options');
//Route::view('rollsheet/payment-options-details', 'roll-sheet/payment-options-details');
//
//Route::view('sales-docs/depositinfo', 'sales-docs/depositinfo');
