<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterData\DepartmentController;
use App\Http\Controllers\MasterData\EmployeeController;
use App\Http\Controllers\MasterData\EquipmentCategoryController;
use App\Http\Controllers\MasterData\EquipmentBrandController;
use App\Http\Controllers\MasterData\EquipmentModelController;
use App\Http\Controllers\MasterData\SupplierController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

require __DIR__.'/auth.php';

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

Route::post('master-data/departments/{id}/restore',[DepartmentController::class, 'restore'])->name('master-data.departments.restore');

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
Route::name('master-data.')->group(function () {

      Route::resource('equipment-categories', EquipmentCategoryController::class)
    ->parameters(['equipment-categories' => 'equipmentCategory']);

    Route::get('equipment-categories-trash', [EquipmentCategoryController::class, 'trash'])
        ->name('equipment-categories.trash');
    Route::post('equipment-categories/{id}/restore', [EquipmentCategoryController::class, 'restore'])
        ->name('equipment-categories.restore');
});

/* 
    Equipment Brand Routes
*/
Route::name('master-data.')->group(function () {
    Route::resource('equipment-brands', EquipmentBrandController::class);
    

    Route::get('equipment-brands-trash', [EquipmentBrandController::class, 'trash'])
        ->name('equipment-brands.trash');
    Route::post('equipment-brands/{id}/restore', [EquipmentBrandController::class, 'restore'])
        ->name('equipment-brands.restore');
});


/*
    Equipment Model Routes
*/
Route::name('master-data.')->group(function () {
   Route::resource('equipment-models', EquipmentModelController::class)
    ->parameters(['equipment-models' => 'equipmentModel']);

    
    Route::get(
        'equipment-models-trash',
        [EquipmentModelController::class, 'trash']
    )->name('equipment-models.trash');

    Route::post(
        'equipment-models/{id}/restore',
        [EquipmentModelController::class, 'restore']
    )->name('equipment-models.restore');
});

/*
    Supplier Routes
*/


Route::name('master-data.')->group(function () {
    Route::resource('suppliers', SupplierController::class);

    Route::get('suppliers-trash', [SupplierController::class, 'trash'])
        ->name('suppliers.trash');

    Route::post('suppliers/{id}/restore', [SupplierController::class, 'restore'])
        ->name('suppliers.restore');
});