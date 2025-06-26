<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Backend\OrderController as OrdersController;


Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/product', [FrontendController::class, 'product']);
Route::get('/cart', [FrontendController::class, 'cart']);

// Route::get('/', function () {
//     return view('layouts.frontend');
// });


// //
// Route::get('about', function () {
//     return 'ini halaman about';
// });

// Route::get('profile', function () {
//     return view('profile');
// });

// Route::get('produk/{namaproduk}', function ($a) {
//     return 'saya membeli <b>' .$a .'</b>';
// });

// Route::get('beli/{barang}/{jumlah}' , function ($a,$b) {
//     return view('beli', compact('a', 'b'));
// });

// Route::get('Kategori/{namakategori}' ,function ($nama = null) {
//     if ($nama) {
//         return 'Anda memilih kategori : ' . $nama;
//     }else{
//         return 'Anda belum memilih kategori!';
//     }
   
// });

Route::get ('promo/{barang?}/{kode?}', function ($a = null, $b = null) {
    return view('promo',compact('a', 'b'));

    // if ($a, $b) {
    //     return 'Semua promo barang : ' .$a;
    // }elseif{
    //     return 'Promo untuk : ' .$b;
    // }else{
    //     return 'Promo untuk : ' .$a
    // }
});


Route::get('/', [FrontendController::class, 'index']);
Route::get('/product', [FrontendController::class, 'product'])->name('product.index');
Route::get('/product/{product}', [FrontendController::class, 'singleProduct'])->name('product.show');
Route::get('/product/category/{slug}', [FrontendController::class, 'filterBycateogry'])->name('product.filter');
Route::get('/search', [FrontendController::class, 'search'])->name('product.search');

Route::get('/about', [FrontendController::class, 'about']);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{product}', [CartController::class, 'addTocart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrserController::class, 'show'])->name('show.index');

Route::Post('/product/{product}/review', [ReviewController::class, 'store'])
      ->middleware('auth')->name('review.store');

use App\Http\Controllers\MyController;

Route::get('siswa',[MyController::class,'index']);

Route::get('siswa/create', [MyController::class, 'create']);
Route::post('/siswa', [MyController::class, 'store']);

Route::get('siswa/{id}', [MyController::class, 'show']);

Route::get('siswa/{id}/edit', [MyController::class, 'edit']);
Route::put('siswa/{id}', [MyController::class, 'update']);

Route::delete('siswa/{id}', [MyController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Middleware\Admin;
// Admin
use App\Http\Controllers\BackendController;
Route::group(['prefix' => 'admin','as'=>'backend.','middleware' => ['auth',Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index']);
        
    //
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/orders', OrdersController::class);
    Route::put('/orders/{id}/status', [OrdersController::class, 'updetestatus'])
       ->name('orders.updetestatus');

    });
