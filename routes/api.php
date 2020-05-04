<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('mahasiswa', 'MahasiswaController@index');

Route::get('mahasiswa/{id}', 'MahasiswaController@getId');

Route::post('mahasiswa', 'MahasiswaController@create');

Route::put('mahasiswa/update/{id}', 'MahasiswaController@update');

Route::delete('mahasiswa/{id}', 'MahasiswaController@delete');