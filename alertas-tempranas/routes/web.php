<?php

use Illuminate\Support\Facades\Route;
use App\Models\Monitoreo;
use App\Models\Estudio;
use App\Models\Finca;
use App\Models\Zona;
use App\Models\Canton;
use App\Models\Parroquia;
use App\Controllers\TecnicoController;
use App\Http\Controllers\MonitoreoController;
use App\Http\Controllers\EstudioController;
use App\Http\Controllers\FincaController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\DatoController;
use App\Htpp\Controllers\PlantaController;
use App\Htpp\Controllers\ParroquiaController;

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

/*functionRoute::get('/', function () {
    return view('welcome');
});*/

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\HomeController::class, 'getUser'])->name('user');

Route::resource('/','App\Http\Controllers\Principal');
Route::resource('monitoreos','App\Http\Controllers\MonitoreoController')->middleware(['auth']);
Route::resource('fincas', 'App\Http\Controllers\FincaController')->middleware(['auth','admin']);
Route::resource('zonas', 'App\Http\Controllers\ZonaController')->middleware(['auth','admin']);
Route::resource('estudios', 'App\Http\Controllers\EstudioController')->middleware('admin');
Route::resource('tecnicos', 'App\Http\Controllers\TecnicoController')->middleware('admin');
Route::resource('datos', 'App\Http\Controllers\DatoController')->middleware('auth','admin');
Route::get('/tecnico', [App\Http\Controllers\TecnicoController::class,'registro'])->middleware(['auth']);
//Route::get('/estudio', [App\Http\Controllers\EstudioController::class,'registro'])->middleware(['auth','admin']);
//Route::get('/monitoreo',[App\Http\Controllers\MonitoreoController::class, 'registro'])->middleware(['auth','admin']);
Route::get('/dato/{idMonitoreo}', [App\Http\Controllers\DatoController::class, 'pendientes'])->middleware(['auth']);
Route::post('/dato/guardar',[App\Http\Controllers\DatoController::class, 'guardar'])->middleware(['auth']);
Route::get('variedades/byfinca', 'App\Http\Controllers\FincaVariedadController@getVariedades')->name('admin.variedades.byfinca')->middleware('admin');
Route::resource('variedades', 'App\Http\Controllers\VariedadController')->middleware('admin');
Route::get('plantas/bymonitoreo', 'App\Http\Controllers\PlantaController@getPlantas')->name('admin.plantas.bymonitoreo')->middleware('admin');
Route::resource('plantas', 'App\Http\Controllers\PlantaController')->middleware('admin');
Route::get('parroquias/bycanton', 'App\Http\Controllers\ParroquiaController@getParroquias')->name('admin.parroquias.bycanton')->middleware('admin');



