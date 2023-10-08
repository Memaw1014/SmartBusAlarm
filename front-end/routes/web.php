<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\MapController;
use App\Http\Controllers\DestinationController;

Route::match(['get', 'post'], '/', function () {
    return view('selection');
})->name('home');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/some-url', function () {
    return app(DestinationController::class)->index();
});

Route::get('/destination', [DestinationController::class, 'index'])->name('show.destination');
Route::get('/map', [DestinationController::class, 'map'])->name('map');
Route::get('/destination', [DestinationController::class, 'destination'])->name('destination.show');
Route::post('/destination', [DestinationController::class, 'destinationPost'])->name('destination.post');
Route::match(['get', 'post'], '/selection', [DestinationController::class, 'selectionPost'])->name('selection.post');
Route::match(['get', 'post'], '/selection', [DestinationController::class, 'selectionPost'])->name('selection.post');
Route::get('/fare', function () {
    return view('faredisplay');
});
