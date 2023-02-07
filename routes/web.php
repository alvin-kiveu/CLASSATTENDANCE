<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PagesController;

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
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/addmenu', function () {
    return view('addmenu');
});


// API Routes

Route::post('/loginuser', [AuthController::class, 'loginUser']);

Route::get('/logout', [AuthController::class, 'logoutUser']);

Route::get('/getsystermInfo', [AuthController::class, 'systermInfo']);

Route::get('/listmenu', [MenuController::class, 'getMenu']);

Route::post('/addmenuprocessor', [MenuController::class, 'addMenu']);

Route::get('/addsubmenu', [MenuController::class, 'addSubMenu']);

Route::post('/addsubmenuprocessor', [MenuController::class, 'addSubMenuApp']);

Route::get('/listsubmenu', [MenuController::class, 'getSubMenu']);

Route::get('/addpage', [PagesController::class, 'appAddpage']);

Route::get('/listpages', [PagesController::class, 'getPages']);

Route::post('/addpageprocessor', [PagesController::class, 'addPage']);





