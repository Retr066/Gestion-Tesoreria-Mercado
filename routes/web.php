<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListReportesController;
use App\Http\Livewire\TableIngresos;
use App\Models\ListReportes;
use App\Models\User;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('users.dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/ingresos/{id_reporte}',TableIngresos::class)->where(['id_reporte' => '[0-9]+','id_reporte' => DB::table('list_reportes')->pluck('id'), 'id_reporte' => !0 ])->name('ingresos');

Route::middleware(['auth:sanctum', 'verified'])->get('/egresos', function () {
    return view('users.egresos');
})->name('egresos');

Route::middleware(['auth:sanctum', 'verified'])->get('/gestionUsuarios', function () {
    return view('admin.gestion');
})->name('usuarios');

/* Route::get('/ingresos/{id}', function ($id) {
    return 'User '.$id;
}); */

/* Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::view('/repotes', 'users.reportes')->name('reportes');
}); */


Route::get('/reportes', [ListReportesController::class, 'index'])->middleware(['middleware' => 'auth:sanctum'])->name('reportes');
