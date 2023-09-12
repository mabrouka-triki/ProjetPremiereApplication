<?php

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
    return view('index1');
});

Route::get('/page1', function () {
    return view('page1');
});

Route::get('/page2', function () {
    return view('page2');
});


Route::get('/page3', function () {
    return view('page3');
});

Route::get('/', function () {
    return view('page3');
});

