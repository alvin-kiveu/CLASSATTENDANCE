<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentController;

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

Route::get('/addclass', function () {
    return view('addclass');
});


Route::get('/addstudents', function () {
    return view('addstudent');
});


Route::get('/liststudents', function () {
    return view('liststudents');
});
// ADD A ROUTE WITH A PARAMETER
Route::get('/viewattendance/{id}', function ($id) {
    return view('attendance', ['id' => $id]);
});



// API Routes

Route::post('/loginuser', [AuthController::class, 'loginUser']);

Route::get('/logout', [AuthController::class, 'logoutUser']);

Route::get('/getsystermInfo', [AuthController::class, 'systermInfo']);

Route::post('/addclassprocessor', [ClassController::class, 'addClass']);

Route::get('/listclass', [ClassController::class, 'getClass']);

Route::get('/addlesson', [ClassController::class, 'addLesson']);

Route::post('/addlessonprocessor', [ClassController::class, 'addlessonApp']);

Route::get('/listlesson', [ClassController::class, 'getLesson']);

Route::get('/downloadqrcode/{lid}', [PagesController::class, 'getshowLesonQrcode']);

Route::post('/addstudent', [StudentController::class, 'AddStudent']);

Route::get('/liststudent', [PagesController::class, 'getStudent']);

//HUNDEL DELETE REQUEST
Route::get('/deleteclass/{id}', [ClassController::class, 'deleteClass']);
Route:: get('/deletestudent/{id}', [StudentController::class, 'deleteStudent']);
Route:: get('/deletelesson/{id}', [ClassController::class, 'deleteLesson']);









