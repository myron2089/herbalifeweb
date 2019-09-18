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
    return view('welcome');
});


/*-------------------- public ------------------------*/
Route::get('inicio', 'HomeController@getHomePage');



/*-------------------- get cities by state --------------------*/
Route::get('cities/getcitybystate/{id}', 'CityController@getCityByState');

Auth::routes();

Route::get('admin', function(){
	return 'eres un admin';
})->middleware(['auth.admin']);

Route::get('/home', 'HomeController@index')->name('home');


/*-------------------- users --------------------*/
Route::resource('administracion/usuarios', 'UserController');

/*-------------------- products -----------------*/
Route::resource('administracion/productos', 'ProductController');
Route::get('administrar/productos/desactivar/{id}/{statusId}', 'ProductController@changeProductStatus');

	/*-- product by id for purchase and sale list */
	Route::get('administrar/productos/getproductbyid/{id}', 'ProductController@getProductByIdForList');

/*------------------------------------ suppliers ---------------------------------------*/
Route::resource('administracion/proveedores', 'SupplierController');
Route::get('administrar/proveedores/status/{id}', 'SupplierController@changeSupplierStatus');

/*----------------------------------- distributors -------------------------------------*/
Route::resource('administracion/distribuidores', 'DistributorController');
Route::get('administrar/distribuidores/status/{id}', 'DistributorController@changeDistributorStatus');


/*----------------------------------- purchases -------------------------------------*/
Route::resource('administracion/ingresos', 'PurchaseController');
	Route::post('administracion/compra/registrar', 'PurchaseController@storePurchase');
	Route::get('administrar/ingresos/status/{id}', 'PurchaseController@changeIncomeStatus');
