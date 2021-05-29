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


Auth::routes();
// go to taskController, find index method and exectue whatever is there.
Route::get('/', 'App\Http\Controllers\TaskController@index')->middleware('auth');
// resource uses everything in the TaskController so you dont have to call each one.
Route::resource('/task', 'App\Http\Controllers\TaskController');
//Route::get('/task/{slug}', 'TaskController@show');

Route::resource('/contact', 'App\Http\Controllers\ContactUsController');

// github change
