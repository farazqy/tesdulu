<?php

use App\Http\Controllers\Api\RoomApiController;

// Endpoint: /api/rooms
Route::get('/rooms', [RoomApiController::class, 'index']);
// Endpoint: /api/rooms/{id}
Route::get('/rooms/{id}', [RoomApiController::class, 'show']);