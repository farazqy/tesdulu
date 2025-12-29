<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $rooms = Room::latest()->take(3)->get();
    
    $todaySchedules = Booking::with('room')
                        ->where('status', 'approved')
                        ->whereDate('start_time', now())
                        ->orderBy('start_time', 'asc')
                        ->take(5)
                        ->get();

    return view('welcome', compact('rooms', 'todaySchedules'));
})->name('home');
// ----------------------------------------------------------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/bookings/{booking}/approve', [BookingController::class, 'approve'])->name('bookings.approve');
    Route::patch('/bookings/{booking}/reject', [BookingController::class, 'reject'])->name('bookings.reject');
    Route::get('/bookings/{booking}/ticket', [BookingController::class, 'ticket'])->name('bookings.ticket');
    Route::get('/daily-schedule', [BookingController::class, 'dailySchedule'])->name('bookings.daily');
    Route::resource('bookings', BookingController::class)->only(['index', 'create', 'store']);
    Route::resource('rooms', RoomController::class); 
});

require __DIR__.'/auth.php';