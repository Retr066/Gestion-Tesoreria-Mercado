<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListReportesController;
use App\Http\Livewire\TableIngresos;
use App\Models\ListReportes;
use App\Models\User;
use App\Http\Livewire\TableEgresos;
use App\Http\Livewire\TableReportes;
use App\Http\Livewire\TableIngresosView;
use App\Http\Livewire\TableEgresosView;
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

Route::middleware(['auth:sanctum', 'verified'])->get('finanzas/meses/ingresos/{id}',TableIngresos::class ,'render')->where(['id' => '[0-9]+' ])->name('ingresos');
Route::middleware(['auth:sanctum', 'verified'])->get('finanzas/meses/ingresos/ver/{id}',TableIngresosView::class ,'render')->where(['id' => '[0-9]+' ])->name('ViewIngresos');

Route::middleware(['auth:sanctum', 'verified'])->get('finanzas/meses/egresos/{id}',TableEgresos::class ,'render')->where(['id' => '[0-9]+' ])->name('egresos');
Route::middleware(['auth:sanctum', 'verified'])->get('finanzas/meses/egresos/ver/{id}',TableEgresosView::class ,'render')->where(['id' => '[0-9]+' ])->name('ViewEgresos');

Route::middleware(['auth:sanctum', 'verified'])->get('/gestionUsuarios', function () {
    return view('admin.gestion');
})->name('usuarios');

Route::middleware(['auth:sanctum', 'verified'])->get('finanzas/archivados', function () {
    return view('users.archivados');
})->name('archivados');
Route::middleware(['auth:sanctum', 'verified'])->get('balance/ingresos', function () {
    return view('users.balanceIngreso');
})->name('balanceI');
Route::middleware(['auth:sanctum', 'verified'])->get('balance/egresos', function () {
    return view('users.balanceEgreso');
})->name('balanceE');

Route::get('finanzas', [ListReportesController::class, 'index'])->middleware(['middleware' => 'auth:sanctum'])->name('reportes');
Route::middleware(['auth:sanctum', 'verified'])->get('finanzas/meses/{id}',TableReportes::class ,'render')->where(['id' => '[0-9]+' ])->name('meses');
Route::get('finanzas/IngresoPdf/{id}/dowload', [TableReportes::class, 'GenerarPdf'])->where(['id' => '[0-9]+' ])->middleware(['middleware' => 'auth:sanctum'])->name('pdf');
Route::get('finanzas/EgresoPdf/{id}/dowload', [TableReportes::class, 'GenerarPdfEgreso'])->where(['id' => '[0-9]+' ])->middleware(['middleware' => 'auth:sanctum'])->name('pdfEgreso');
