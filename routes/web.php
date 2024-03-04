<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomentarfotoController;
use App\Http\Controllers\LikefotoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Models\Komentar;
use App\Models\Post;

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
Route::middleware('UserMiddleware')->group(function () {
    // Route::resource('home', HomeController::class);
    // Route::resource('Like', LikefotoController::class);

    Route::get('/foto/{id}', [HomeController::class, 'index'])->name('foto.index');
    Route::get('/home/{id}', [HomeController::class, 'tampilan'])->name('home.view');
    Route::get('/folder', [HomeController::class, 'folder'])->name('Home.index');
    Route::get('/mypost', [HomeController::class, 'mypost'])->name('mypost');
    Route::delete('/komentar/{komentarfoto}', [KomentarfotoController::class, 'destroy'])->name('komentar.delete');
    Route::get('/detailpost/{id}', [HomeController::class, 'tampilan'])->name('detailpost');
    Route::get('/Profile', [ProfileController::class, 'index'])->name('Profile');
    Route::put('/Profile{id}', [ProfileController::class, 'store'])->name('profile.update');
    Route::get('/album', [AlbumController::class, 'index'])->name('album.index');
    Route::post('/album', [AlbumController::class, 'store'])->name('album.create');
    Route::delete('/album/{album}', [AlbumController::class, 'destroy'])->name('album.destroy');
    Route::put('/album/{id}', [AlbumController::class, 'update'])->name('album.update');
    Route::get('/createpost', [FotoController::class, 'index'])->name('post.index');
    Route::post('/createpost', [FotoController::class, 'store'])->name('User.create');
    Route::get('/updatepost/{id}', [FotoController::class, 'show'])->name('User.show');
    Route::put('/updatepost/{id}', [FotoController::class, 'update'])->name('User.update');
    Route::resource('Komentar', KomentarfotoController::class);

    Route::post('/like/{id}', [LikefotoController::class, 'store'])->name('like.create');
    // Route::get('/Like/{id}', [LikefotoController::class, 'Liked']);
    // Route::get('/MostLiked', [HomeController::class, 'mostliked']);

});

Route::get('/Register', [AuthController::class, 'registerPage'] )->name('registerPage');
Route::post('/createregis',[AuthController::class, 'createregis'] )->name('createregis');
Route::get('/Masuk', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'loginproses'])->name('loginproses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::resource('Post', PostController::class);

Route::get('/', function () {
    return view('welcome');
    // return view('course');
});
