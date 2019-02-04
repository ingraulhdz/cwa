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
Route::get('app.dealers.show/{id}',
	['as'=>'app.dealers.show','uses'=>'MasterData\DealerController@show']);


*/Route::get('car-extras/{id}','MasterData\CarController@car_extras');
Route::post('delete_car_invoice',['as'=>'delete_car_invoice','uses'=>'MasterData\InvoiceController@deleteCarInvoice']);
Route::post('to_invoice',['as'=>'to_invoice','uses'=>'MasterData\InvoiceController@toInvoice']);

Route::get('get-year',['as'=>'get-year','uses'=>'MasterData\CarController@getYear']);
Route::get('getDealersTop',['as'=>'getDealersTop','uses'=>'DashboardController@getDealersTop']);
Route::get('getCarsPerDay',['as'=>'getCarsPerDay','uses'=>'DashboardController@getCarsPerDay']);
Route::get('getDataCars',['as'=>'getDataCars','uses'=>'DashboardController@getDataCars']);
Route::get('getDataDashboard',['as'=>'getDataDashboard','uses'=>'DashboardController@getDataDashboard']);
Route::get('getDataExpenses',['as'=>'getDataExpenses','uses'=>'MasterData\ExpenseController@getDataExpenses']);

Route::get('getDataReport',['as'=>'getDataReport','uses'=>'MasterData\ReportController@getDataReport']);
Route::get('refreshData',['as'=>'refreshData','uses'=>'MasterData\ReportController@refreshData']);

	Route::get('dealers/{id}','MasterData\CarController@getDealers');

Route::post('ready_car',['as'=>'ready_car','uses'=>'MasterData\CarController@ready_car']);
Route::post('update-car',['as'=>'update-car','uses'=>'MasterData\CarController@updateCar']);
Route::post('create-car',['as'=>'create-car','uses'=>'MasterData\CarController@createCar']);
Route::post('set-extras',['as'=>'set-extras','uses'=>'MasterData\CarController@setExtras']);
Route::get('get-car',['as'=>'update-car','uses'=>'MasterData\CarController@getCar']);
Route::get('getCars',['as'=>'getCars','uses'=>'MasterData\CarController@getCars']);
Route::get('/getDataInvoice',['as'=>'getDataInvoice','uses'=>'MasterData\InvoiceController@getDataInvoice']);

Route::post('invoice.pay',['as'=>'invoice.pay','uses'=>'MasterData\InvoiceController@pay']);
Route::get('invoice.paid',['as'=>'invoice.paid','uses'=>'MasterData\InvoiceController@paid']);
Route::get('invoice.send/{id}',	['as'=>'invoice.send','uses'=>'MasterData\InvoiceController@send'])->name('invoice.send');
Route::get('invoice.print/{id}', ['as'=>'invoice.print','uses'=>'MasterData\InvoiceController@print'])->name('invoice.print');
Route::get('invoice.view', 	['as'=>'invoice.view','uses'=>'MasterData\InvoiceController@view'])->name('invoice.view');

Route::get('customer.invoice/{id}', ['as'=>'customer.invoice','uses'=>'MasterData\CustomerController@invoice'])->name('customer.invoice');

Route::resource('report','MasterData\ReportController');
Route::resource('extra','MasterData\ExtraController');
Route::resource('expense','MasterData\ExpenseController');
Route::resource('supply','MasterData\SupplyController');
Route::resource('payment','MasterData\PaymentController');
Route::resource('body_style','MasterData\BodyStyleController');
Route::resource('service','MasterData\ServiceController');
Route::resource('customer','MasterData\CustomerController');
Route::resource('invoice','MasterData\InvoiceController');
Route::resource('dealer','MasterData\DealerController');
Route::resource('employee','MasterData\EmployeeController');

Route::get('dealer.export','MasterData\DealerController@export');

Route::get('employee.export','MasterData\EmployeeController@export');

Route::resource('car','MasterData\CarController');
Route::get('car.done/{id}',['as'=>'car.done','uses'=>'MasterData\CarController@done']);
Route::get('car.ready/{id}',['as'=>'car.ready','uses'=>'MasterData\CarController@ready']);
Route::get('car.customer', function () { return view('app.cars.customer');})->name('car.customer');

Route::get('car.print','MasterData\CarController@print');



Route::get('/', 'DashboardController@index');

Route::get('/test', function () {
    return view('test');
});

Route::get('/tables', function () {
    return view('/template/tables');
});

Route::get('/charts', function () {
    return view('/template/charts');
});




