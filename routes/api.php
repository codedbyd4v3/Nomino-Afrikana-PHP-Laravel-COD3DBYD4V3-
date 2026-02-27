<?php

use Illuminate\Support\Facades\Route;


// Controller Imports 
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiscographyController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;


// User Routes
Route::prefix('user')->group(function () {
    // Public 
    Route::post('/signup', [UserController::class, 'signup']);
    Route::post('/login', [UserController::class, 'login']);

    // Protected 
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/current_user', [UserController::class, 'me']);
        Route::patch('/update', [UserController::class, 'update']);
        Route::delete('/logout', [UserController::class, 'logout']);
    });
});


// Discography Routes
Route::prefix('disc')->group(function () {
    // Public
    Route::get('/all', [DiscographyController::class, 'index']);
    Route::get('/{id}', [DiscographyController::class, 'show']);

    // Protected
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/add', [DiscographyController::class, 'store']);
        Route::patch('/{id}', [DiscographyController::class, 'update']);
        Route::delete('/{id}', [DiscographyController::class, 'destroy']);
    });
});


// Video Routes
Route::prefix('video')->group(function () {
    // Public
    Route::get('/all', [VideoController::class, 'all']);
    Route::get('/{id}', [VideoController::class, 'get']);

    // Protected
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/add', [VideoController::class, 'add']);
        Route::patch('/{id}', [VideoController::class, 'update']);
        Route::delete('/{id}', [VideoController::class, 'delete']);
    });
});


//  Event Routes
Route::prefix('event')->group(function () {
    // Public
    Route::get('/all', [EventController::class, 'all']);
    Route::get('/{id}', [EventController::class, 'get']);

    // Protected
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/add', [EventController::class, 'add']);
        Route::patch('/{id}', [EventController::class, 'update']);
        Route::delete('/{id}', [EventController::class, 'delete']);
    });
});


// Gallery Routes
Route::prefix('gallery')->group(function () {
    // Public
    Route::get('/all', [GalleryController::class, 'all']);
    Route::get('/{id}', [GalleryController::class, 'get']);

    // Protected
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/add', [GalleryController::class, 'add']);
        Route::patch('/{id}', [GalleryController::class, 'update']);
        Route::delete('/{id}', [GalleryController::class, 'delete']);
    });
});
