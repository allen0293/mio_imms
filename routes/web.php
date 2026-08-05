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
use App\Http\Controllers\Procurement\PurchaseRequestController;
use App\Http\Controllers\Procurement\PurchaseRequestAttachmentController;
use App\Http\Controllers\ItemCategoryController;
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


/*
    Purchase Request Routes
*/
Route::prefix('procurement')
    ->name('procurement.')
    ->middleware(['auth'])
    ->group(function () {

        Route::resource('purchase-requests', PurchaseRequestController::class);

        Route::get(
            'purchase-requests-trash',
            [PurchaseRequestController::class, 'trash']
        )->name('purchase-requests.trash');

        Route::patch(
            'purchase-requests/{purchaseRequest}/restore',
            [PurchaseRequestController::class, 'restore']
        )->withTrashed()
         ->name('purchase-requests.restore');

    });

    /*
    purchase request 
    */
    Route::middleware(['auth'])
    ->prefix('procurement')
    ->name('procurement.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Purchase Requests
        |--------------------------------------------------------------------------
        */

        Route::get(
            'purchase-requests/trash',
            [PurchaseRequestController::class, 'trash']
        )->name('purchase-requests.trash');

        Route::put(
            'purchase-requests/{id}/restore',
            [PurchaseRequestController::class, 'restore']
        )->name('purchase-requests.restore');

        /*
        |--------------------------------------------------------------------------
        | Workflow
        |--------------------------------------------------------------------------
        */

        Route::post(
            'purchase-requests/{purchaseRequest}/submit',
            [PurchaseRequestController::class, 'submit']
        )->name('purchase-requests.submit');

        Route::post(
            'purchase-requests/{purchaseRequest}/approve',
            [PurchaseRequestController::class, 'approve']
        )->name('purchase-requests.approve');

        Route::post(
            'purchase-requests/{purchaseRequest}/reject',
            [PurchaseRequestController::class, 'reject']
        )->name('purchase-requests.reject');

        Route::post(
            'purchase-requests/{purchaseRequest}/cancel',
            [PurchaseRequestController::class, 'cancel']
        )->name('purchase-requests.cancel');

        Route::get(
            'purchase-requests/{purchaseRequest}/print',
            [PurchaseRequestController::class, 'print']
        )->name('purchase-requests.print');

        /*
        |--------------------------------------------------------------------------
        | CRUD
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'purchase-requests',
            PurchaseRequestController::class
        );

    });

    /*
    |--------------------------------------------------------------------------
    | Purchase Request Attachments
    |--------------------------------------------------------------------------
    */
    Route::post(
        'purchase-requests/{purchaseRequest}/attachments',
        [PurchaseRequestAttachmentController::class, 'store']
    )->name('procurement.purchase-requests.attachments.store');

    Route::delete(
        'purchase-request-attachments/{attachment}',
        [PurchaseRequestAttachmentController::class, 'destroy']
    )->name('procurement.purchase-requests.attachments.destroy');       


    Route::get(
    'purchase-requests/{purchaseRequest}/print',
    [PurchaseRequestController::class, 'print']
)->name('procurement.purchase-requests.print');

Route::resource(
    'item-categories',
    ItemCategoryController::class
);