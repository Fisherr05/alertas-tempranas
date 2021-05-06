<?php

use Illuminate\Support\Facades\Route;
use App\Models\Monitoreo;
use App\Models\Estudio;
use App\Models\Finca;
use App\Models\Zona;
use App\Models\Canton;
use App\Models\Parroquia;
use App\Http\Controllers\MonitoreoController;
use App\Http\Controllers\EstudioController;
use App\Http\Controllers\FincaController;
use App\Http\Controllers\ZonaController;

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

Route::resource('monitoreos','App\Http\Controllers\MonitoreoController');
Route::resource('fincas', 'App\Http\Controllers\FincaController');
Route::resource('zonas', 'App\Http\Controllers\ZonaController');
Route::resource('estudios', 'App\Http\Controllers\EstudioController');
