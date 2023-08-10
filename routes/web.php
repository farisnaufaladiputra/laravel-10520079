<?php

use App\Http\Controllers\ProdukController;


Route::get('/', function () {
    return view('welcome');
});
route::get('/belajar', function() {
    echo 'Belajar Laravel. Tulisan ini ditampilkan dari routes';
    return view('belajar');
});
route::get('/nama', function() {
    echo 'faris';
});
route::get('/kelas', function() {
    echo 'IS-3';
});
route::get('/teman', function() {
    echo 'semua ';
});
route::get('/produk', [ProdukController::class, 'index']);

route::get('/produk/create', [ProdukController::class, 'create']);

route::post('/produk/create', [ProdukController::class, 'store']);

route::get('/produk/show', [ProdukController::class, 'store']);

