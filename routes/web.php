<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\student;
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
// Route::get("/", function () {
//     return view('welcome')
Route::get('/ip',[student::class,'index'])->name('ip');
Route::get('/get',[FormController::class,'details'])->name('detail');
Route::get('/detaails',function(){
    return view('details');
})->name('details');
Route::get('/login',function(){
return view('login');
})->name('login');
Route::post('/getUser',[FormController::class,'getData'])->name('add');
Route::get('/', function () {
    return view('welcome');
})->name('home');
