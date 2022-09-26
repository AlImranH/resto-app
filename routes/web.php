<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\ReservationController;
use App\Http\Controllers\admin\TableController;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/order/{menuId}', [FrontendController::class, 'order'])->name('order');
Route::post('/reservation/store/step-one', [FrontendController::class, 'storeStepOne'])->name('reservation.store.stepOne');
Route::get('/reservation/step-tow', [FrontendController::class, 'stepTwo'])->name('reservation.step.two');
Route::post('/reservation/store/step-two', [FrontendController::class, 'storeStepTwo'])->name('reservation.store.step.two');

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard.index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class);
});

// Route::get('/dashboard', function () {

//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
