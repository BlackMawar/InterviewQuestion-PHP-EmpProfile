<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome'); 
});

// Display the form page
Route::get('/form', [EmployeeController::class, 'showForm'])->name('form');

// Handle form submission
Route::post('/form', [EmployeeController::class, 'submitForm'])->name('submit.form');

//Handle showing data
Route::get('/dataView', [EmployeeController::class, 'showEmployeesData']);
