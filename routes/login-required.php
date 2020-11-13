<?php

use App\Http\Controllers\MetallicColorController;
use App\Http\Controllers\RollSheetController;

Route::get('/', 'HomeController@show')->name('home');
Route::get('/home', 'SalesRepDashboardController@index')->name('dashboard.mine');


Route::get('/sales-representative/{user?}', 'SalesRepDashboardController@show')->name('dashboard.sales');
Route::get('/overview', 'AdminDashboardController@show')->name('dashboard.admin');

Route::prefix('needs-analysis')->group(function(){
    Route::get('discovery-questions/{lead}', 'NeedsAnalysisController@discoveryQuestions')->name('discovery.questions');
    Route::get('measurements/{lead}', 'NeedsAnalysisController@measurements')->name('measurements.calculate');
    Route::get('job-specifications/{lead}', 'NeedsAnalysisController@jobSpecifications')->name('job-specifications');
    Route::get('scope-of-work/{lead}', 'NeedsAnalysisController@scopeOfWork')->name('needs.analysis.scope.of.work');
});

Route::get('build-estimate/{lead}/{step}', 'BuildEstimateController@show')->name('build-estimate');
Route::get('build-estimate/change-service/{lead}/{service_id}', 'BuildEstimateController@changeService')->name('change-service');

Route::prefix('sales/{lead}')->group(function(){
    Route::get('docs/summary', 'SalesDocumentController@summary')->name('sales.documents.summary');
    Route::post('docs/store/sign/{salesDocument?}', 'SalesDocumentController@storeDocumentSigner')->name('sales.documents.store.sign')->middleware('throttle:10,1');
    Route::get('docs/fetch/sign/{signer?}', 'SalesDocumentController@fetchHelloSignRequest')->name('sales.documents.fetch.sign.url')->middleware('throttle:20,1');
    Route::post('docs/confirm/sign/{signer?}', 'SalesDocumentController@confirmHelloSignRequest')->name('sales.documents.confirm.sign');
    Route::get('docs/cancel/sign/{signer?}', 'SalesDocumentController@cancelHelloSignRequest')->name('sales.documents.cancel.sign');
    Route::post('docs/upload', 'SalesDocumentController@uploadDocumentForSign')->name('sales.documents.upload');

    Route::get('payment', 'SalesDocumentController@payment')->name('sales.payment');
    Route::post('payment', 'SalesDocumentController@storePayment')->name('sales.payment.post')->middleware('throttle:10,1');

    Route::post('homeowners/submit', 'HomeownersContactController@store')->name('sales.homeowners.contact.submit')->middleware('throttle:10,1');
});

Route::prefix('roll-sheet/{lead}')->group(function(){
    Route::get('summary', 'RollSheetController@summary')->name('roll.sheet.summary');
    Route::get('product-info',[RollSheetController::class, 'productInformation'])->name('roll.sheet.product.info');
    Route::get('payment-options', 'RollSheetController@paymentOptions')->name('roll-sheet.payment-options');
});

Route::prefix('data')->group(function () {
    /*
     * These routes all return json responses and are meant to be accessed via ajax
     */
    Route::get('colors', 'ColorController@index')->name('color.index');
    Route::post('color', 'ColorController@store')->name('color.store');
    Route::get('product-categories/{productCategory}/sub-categories', 'ProductSubCategoryController@show')->name('product-sub-category.show');
    Route::post('product-categories/{productCategory}/sub-category', 'ProductSubCategoryController@store')->name('product-sub-category.store');
    Route::post('product', 'ProductController@store')->name('product.store');
    Route::get('admin/dashboard/charts', 'AdminDashboardController@charts')->name('admin.dashboard.charts');
    Route::get('sales/dashboard/charts/{user}', 'SalesRepDashboardController@charts')->name('sales.dashboard.charts');
    Route::put('sales-disposition/{lead}/{salesDispositionId}', 'SalesDispositionController@update')->name('sales-disposition.update');
    Route::put('installation-status/{lead}/{installationStatusId}', 'InstallationStatusController@update')->name('installation-status.update');
    Route::put('processor-status/{lead}/{processorStatusId}', 'ProcessorStatusController@update')->name('processor-status.update');
    Route::put('discovery-question/{question}', 'DiscoveryQuestionAnswerController@update')->name('discovery-question.update');
    Route::put('job-specification-question/{question}', 'JobSpecificationQuestionAnswerController@update')->name('job-specification-question.update');
    Route::put('measurement/{measurement}', 'UpdateMeasurementsController@update')->name('measurement.update');
    Route::get('leads/unacknowledged', 'NotificationController@show')->name('leads.unacknowledged');
    Route::get('lead/acknowledge/{lead}/{disposition}', 'NotificationController@update')->name('lead.acknowledge');
    Route::put('conversion-type/{lead}', 'ConversionTypeController@update')->name('conversion-type.update');
    Route::put('property-type/{lead}', 'PropertyTypeController@update')->name('property-type.update');
    Route::get('products-by-options/{category}', 'OptionsController@show')->name('products-by-options');
    Route::put('update-quote', 'QuoteController@update')->name('quote.update');
    Route::post('disposition-report', 'DispositionReportController@store')->name('disposition.store');
    Route::get('disposition-report/{lead}', 'DispositionReportController@show')->name('disposition.show');
    Route::get('metallic-color/{lead}', [MetallicColorController::class, 'show'])->name('metallic-color.show');
    Route::post('metallic-color/{lead}', [MetallicColorController::class, 'store'])->name('metallic-color.store');

});
