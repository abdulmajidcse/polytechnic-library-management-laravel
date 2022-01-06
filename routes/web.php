<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LibraryUserController;
use App\Http\Controllers\OverDueFineController;
use App\Http\Controllers\PasswordChangeController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');


//user(admin) profile
Route::get('/profile', [UserController::class, 'index']);

Route::get('/profile/edit', [UserController::class, 'edit']);

Route::post('/profile/update', [UserController::class, 'update']);

//password change after login
Route::get('/password/change', [PasswordChangeController::class, 'index']);

Route::post('/password/update', [PasswordChangeController::class, 'store']);

//category crud are here ==================
Route::prefix('category')->group(function () {
	Route::get('/add', [CategoryController::class, 'create']);

	Route::post('/store', [CategoryController::class, 'store']);

	Route::get('/all', [CategoryController::class, 'index']);

	Route::get('/edit/{id}', [CategoryController::class, 'edit']);

	Route::post('/update/{id}', [CategoryController::class, 'update']);

	Route::get('/delete/{id}', [CategoryController::class, 'destroy']);
});

//book crud are here ====================
Route::prefix('book')->group(function () {
	Route::get('/add', [BookController::class, 'create']);

	Route::post('/store', [BookController::class, 'store']);

	Route::get('/all', [BookController::class, 'index']);

	Route::get('/edit/{id}', [BookController::class, 'edit']);

	Route::post('/update/{id}', [BookController::class, 'update']);

	Route::get('/delete/{id}', [BookController::class, 'destroy']);
});

//library user crud are here==================
Route::prefix('user')->group(function () {
	Route::get('/student/add', [LibraryUserController::class, 'create_student']);
	Route::get('/staff/add', [LibraryUserController::class, 'create_staff']);

	Route::post('/student/store', [LibraryUserController::class, 'store_student']);
	Route::post('/staff/store', [LibraryUserController::class, 'store_staff']);

	Route::get('/student/all', [LibraryUserController::class, 'index_student']);
	Route::get('/staff/all', [LibraryUserController::class, 'index_staff']);

	Route::get('/student/edit/{id}', [LibraryUserController::class, 'edit_student']);
	Route::post('/student/update/{id}', [LibraryUserController::class, 'update_student']);

	Route::get('/staff/edit/{id}', [LibraryUserController::class, 'edit_staff']);
	Route::post('/staff/update/{id}', [LibraryUserController::class, 'update_staff']);

	Route::get('/delete/{id}', [LibraryUserController::class, 'destroy']);
});

//borrow book crud are here ==============
Route::prefix('borrow')->group(function () {
	Route::get('/book', [BorrowController::class, 'create']);
	Route::get('/select/user/{person}', [BorrowController::class, 'select_user']);
	Route::get('/select/book/{category_id}', [BorrowController::class, 'select_book']);
	Route::post('/book/store', [BorrowController::class, 'store']);

	Route::get('/book/all', [BorrowController::class, 'index']);
	Route::get('/book/details/{id}', [BorrowController::class, 'show']);
});

//return book are here ==============
Route::prefix('return')->group(function () {
	Route::post('/book/{id}', [ReturnController::class, 'returnBook']);
	Route::get('/book/all', [ReturnController::class, 'index']);
	Route::get('/book/details/{id}', [ReturnController::class, 'show']);
	Route::get('/book/delete/{id}', [ReturnController::class, 'destroy']);
});

//overdue fine list is here==============
Route::get('/overude_fine/list', [OverDueFineController::class, 'index']);

//overdue fine payment submit
Route::get('/overude_fine/payment-submit', [OverDueFineController::class, 'paymentTokenSend']);

Route::post('/send-token', [OverDueFineController::class, 'sendToken']);

Route::get('/overude_fine/payment-verify', [OverDueFineController::class, 'paymentVerify']);

//payment verfication confirm
Route::post('/overude_fine/payment-verification', [OverDueFineController::class, 'paymentVerifyConfirm']);

//payment list
Route::prefix('/payment-list')->group(function () {
	Route::get('/all', [PaymentListController::class, 'index']);
	Route::get('/details/{id}', [PaymentListController::class, 'show']);
	Route::get('/delete/{id}', [PaymentListController::class, 'destroy']);
});
