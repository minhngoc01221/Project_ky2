<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\UserCustomersController;
use App\Http\Controllers\Api\UserTransportController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OderDetailController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\RetailController;
use App\Http\Controllers\Api\WholesaleController;
use App\Http\Controllers\Api\ImportExportController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\MonitorController;
use App\Http\Controllers\Api\WarningController;
use App\Http\Controllers\Api\ImagePostController;
use App\Http\Controllers\Api\ImageExportController;


Route::apiResource('admin', AdminController::class);
Route::apiResource('user-customers', UserCustomersController::class); // xong lỗi
Route::apiResource('user-transports', UserTransportController::class);// xong lỗi 
Route::apiResource('suppliers', SupplierController::class);// xonglỗi
Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('oder-details', OderDetailController::class); // lỗi 
Route::apiResource('reviews', ReviewController::class); // lỗi 
Route::apiResource('retails', RetailController::class); // lỗi 
Route::apiResource('wholesales', WholesaleController::class); // lỗi 
Route::apiResource('import-exports', ImportExportController::class); // lỗi 
Route::apiResource('inventories', InventoryController::class); // lỗi 
Route::apiResource('monitors', MonitorController::class);
Route::apiResource('warnings', WarningController::class);
Route::apiResource('image-posts', ImagePostController::class); // lỗi 
Route::apiResource('image-exports', ImageExportController::class); // lỗi 
Route::apiResource('reviews', ReviewController::class); // lỗi
