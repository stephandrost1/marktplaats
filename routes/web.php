<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ownAdvertismentController;
use Illuminate\Support\Facades\Route;

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
    return redirect('advertenties');
});

Route::get('/advertenties', [AdvertisementController::class, 'index'])->name('advertenties');
Route::post('/advertenties', [AdvertisementController::class, 'index']);

Route::get('/detail/{id}', [AdvertisementController::class, 'show'])->name('detail');
Route::post('/detail/{id}', [AdvertisementController::class, 'bid']);

Route::get('/mijn-advertenties', [ownAdvertismentController::class, 'index'])->middleware('auth')->name('mijn-advertenties');

Route::get('/mijn-favorieten', [FavoriteController::class, 'index'])->middleware('auth')->name('mijn-favorieten');
Route::post('/favorite', [FavoriteController::class, 'toggleFavorite']);

Route::get('/mijn-profiel', [AccountController::class, 'index'])->middleware('auth')->name('mijn-profiel');

Route::get('/profiel-bewerken', [AccountController::class, 'edit'])->middleware('auth')->name('profiel-bewerken');
Route::post('/profiel-bewerken', [AccountController::class, 'update'])->middleware('auth');

Route::get('/plaats-advertentie', [AdvertisementController::class, 'create'])->name('plaats-advertentie');
Route::post('/plaats-advertentie', [AdvertisementController::class, 'store']);



require __DIR__ . '/auth.php';
