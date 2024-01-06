<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::get('products', [ProductController::class,'index'])->name("products.index");
Route::get('products/{product}', [ProductController::class,'show'])->name("products.show");
Route::get('products/create', [ProductController::class,'create'])->name("products.create");
Route::post('products', [ProductController::class,'store'])->name("products.store");
Route::get('products/{product}/edit', [ProductController::class,'edit'])->name("products.edit");
Route::patch('products/{product}', [ProductController::class,'update'])->name("products.update");
Route::delete('products/{product}', [ProductController::class,'destroy'])->name("products.destroy");

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
