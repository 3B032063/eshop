<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('cart_items', CartItemController::class)->middleware(['auth', 'verified']);
Route::resource('orders', OrderController::class)->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/*
 Route::resource('Products', ProductController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);
*/

/* 路由名稱所用的URL、HTTP方法(或稱HTTP動詞)、與所串接的控制器&方法：
   product.index    GET        /                         Productontroller@index    顯示所有商品
   product.show     GET|HEAD   Products/{Product}        Productontroller@show     檢視某一個商品
   product.create   GET        Products/create           Productontroller@create   新增某一個商品
   product.store    POST       Products                  Productontroller@store    儲存新增的商品
   product.edit     GET|HEAD   Products/{Product}/edit   Productontroller@edit     修改某一個商品
   product.update   PUT|PATCH  Products/{Product}        Productontroller@update   更新某一個商品
   product.destroy  DELETE     Products/{Product}        Productontroller@destroy  刪除某一個商品
*/
