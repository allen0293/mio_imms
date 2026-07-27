<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterData\DepartmentController;
use App\Http\Controllers\MasterData\EmployeeController;
use App\Http\Controllers\MasterData\EquipmentCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

});

/* 
    Department Routes
*/
Route::middleware(['auth'])->group(function () {

    Route::prefix('master-data')
        ->name('master-data.')
        ->group(function () {

            Route::resource('departments', DepartmentController::class);

        });

});

Route::post(
    'master-data/departments/{id}/restore',
    [DepartmentController::class, 'restore']
)->name('master-data.departments.restore');

Route::get(
    'master-data/departments-trash',
    [DepartmentController::class, 'trash']
)->name('master-data.departments.trash');


/* 
    Employee Routes
*/
Route::prefix('master-data')->name('master-data.')->group(function () {
    Route::resource('employees', EmployeeController::class);
});

Route::prefix('master-data')->name('master-data.')->group(function () {
    Route::resource('employees', EmployeeController::class);

    Route::get('employees-trash', [EmployeeController::class, 'trash'])
        ->name('employees.trash');

    Route::post('employees/{id}/restore', [EmployeeController::class, 'restore'])
        ->name('employees.restore');
});



/* 
    Equipment Category Routes
*/
/* 
    Equipment Category Routes
*/
Route::name('master-data.')->group(function () {
    Route::resource('equipment-categories', EquipmentCategoryController::class);

    Route::get('equipment-categories-trash', [EquipmentCategoryController::class, 'trash'])
        ->name('equipment-categories.trash');
    Route::post('equipment-categories/{id}/restore', [EquipmentCategoryController::class, 'restore'])
        ->name('equipment-categories.restore');
});