<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employee', [EmployeeController::class, 'index'])->name('index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
// Route::get('/employee/{slug}', [EmployeeController::class, 'show'])->name('employee.show');
Route::get('/employee/{slug}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee/{slug}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{slug}', [EmployeeController::class, 'delete'])->name('employee.delete');