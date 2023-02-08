<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index')->middleware('guest');
Route::get('/login',[AuthController::class,'index'])->name('login-page')->middleware('guest');
Route::post('/register',[AuthController::class,'Register'])->name('register')->middleware('guest');
Route::post('/login',[AuthController::class,'Login'])->name('login')->middleware('guest');
Route::get('/home',[HomeController::class,'index'])->name('home')->middleware('logged');
Route::get('/detail/product',[HomeController::class,'productDetail'])->name('product-detail')->middleware('logged');
Route::get('/add-cart',[OrderController::class,'addToCart'])->name('add-to-cart')->middleware('logged');
Route::get('/cart',[OrderController::class,'viewCart'])->name('view-cart')->middleware('logged');
Route::get('/cart/delete',[OrderController::class,'deleteItem'])->name('delete-item')->middleware('logged');
Route::post('/add/order',[OrderController::class,'addTransaction'])->name('add-order')->middleware('logged');
Route::post('/update/role',[AdminController::class,'updateRole'])->name('update-role')->middleware('admin');
Route::get('/logout',[AuthController::class,'logOut'])->name('logout')->middleware('logged');
Route::get('/profile', [HomeController::class,'viewProfile'])->name('profile')->middleware('logged');
Route::post('/update/profile', [AuthController::class,'updateProfile'])->name('update-profile')->middleware('logged');
Route::get('admin/account-maintenance',[AdminController::class,'manageAccount'])->name('manage-account')->middleware('admin');
Route::delete('admin/account/delete',[AdminController::class,'deleteAccountById'])->name('delete-account')->middleware('admin');
Route::get('/success',[HomeController::class,'successPage'])->name('success-page')->middleware('logged');
// Route::get('locale/{locale}', function($locale)
// {
//     \Session::put('locale',$locale);
//     return redirect()->back();
// })->name('locale');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguangeController@switchLang']);



