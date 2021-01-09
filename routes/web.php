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

Route::get('/', function () {
    return view('welcome');
})->name('index.home');

Auth::routes();

Route::get('/twicks', [App\Http\Controllers\TwickController::class, 'index'])->name('home');
Route::post('/twicks', [App\Http\Controllers\TwickController::class, 'store']);
Route::delete('/twicks/delete/{twick:id}', [App\Http\Controllers\TwickController::class, 'destroy'])->name('destroyTwick');
Route::post('/twicks/{id}/like',[App\Http\Controllers\TwickLikesController::class,'store'])->name('likeTwickStore');
Route::delete('/twicks/{id}/like',[App\Http\Controllers\TwickLikesController::class,'destroy'])->name('likeTwickDestroy');

Route::post('profile/{user:username}/follows',[App\Http\Controllers\FollowsController::class,'store']);
Route::get('profile/{user:username}',[App\Http\Controllers\ProfileController::class,'show'])->name('profile');
Route::get('profile/{user:username}/edit',[App\Http\Controllers\ProfileController::class,'edit'])->name('profileEdit');
Route::Put('profile/{user:username}/update',[App\Http\Controllers\ProfileController::class,'update']);
Route::delete('profile/{user:username}/delete',[\App\Http\Controllers\ProfileController::class,'destroy'])->name('profileDestroy');

Route::get('find',App\Http\Controllers\findUserController::class);
