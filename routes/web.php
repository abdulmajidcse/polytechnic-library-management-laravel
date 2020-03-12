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

Auth::routes(['register' => false]);


Route::get('/', 'HomeController@index')->name('home');


//user(admin) profile
Route::get('/profile', 'UserController@index');

Route::get('/profile/edit', 'UserController@edit');

Route::post('/profile/update', 'UserController@update');

//password change after login
Route::get('/password/change', 'PasswordChangeController@index');

Route::post('/password/update', 'PasswordChangeController@store');

//category crud are here ==================
Route::prefix('category')->group(function(){
	Route::get('/add', 'CategoryController@create');

	Route::post('/store', 'CategoryController@store');

	Route::get('/all', 'CategoryController@index');

	Route::get('/edit/{id}', 'CategoryController@edit');

	Route::post('/update/{id}', 'CategoryController@update');

	Route::get('/delete/{id}', 'CategoryController@destroy');
});

//book crud are here ====================
Route::prefix('book')->group(function(){
	Route::get('/add', 'BookController@create');

	Route::post('/store', 'BookController@store');

	Route::get('/all', 'BookController@index');

	Route::get('/edit/{id}', 'BookController@edit');

	Route::post('/update/{id}', 'BookController@update');

	Route::get('/delete/{id}', 'BookController@destroy');
});

//library user crud are here==================
Route::prefix('user')->group(function(){
	Route::get('/student/add', 'LibraryUserController@create_student');
	Route::get('/staff/add', 'LibraryUserController@create_staff');

	Route::post('/student/store', 'LibraryUserController@store_student');
	Route::post('/staff/store', 'LibraryUserController@store_staff');

	Route::get('/student/all', 'LibraryUserController@index_student');
	Route::get('/staff/all', 'LibraryUserController@index_staff');

	Route::get('/student/edit/{id}', 'LibraryUserController@edit_student');
	Route::post('/student/update/{id}', 'LibraryUserController@update_student');

	Route::get('/staff/edit/{id}', 'LibraryUserController@edit_staff');
	Route::post('/staff/update/{id}', 'LibraryUserController@update_staff');

	Route::get('/delete/{id}', 'LibraryUserController@destroy');
});

//borrow book crud are here ==============
Route::prefix('borrow')->group(function(){
	Route::get('/book', 'BorrowController@create');
	Route::get('/select/user/{person}', 'BorrowController@select_user');
	Route::get('/select/book/{category_id}', 'BorrowController@select_book');
	Route::post('/book/store', 'BorrowController@store');

	Route::get('/book/all', 'BorrowController@index');
	Route::get('/book/details/{id}', 'BorrowController@show');
});

//return book are here ==============
Route::prefix('return')->group(function(){
	Route::post('/book/{id}', 'ReturnController@returnBook');
	Route::get('/book/all', 'ReturnController@index');
	Route::get('/book/details/{id}', 'ReturnController@show');
	Route::get('/book/delete/{id}', 'ReturnController@destroy');
});

//overdue fine list is here==============
Route::get('/overude_fine/list', 'OverDueFineController@index');

//overdue fine payment submit
Route::get('/overude_fine/payment-submit', 'OverDueFineController@paymentTokenSend');

Route::post('/send-token', 'OverDueFineController@sendToken');

Route::get('/overude_fine/payment-verify', 'OverDueFineController@paymentVerify');

//payment verfication confirm
Route::post('/overude_fine/payment-verification', 'OverDueFineController@paymentVerifyConfirm');

//payment list
Route::prefix('/payment-list')->group(function(){
	Route::get('/all', 'PaymentListController@index');
	Route::get('/details/{id}', 'PaymentListController@show');
	Route::get('/delete/{id}', 'PaymentListController@destroy');
});
