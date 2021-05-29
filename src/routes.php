<?php

use \JanyPoch\Inventories\Controllers\UserController;
use \JanyPoch\Inventories\Controllers\InventoriesController;
use \JanyPoch\Inventories\Controllers\BundleController;


Route::prefix('api')->middleware('api')->group(function () {
    Route::group(['prefix' => 'users'], function () {
        Route::post('/{user}/inventory', [UserController::class, 'setInventory']);
    });
    Route::group(['prefix' => 'inventories'], function () {
        Route::get('/{inventory}', [InventoriesController::class, 'get']);
    });
    Route::group(['prefix' => 'bundles'], function () {
        Route::get('/', [BundleController::class, 'index']);
        Route::get('/{bundle}', [BundleController::class, 'get']);
        Route::post('/{bundle}/attach', [BundleController::class, 'attach']);
        Route::post('/', [BundleController::class, 'create']);
    });
});
