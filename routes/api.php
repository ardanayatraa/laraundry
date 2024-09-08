<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\LaundryOwnerController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderItemController;
use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ReviewController;

// Route to get the authenticated user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
})->name('user.profile');

// User Routes
Route::prefix('users')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Customer Routes
Route::prefix('customers')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/{id}', [CustomerController::class, 'show'])->name('customers.show');
    Route::put('/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
});

// Laundry Owner Routes
Route::prefix('laundry-owners')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [LaundryOwnerController::class, 'index'])->name('laundry-owners.index');
    Route::post('/', [LaundryOwnerController::class, 'store'])->name('laundry-owners.store');
    Route::get('/{id}', [LaundryOwnerController::class, 'show'])->name('laundry-owners.show');
    Route::put('/{id}', [LaundryOwnerController::class, 'update'])->name('laundry-owners.update');
    Route::delete('/{id}', [LaundryOwnerController::class, 'destroy'])->name('laundry-owners.destroy');
});

// Order Routes
Route::prefix('orders')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::put('/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

// Order Item Routes
Route::prefix('order-items')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [OrderItemController::class, 'index'])->name('order-items.index');
    Route::post('/', [OrderItemController::class, 'store'])->name('order-items.store');
    Route::get('/{id}', [OrderItemController::class, 'show'])->name('order-items.show');
    Route::put('/{id}', [OrderItemController::class, 'update'])->name('order-items.update');
    Route::delete('/{id}', [OrderItemController::class, 'destroy'])->name('order-items.destroy');
});

// Delivery Routes
Route::prefix('deliveries')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [DeliveryController::class, 'index'])->name('deliveries.index');
    Route::post('/', [DeliveryController::class, 'store'])->name('deliveries.store');
    Route::get('/{id}', [DeliveryController::class, 'show'])->name('deliveries.show');
    Route::put('/{id}', [DeliveryController::class, 'update'])->name('deliveries.update');
    Route::delete('/{id}', [DeliveryController::class, 'destroy'])->name('deliveries.destroy');
});

// Notification Routes
Route::prefix('notifications')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/', [NotificationController::class, 'store'])->name('notifications.store');
    Route::get('/{id}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::put('/{id}', [NotificationController::class, 'update'])->name('notifications.update');
    Route::delete('/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
});

// Payment Routes
Route::prefix('payments')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('/', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/{id}', [PaymentController::class, 'show'])->name('payments.show');
    Route::put('/{id}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
});

// Review Routes
Route::prefix('reviews')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/{id}', [ReviewController::class, 'show'])->name('reviews.show');
    Route::put('/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});
