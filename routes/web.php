<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdvertisementController;
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

Route::get('/detail/{id}', [AdvertisementController::class, 'show'])->name('detail');



Route::get('/plaats-advertentie', [AdvertisementController::class, 'create'])->name('plaats-advertentie');
Route::post('/plaats-advertentie', [AdvertisementController::class, 'store']);

Route::get('/mijn-advertenties', [AdvertisementController::class, 'ownAdvertisements'])->middleware('auth')->name('mijn-advertenties');
Route::get('/mijn-favorieten', [AdvertisementController::class, 'favorites'])->middleware('auth')->name('mijn-favorieten');

Route::get('/account-instellingen', [AccountController::class, 'index'])->middleware('auth')->name('account-instellingen');


// Route::post('/account-instellingen', [AccountController::class]);

// Route::group(['middleware' => ['auth']]);

require __DIR__ . '/auth.php';
