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
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/companies/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/update/{id}', [CompanyController::class, 'update'])->name('companies.update');
    Route::post('/companies/save', [CompanyController::class, 'store'])->name('companies.store');
    Route::delete('/companies/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
});

// Route::resource('companies', CompanyController::class);
// Route::resource('employees', EmployeeController::class);
