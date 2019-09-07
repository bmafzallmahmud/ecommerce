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

/*Route::get('/', function () {
    return view('welcome');
});*/


/*Route::get('/category/Unpublished/{id}', [

'uses'=>'categoryController@UnpublishedCategory',
'as'=>'category/Unpublished'


]);

href="{{Route('category/Unpublished',['id'=>$category->id])}}"*/


	Route::get('/','masterController@index');
	Route::get('/viewCategory/{id}', 'masterController@category');
	Route::get('/product/details/{id}', 'masterController@productDetails');

	Auth::routes();

	Route::get('/dashboard', 'HomeController@index')->name('home');

/* Cart Route*/
	Route::post('/cart/add','CartController@addCart');
	Route::get('/cart/show','CartController@showCart');
	Route::post('/cart/update','CartController@updateCart');
	Route::get('/cart/deleteCartItem{id}','CartController@deleteCart');
/* Cart Route*/

/*Checkout  Route*/
	Route::get('/checkout','CheckoutController@index');
	Route::post('/checkout/sineUp','CheckoutController@customerRegistation');
	Route::get('/checkout/shipping','CheckoutController@showShippingForm');
	Route::post('/new/shipping','CheckoutController@saveShipping');
	Route::get('/checkout/payment','CheckoutController@paymentForm');
	Route::post('checkout/rorde','CheckoutController@newOrder');
	Route::get('/complete/order','CheckoutController@completeOrder');

	Route::post('/checkout/customer/login','CheckoutController@customerLoginCheck');
	Route::post('/checkout/customer/logOut','CheckoutController@customerLogout');
	Route::post('/checkout/newCustomer/login','CheckoutController@newCustomerLogin');

/*Checkout  Route*/










//  middleware singale route
// Route::get('/category/add', 'categoryController@createCategory')->Middleware('AuthenticateMiddleware');




//  group authenticate middaleware
Route::group(['middleware'=>'AuthenticateMiddleware'], function(){
/*Category info*/
		Route::get('/category/add', 'categoryController@createCategory');
		Route::post('/category/save', 'categoryController@storeCategory');
		Route::get('/category/manage', 'categoryController@manageCategory');
		Route::get('/category/edit/{id}', 'categoryController@editCategory');
		Route::post('/category/update', 'categoryController@updatetCategory');
		Route::get('/category/UnpublishedCategory/{id}', 'categoryController@unpublishedCategory');
		Route::get('/category/publishedCategory/{id}', 'categoryController@publishedCategory');
		Route::get('/category/delete/{id}', 'categoryController@deleteCategory');
		/*Category info*/



		/*Manufacturer info*/
		Route::get('/manufacturer/add', 'ManufacturerController@addManufacture');
		Route::post('/manufacturer/save', 'ManufacturerController@storManufacture');
		Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacture');
		Route::get('/manufacturer/edit/{id}', 'ManufacturerController@editManufacture');
		Route::post('/manufacturer/update', 'ManufacturerController@updatetManufacturer');
		Route::get('/manufacturer/delete/{id}', 'ManufacturerController@deletetManufacturer');
		/*Manufacturer info*/


		/*Product info*/
		Route::get('/product/add', 'ProductController@addProduct');
		Route::post('/product/save', 'ProductController@storProduct');
		Route::get('/product/manage', 'ProductController@manageProduct');
		Route::get('/product/view/{id}', 'ProductController@viewProduct');
		Route::get('/product/edit/{id}', 'ProductController@editProduct');
		Route::post('/product/update', 'ProductController@updatetProduct');
		Route::get('/product/delete/{id}', 'ProductController@deletetProduct');
		/*Product info*/

		/*User info*/
		Route::get('/user/manage','UserController@manageUser');
		/*User info*/


		/*Manage Order Route start*/
        Route::get('/manage/order','OrderController@manageOrder');
        Route::get('/view/order/{id}','OrderController@viewOrder');
        Route::get('/view/order/invoice/{id}','OrderController@viewOrderInvoice');
        Route::get('/download/order/invoice/{id}','OrderController@downloadOrderInvoice');
       /*Manage Route end*/




});
