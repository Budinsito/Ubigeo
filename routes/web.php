<?php

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

//Me muestra al cargar las regiones
Route::get('ubigeo','ubigeoController@create')->name('createUbigeo');
//Me muestra las provincias por Regiones
Route::post('BuscaProvincias','ubigeoController@BuscaProvincias')->name('BuscaProvincias');
//Me muestra los Distritos por Regiones y provincia
Route::post('BuscaDistritos','ubigeoController@BuscaDistritos')->name('BuscaDistritos');