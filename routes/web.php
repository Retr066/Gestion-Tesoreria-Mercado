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
use App\Http\Livewire\Filtro;
/* use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request; */

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

Route::middleware(['auth:sanctum' ])->get('/dashboard', function () {
    return view('users.dashboard');
})->name('dashboard');




Route::middleware(['auth:sanctum' ])->get('finanzas/meses/ingresos/{id}',TableIngresos::class ,'render')->where(['id' => '[0-9]+' ])->name('ingresos')->middleware('role:Trabajador|Jefe');
Route::middleware(['auth:sanctum'])->get('finanzas/meses/ingresos/ver/{id}',TableIngresosView::class ,'render')->where(['id' => '[0-9]+' ])->name('ViewIngresos')->middleware('role:Trabajador|Jefe');

Route::middleware(['auth:sanctum'])->get('finanzas/meses/egresos/{id}',TableEgresos::class ,'render')->where(['id' => '[0-9]+' ])->name('egresos')->middleware('role:Trabajador|Jefe');
Route::middleware(['auth:sanctum'])->get('finanzas/meses/egresos/ver/{id}',TableEgresosView::class ,'render')->where(['id' => '[0-9]+' ])->name('ViewEgresos')->middleware('role:Trabajador|Jefe');

Route::middleware(['auth:sanctum'])->get('/gestionUsuarios', function () {
    return view('admin.gestion');
})->name('usuarios')->middleware('role:Jefe');

Route::middleware(['auth:sanctum'])->get('finanzas/archivados', function () {
    return view('users.archivados');
})->name('archivados')->middleware('role:Trabajador|Jefe');
Route::middleware(['auth:sanctum'])->get('balance', function () {
    return view('users.balanceIngreso');
})->name('balanceI')->middleware('role:Trabajador|Jefe');

Route::get('balance/BalancePdf/{id}/dowload/{tipo}', [Filtro::class, 'GenerarPdf'])->where(['id' => '[0-9]+' ])->middleware(['middleware' => 'auth:sanctum'])->name('balancePdf')->middleware('role:Trabajador|Jefe');

Route::get('finanzas', [ListReportesController::class, 'index'])->middleware(['middleware' => 'auth:sanctum'])->name('reportes')->middleware('role:Trabajador|Jefe');
Route::middleware(['auth:sanctum'])->get('finanzas/meses/{id}',TableReportes::class ,'render')->where(['id' => '[0-9]+' ])->name('meses')->middleware('role:Trabajador|Jefe');
Route::get('finanzas/IngresoPdf/{id}/dowload', [TableReportes::class, 'GenerarPdf'])->where(['id' => '[0-9]+' ])->middleware(['middleware' => 'auth:sanctum'])->name('pdf')->middleware('role:Trabajador|Jefe');
Route::get('finanzas/EgresoPdf/{id}/dowload', [TableReportes::class, 'GenerarPdfEgreso'])->where(['id' => '[0-9]+' ])->middleware(['middleware' => 'auth:sanctum'])->name('pdfEgreso')->middleware('role:Trabajador|Jefe');
