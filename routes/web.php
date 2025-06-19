<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//
Route::get('about', function () {
    return 'ini halaman about';
});

Route::get('profile', function () {
    return view('profile');
});

Route::get('produk/{namaproduk}', function ($a) {
    return 'saya membeli <b>' .$a .'</b>';
});

Route::get('beli/{barang}/{jumlah}' , function ($a,$b) {
    return view('beli', compact('a', 'b'));
});

Route::get('Kategori/{namakategori}' ,function ($nama = null) {
    if ($nama) {
        return 'Anda memilih kategori : ' . $nama;
    }else{
        return 'Anda belum memilih kategori!';
    }
   
});

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


use App\Http\Controllers\MyController;

Route::get('siswa',[MyController::class,'index']);

Route::get('siswa/create', [MyController::class, 'create']);
Route::post('/siswa', [MyController::class, 'store']);

Route::get('siswa/{id}', [MyController::class, 'show']);

Route::get('siswa/{id}/edit', [MyController::class, 'edit']);
Route::put('siswa/{id}', [MyController::class, 'update']);

Route::delete('siswa/{id}', [MyController::class, 'destroy']);
