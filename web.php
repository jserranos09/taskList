<?php


use Illuminate\Support\Facades\Route;
// this is needed for so Auth will work
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TaskController;

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


// resource uses everything in the TaskController so you dont have to call each one.
Route::resource('/task', 'App\Http\Controllers\TaskController');
Route::get('/', 'App\Http\Controllers\TaskController@index')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*
// if router recieves "/user" laravel wul go to user controller and invoce the "index" method
Route::get('/user', [UserController::class, 'index']);
// everything after post/ is treated as a parameter and gives it a slug name
Route::get('post/{slug}', [PostController::class, 'show']);
*/