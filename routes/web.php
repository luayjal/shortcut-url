<?php

use App\Http\Controllers\UrlController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('dashboard')
->as('dashboard.')
->middleware('auth')
->group(function(){
    Route::get('index',[UrlController::class,'index'])->name('index');
    Route::get('create',[UrlController::class,'create'])->name('create');
    Route::post('store',[UrlController::class,'store'])->name('store');
});
Route::get('/{short}',[UrlController::class,'short'])->name('short');