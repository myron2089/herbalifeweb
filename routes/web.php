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
    return redirect('inicio');
});




Route::get('contacto', function () {
    return view('public.contact');
});

Route::get('productos/{tipo}', 'HomeController@getProductsPage');
Route::get('producto/{id}', 'HomeController@getProductPage');

/*-------------------- public ------------------------*/
Route::get('inicio', 'HomeController@getHomePage');



/*-------------------- get cities by state --------------------*/
Route::get('cities/getcitybystate/{id}', 'CityController@getCityByState');

Auth::routes();

Route::get('admin', function(){
	return 'eres un admin';
})->middleware(['auth.admin']);

Route::get('/administracion/inicio', 'AdminController@getAdminHome')->name('home');


/*-------------------- users --------------------*/
Route::resource('administracion/usuarios', 'UserController');

/*-------------------- products -----------------*/
Route::resource('administracion/productos', 'ProductController');
Route::get('administrar/productos/desactivar/{id}/{statusId}', 'ProductController@changeProductStatus');

	/*-- product by id for purchase and sale list */
	Route::get('administrar/productos/getproductbyid/{id}', 'ProductController@getProductByIdForList');
	/*-- product by id for order with price */

	Route::get('administrar/productos/getproductbyidwprice/{id}', 'ProductController@getProductByIdWithPriceForList');
	

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

/*------------------------------ orders --------------------------------------------*/
Route::resource('administracion/pedidos', 'OrderController');

/*------------------------------ sells --------------------------------------------*/
Route::resource('administracion/ventas', 'SaleController');


/******************************* DISTRIBUTORS SIDE **********************************/

Route::get('distribuidor/registro', 'RegisterController@distributorRegister');
Route::post('distribuidor/registro', 'RegisterController@distributorStore');
Route::get('distribuidor/registrado', 'RegisterController@distributorRegistered');

Route::get('distribuidor/inicio', 'DistributorController@getDistributorSideHomePage');

/*------------------------------ orders --------------------------------------------*/
	Route::get('distribuidor/pedidos', 'OrderController@distributorOrdersIndex');
	Route::get('distribuidor/pedidos/crear', 'OrderController@distributorOrderCreate');
	Route::get('distribuidor/pedidos/{id}', 'OrderController@distributorOrderDetails');
	Route::post('distribuidor/pedidos', 'OrderController@distributorOrdersStore');

	/*--------------------------- purchases -------------------------------------*/
	Route::get('distribuidor/compras', 'SaleController@distributorPurchasesIndex');
	Route::get('distribuidor/compras/{id}', 'SaleController@distributorPurchaseDetail');