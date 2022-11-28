<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ui\GetSartifikatController;
use GuzzleHttp\Middleware;

// frontend
use App\Http\Controllers\Frontend\CertificateController;
use App\Http\Controllers\Frontend\DesignPortoController;
use App\Http\Controllers\Frontend\NewsController as FrontendNewsController;
use App\Http\Controllers\Frontend\projectController;

// Backend
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OurClientController;
use App\Http\Controllers\PortoDesainController;
use App\Http\Controllers\SartifikasiController;
use App\Http\Controllers\ProfileProjectController;
use App\Http\Controllers\UserController;

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
Route::get('/dashboard/profile/delete-image/{data}',[ProfileProjectController::class, 'destroyImage'])->name('profile.destroyImage')->Middleware('auth');

Route::resource('/dashboard/porto_desain', PortoDesainController::class)->except(['create'])->Middleware('auth');
Route::get('/dashboard/porto_desain/delete-image/{data}',[PortoDesainController::class, 'destroyImage'])->name('porto_desain.destroyImage')->Middleware('auth');

Route::resource('/dashboard/sartifikasi', SartifikasiController::class)->except(['create'])->Middleware('auth');
Route::get('/dashboard/sartifikasi/delete-image/{data}',[SartifikasiController::class, 'destroyImage'])->name('sartifikasi.destroyImage')->Middleware('auth');


Route::resource('/dashboard/ourclient', OurClientController::class)->except(['create'])->Middleware('auth');
Route::get('/dashboard/ourclient/delete-image/{data}',[OurClientController::class, 'destroyImage'])->name('ourclient.destroyImage')->Middleware('auth');

Route::resource('/dashboard/user', UserController::class)->except(['create'])->Middleware('auth');

// news
Route::resource('/dashboard/news', NewsController::class)->except(['create'])->Middleware('auth');
Route::post('/upload/post-image/{id}',  [NewsController::class, 'uploadImage'])->name('upload.post.image');



//Route for FrontEnd
Route::get('/', function() {
    return view('frontend.index');
})->name('home');

Route::get('/about', function() {
    return view('frontend.about');
})->name('about');

Route::get('/contact', function() {
    return view('frontend.contact');
})->name('contact');

Route::group(['as' => 'projectporto.'], function () {
    Route::get('/projectPortofolio', [projectController::class, 'index'])->name('frontend.index');
    Route::get('/projectPortofolio/{id}', [projectController::class, 'show'])->name('frontend.show');
});

Route::group(['as' => 'designporto.'], function () {
    Route::get('/designportofolio', [DesignPortoController::class, 'index'])->name('frontend.index');
    Route::get('/designportofolio/{id}', [DesignPortoController::class, 'show'])->name('frontend.show');
});
Route::group(['as' => 'certificate.'], function () {
    Route::get('/certificate', [CertificateController::class, 'index'])->name('frontend.index');
    // Route::get('/news/{id}', [CertificateController::class, 'show'])->name('frontend.show');
});

Route::group(['as' => 'news.'], function () {
    Route::get('/news', [FrontendNewsController::class, 'index'])->name('frontend.index');
    Route::get('/news/{id}', [FrontendNewsController::class, 'show'])->name('frontend.show');
});
