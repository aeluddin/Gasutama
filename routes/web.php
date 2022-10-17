<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OurClientController;
use App\Http\Controllers\PortoDesainController;
use App\Http\Controllers\SartifikasiController;
use App\Http\Controllers\ProfileProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\Ui\GetSartifikatController;
use GuzzleHttp\Middleware;

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

Route::get('/admin', function () {
    return view('home',[
        'title' => 'Home'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login') ;
Route::post('/login', [LoginController::class, 'autentifikasi']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/dashboard/profile', ProfileProjectController::class)->except(['create'])->Middleware('auth');
Route::get('/dashboard/profile/delete-image/{data}',[ProfileProjectController::class, 'destroyImage'])->Middleware('auth');

Route::resource('/dashboard/porto_desain', PortoDesainController::class)->except(['create'])->Middleware('auth');
Route::get('/dashboard/porto_desain/delete-image/{data}',[PortoDesainController::class, 'destroyImage'])->Middleware('auth');

Route::resource('/dashboard/sartifikasi', SartifikasiController::class)->except(['create'])->Middleware('auth');
Route::get('/dashboard/sartifikasi/delete-image/{data}',[SartifikasiController::class, 'destroyImage'])->Middleware('auth');


Route::resource('/dashboard/ourclient', OurClientController::class)->except(['create'])->Middleware('auth');
Route::get('/dashboard/ourclient/delete-image/{data}',[OurClientController::class, 'destroyImage'])->Middleware('auth');

Route::resource('/dashboard/user', UserController::class)->except(['create'])->Middleware('auth');


Route::get('/sertifikasi', [GetSartifikatController::class, 'index']);


//Route for Front End
Route::get('/', function() {
    return view('frontend.index');
});

Route::get('/about', function() {
    return view('frontend.about');
});

Route::get('/projectPortofolio', [projectController::class,'index']);

Route::resource('projectPortofolioDetails', projectController::class)->except(['create']);

Route::get('/designPortofolio', function() {
    return view('frontend.designPortofolio');
});

Route::get('/designPortofolioDetails', function() {
    return view('frontend.designPortofolioDetails');
});

Route::get('/certificate', function() {
    return view('frontend.certificate');
});

Route::get('/contact', function() {
    return view('frontend.contact');
});