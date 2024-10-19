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
})->name('api.user.profile');

// User Routes
Route::prefix('users')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('api.users.index');
    Route::post('/', [UserController::class, 'store'])->name('api.users.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('api.users.show');
    Route::put('/{id}', [UserController::class, 'update'])->name('api.users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('api.users.destroy');
});

// Customer Routes
Route::prefix('customers')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('api.customers.index');
    Route::post('/', [CustomerController::class, 'store'])->name('api.customers.store');
    Route::get('/{id}', [CustomerController::class, 'show'])->name('api.customers.show');
    Route::put('/{id}', [CustomerController::class, 'update'])->name('api.customers.update');
    Route::delete('/{id}', [CustomerController::class, 'destroy'])->name('api.customers.destroy');
});

// Laundry Owner Routes
Route::prefix('laundry-owners')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [LaundryOwnerController::class, 'index'])->name('api.laundry-owners.index');
    Route::post('/', [LaundryOwnerController::class, 'store'])->name('api.laundry-owners.store');
    Route::get('/{id}', [LaundryOwnerController::class, 'show'])->name('api.laundry-owners.show');
    Route::put('/{id}', [LaundryOwnerController::class, 'update'])->name('api.laundry-owners.update');
    Route::delete('/{id}', [LaundryOwnerController::class, 'destroy'])->name('api.laundry-owners.destroy');
});

// Order Routes
Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('api.orders.index');
    Route::post('/', [OrderController::class, 'store'])->name('api.orders.store');
    Route::get('/{id}', [OrderController::class, 'show'])->name('api.orders.show');
    Route::put('/{id}', [OrderController::class, 'update'])->name('api.orders.update');
    Route::delete('/{id}', [OrderController::class, 'destroy'])->name('api.orders.destroy');
});

// Order Item Routes
Route::prefix('order-items')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [OrderItemController::class, 'index'])->name('api.order-items.index');
    Route::post('/', [OrderItemController::class, 'store'])->name('api.order-items.store');
    Route::get('/{id}', [OrderItemController::class, 'show'])->name('api.order-items.show');
    Route::put('/{id}', [OrderItemController::class, 'update'])->name('api.order-items.update');
    Route::delete('/{id}', [OrderItemController::class, 'destroy'])->name('api.order-items.destroy');
});

// Delivery Routes
Route::prefix('deliveries')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [DeliveryController::class, 'index'])->name('api.deliveries.index');
    Route::post('/', [DeliveryController::class, 'store'])->name('api.deliveries.store');
    Route::get('/{id}', [DeliveryController::class, 'show'])->name('api.deliveries.show');
    Route::put('/{id}', [DeliveryController::class, 'update'])->name('api.deliveries.update');
    Route::delete('/{id}', [DeliveryController::class, 'destroy'])->name('api.deliveries.destroy');
});

// Notification Routes
Route::prefix('notifications')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [NotificationController::class, 'index'])->name('api.notifications.index');
    Route::post('/', [NotificationController::class, 'store'])->name('api.notifications.store');
    Route::get('/{id}', [NotificationController::class, 'show'])->name('api.notifications.show');
    Route::put('/{id}', [NotificationController::class, 'update'])->name('api.notifications.update');
    Route::delete('/{id}', [NotificationController::class, 'destroy'])->name('api.notifications.destroy');
});

// Payment Routes
Route::prefix('payments')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('api.payments.index');
    Route::post('/', [PaymentController::class, 'store'])->name('api.payments.store');
    Route::get('/{id}', [PaymentController::class, 'show'])->name('api.payments.show');
    Route::put('/{id}', [PaymentController::class, 'update'])->name('api.payments.update');
    Route::delete('/{id}', [PaymentController::class, 'destroy'])->name('api.payments.destroy');
});

// Review Routes
Route::prefix('reviews')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('api.reviews.index');
    Route::post('/', [ReviewController::class, 'store'])->name('api.reviews.store');
    Route::get('/{id}', [ReviewController::class, 'show'])->name('api.reviews.show');
    Route::put('/{id}', [ReviewController::class, 'update'])->name('api.reviews.update');
    Route::delete('/{id}', [ReviewController::class, 'destroy'])->name('api.reviews.destroy');
});
