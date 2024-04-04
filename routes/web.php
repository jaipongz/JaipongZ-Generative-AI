<?php

use App\Models\Dashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GoogleController;

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

Route::get('exam', function () {
    return view('examget');
});
// Route::get('logo',function(){
//     return view('logo');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logo', [App\Http\Controllers\HomeController::class, 'logo'])->name('logo');
Route::get('/logopro', [App\Http\Controllers\HomeController::class, 'logopro'])->name('logopro');
Route::get('/packagepro', [App\Http\Controllers\HomeController::class, 'packagepro'])->name('packagepro');
Route::get('/package', [App\Http\Controllers\HomeController::class, 'package'])->name('package');
Route::post('/getlogo', [App\Http\Controllers\HomeController::class, 'getlogo'])->name('getlogo');
Route::post('/getpackage', [App\Http\Controllers\HomeController::class, 'getpackage'])->name('getpackage');
Route::post('/getpackagepro', [App\Http\Controllers\HomeController::class, 'getpackagepro'])->name('getpackagepro');
Route::post('/getlogopro', [App\Http\Controllers\HomeController::class, 'getlogopro'])->name('getlogopro');
Route::post('/savepic', [App\Http\Controllers\HomeController::class, 'savepic'])->name('savepic');
Route::post('/savepicpro', [App\Http\Controllers\HomeController::class, 'savepicpro'])->name('savepicpro');
Route::get('/albums{user_id}', [App\Http\Controllers\HomeController::class, 'showAlbums'])->name('albums');
Route::get('/destroy{image}{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');
// Route::delete('/destroyalbums{image}', [App\Http\Controllers\HomeController::class, 'destroyAlbums'])->name('destroyalbums');

$admin = App\Http\Controllers\AdminController::class;
Route::get('/admin', [$admin,'index'])->name('admin');
Route::get('/admin/user', [$admin,'user'])->name('admin.user');
Route::get('/admin/dashboard', [$admin,'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/albums{id}', [$admin,'adminAlbums'])->name('admin.albums');
Route::get('/admin/destroyuser{id}', [$admin,'adminDestroyUser'])->name('admin.destroyuser');
Route::get('/admin/destroyimages{id}', [$admin,'adminDestroyImage'])->name('admin.destroyimage');
Route::post('/admin/login', [$admin,'login'])->name('admin.login');


// $dash = App\Http\Controllers\DasboardController::class;
// Route::get('dashboard',[$dash,'showDashboard'])->name("dashboard");
// Route::get('upload',[$dash,'Upload'])->name("upload");

route::get('auth/google',[GoogleController::class,'googlepage']);
route::get('auth/google/callback',[GoogleController::class,'googlecallback']);