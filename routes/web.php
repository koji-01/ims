<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('product_cart', [App\Http\Controllers\backend\BookcategoryController::class,'BookCategoryList'])->name('bookcategory.index');
Route::get('/add_bookcategory',[App\Http\Controllers\backend\BookcategoryController::class,'BookCategoryAdd'])->name('bookcategoryadd');
Route::post('/insert_bookcategory', [App\Http\Controllers\backend\BookcategoryController::class,'BookCategoryInsert']);
Route::get('/edit_bookcategory/{id}', [App\Http\Controllers\backend\BookcategoryController::class,'BookEditCategory']);
Route::post('/update_bookcategory/{id}', [App\Http\Controllers\backend\BookcategoryController::class,'BookUpdateCategory']);
Route::get('/delete_bookcategory/{id}', [App\Http\Controllers\backend\BookcategoryController::class,'BookDeleteCategory']);

Route::get('user_list', [App\Http\Controllers\backend\UsermanagementController::class,'UserList'])->name('user.index');
Route::get('/edit_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserEdit']);
Route::post('/update_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserUpdate']);
Route::get('/delete_user/{id}', [App\Http\Controllers\backend\UsermanagementController::class,'UserDelete']);

Route::get('list_product', [App\Http\Controllers\backend\ProductController::class,'ProductList'])->name('product.index');
Route::get('/add_product',[App\Http\Controllers\backend\ProductController::class,'ProductAdd'])->name('productadd');
Route::post('/insert_product', [App\Http\Controllers\backend\ProductController::class,'ProductInsert']);
Route::get('/edit_product/{id}', [App\Http\Controllers\backend\ProductController::class,'ProductEdit']);
Route::post('/update_product/{id}', [App\Http\Controllers\backend\ProductController::class,'ProductUpdate']);
Route::get('/delete_product/{id}', [App\Http\Controllers\backend\ProductController::class,'ProductDelete']);

Route::get('quantity_list', [App\Http\Controllers\backend\QuantityController::class, 'ProductQuantityList'])->name('quantity.index');


Route::get('cart_index', [App\Http\Controllers\backend\CartController::class, 'ItemList'])->name('quantity.index');
Route::get('/cart_view', [App\Http\Controllers\backend\CartController::class, 'ItemList'])->name('quantitycart');
Route::post('/cart/add/{id}', [App\Http\Controllers\backend\CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [App\Http\Controllers\backend\CartController::class, 'cartRemove'])->name('cart.remove');
Route::get('/checkout', [App\Http\Controllers\backend\CartController::class, 'checkout'])->name('checkout.index');
Route::post('/cart/update/{id}', [App\Http\Controllers\backend\CartController::class, 'update'])->name('cart.update');

    Route::get('detail_company', [App\Http\Controllers\backend\CompanyController::class, 'index'])->name('company.index');
    Route::get('/add_company', [App\Http\Controllers\backend\CompanyController::class, 'create'])->name('company.create');
    Route::post('/insert_company', [App\Http\Controllers\backend\CompanyController::class, 'insert'])->name('company.insert');
    Route::get('/companies/{id}/edit', [App\Http\Controllers\backend\CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/companies/{id}', [App\Http\Controllers\backend\CompanyController::class, 'update'])->name('company.update');
    Route::delete('/companies/{id}', [App\Http\Controllers\backend\CompanyController::class, 'destroy'])->name('company.destroy');

    //Route::group(['middleware' => ['auth']], function () {


