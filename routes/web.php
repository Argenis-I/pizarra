<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonedaController;
use Illuminate\Support\Facades\Auth;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [MonedaController::class, 'cliente']);

Route::middleware(['auth'])->group(function () {
    Route::resource('moneda', MonedaController::class)->except(['cliente']);
    Route::get('/home', [MonedaController::class, 'index'])->name('home');
});

Auth::routes(['register' => false, 'reset' => false]);
