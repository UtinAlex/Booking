<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\Resources\Controllers\ResourcesController;


Route::prefix('resources')
    ->name('resources.')
    ->group(
        static function () {
            Route::post('/', [ResourcesController::class, 'store'])->name('store-resources');
        }
    );


