<?php

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

Route::middleware(['auth', 'petowner'])->group(function(){
    Route::get('/petowner/register', [\App\Http\Controllers\PetController::class, 'create']);
    Route::post('/petowner/registerd', [\App\Http\Controllers\PetController::class, 'store']);

    Route::get('/petowner/requests', [\App\Http\Controllers\PetController::class, 'showrequests']);
    Route::post('/petowner/accept', [\App\Http\Controllers\PetController::class, 'storerequests']);

    Route::get('/review', [\App\Http\Controllers\PetController::class, 'review']);
    Route::post('/review/send', [\App\Http\Controllers\PetController::class, 'storereview']);

});

Route::middleware(['auth', 'sitter'])->group(function(){
    Route::get('/pet/{id}/sit', [\App\Http\Controllers\SitterController::class, 'create']);
    Route::post('/pet/{id}/sitting', [\App\Http\Controllers\SitterController::class, 'store']);

    Route::get('sitter/edit', [\App\Http\Controllers\SitterController::class, 'update']);
    Route::post('/sitter/update', [\App\Http\Controllers\SitterController::class, 'upload']);
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/content-manager/users', [\App\Http\Controllers\AdminController::class, 'user']);
    Route::post('/content-manager/ban', [\App\Http\Controllers\AdminController::class, 'ban']);
    
    Route::get('/content-manager/deleterequests', [\App\Http\Controllers\AdminController::class, 'request']);
    Route::post('/content-manager/delete', [\App\Http\Controllers\AdminController::class, 'delete']);

});

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/petowner/{id}', [\App\Http\Controllers\PetController::class, 'showuser']);
Route::get('/petowner', [\App\Http\Controllers\PetController::class, 'indexuser']);
Route::get('/pet/{id}', [\App\Http\Controllers\PetController::class, 'show']);
Route::get('/pets', [\App\Http\Controllers\PetController::class, 'index']);
Route::get('/', [\App\Http\Controllers\PetController::class, 'index']);

Route::get('/sitter/{id}', [\App\Http\Controllers\SitterController::class, 'show']);
Route::get('/sitter', [\App\Http\Controllers\SitterController::class, 'index']);


