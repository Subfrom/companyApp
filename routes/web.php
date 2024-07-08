<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('companies')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('companies.index');
        Route::get('/create', [CompanyController::class, 'create'])->name('companies.create');
        Route::get('/{id}', [CompanyController::class, 'show'])->name('companies.show');
        Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
        Route::put('/update/{id}', [CompanyController::class, 'update'])->name('companies.update');
        Route::post('/save', [CompanyController::class, 'store'])->name('companies.store');
        Route::delete('/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    });

    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::get('/{id}', [EmployeeController::class, 'show'])->name('employees.show');
        Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::post('/save', [EmployeeController::class, 'store'])->name('employees.store');
        Route::delete('/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    });
});