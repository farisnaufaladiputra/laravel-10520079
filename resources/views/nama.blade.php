<?php



Route::get('/',function() {
    return view('welcome');


});

Route::get('/belajar', function() {
    echo 'belajar TPEC1 laravel,tulisan ini ditampilkan dari view';
    return view('belajar');

});

Route::get('/nama', function() {
    echo 'nama faris belajar laravel,tulisan ini ditampilkan dari view';
    return view('nama');

});

Route::get('/kelas', function() {
    echo 'kelas IS-3 belajar laravel,tulisan ini ditampilkan dari view';
    return view('kelas');

});