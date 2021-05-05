<?php

use Illuminate\Support\Facades\Route;
use App\Models\Monitoreo;
use App\Models\Estudio;
use App\Http\Controllers\MonitoreoController;
use App\Http\Controllers\EstudioController;

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

Route::resource('monitoreos','App\Http\Controllers\MonitoreoController');
Route::get('/inicio',[MonitoreoController::class,'index']);
Route::get('/crear',[MonitoreoController::class,'create']);
Route::post('/guardar',[MonitoreoController::class,'store']);
Route::get('editar/{id}',[MonitoreoController::class,'edit'])->name('editar');
Route::patch('edit/{id}',[MonitoreoController::class,'update'])->name('edit');
Route::delete('borrar/{id}',[MonitoreoController::class,'delete'])->name('borrar');
