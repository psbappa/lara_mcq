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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'App\Http\Controllers\mcq\Examination@index');
Route::get('/create', 'App\Http\Controllers\mcq\Examination@create');
Route::post('/result', 'App\Http\Controllers\mcq\Examination@result');   
Route::GET('/add-question', 'App\Http\Controllers\mcq\Examination@add_question')->name('add-question');
Route::POST('/submit_question', 'App\Http\Controllers\mcq\Examination@submit_question');