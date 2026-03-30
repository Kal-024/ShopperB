<?php

use App\Http\Controllers\AuctionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUserAuth;
use App\Models\Auction;

// PUBLIC ROUTES
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// PROTECTED ROUTES
Route::middleware([IsUserAuth::class])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/me', 'getUser');
        Route::post('/logout', 'logout');
    });

    Route::get('/auctions', [AuctionController::class, 'getAuctions']);

    Route::middleware([IsAdmin::class])->group(function () {
        Route::controller(AuctionController::class)->group(function () {
            Route::post('/auctions', 'addAction');
            Route::get('/auctions/{id}', 'getAuctionById');
            Route::patch('/auctions/{id}', 'updateAuctionById');
            Route::delete('/auctions/{id}', 'deleteAuctionById');
        });
    });
});
