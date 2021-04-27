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
/*
Route::get('/', function () {
    return view('welcome');
});
*/


// resource uses everything in the TaskController so you dont have to call each one.
Route::resource('/task', 'App\Http\Controllers\TaskController');
Route::get('/', 'App\Http\Controllers\TaskController@index');
