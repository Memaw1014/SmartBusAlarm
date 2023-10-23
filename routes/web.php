<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\AuthManager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// Selection Routes
Route::get('/selection', function () {
    return view('selection');
});
Route::post('/selection', [DestinationController::class, 'selectionPost'])->name('selection.post');

Route::get('/destination', [DestinationController::class, 'index'])->name('show.destination');
Route::get('/map', [DestinationController::class, 'map'])->name('map');
Route::get('/destination', [DestinationController::class, 'destination'])->name('destination.show');
Route::post('/destination/{selected_seat}', [DestinationController::class, 'destinationPost'])->name('destination.post');
Route::get('/history', 'HistoryController@index');
Route::get('/destination', [DestinationController::class, 'destination'])->name('show-destination');
Route::post('/destination', [DestinationController::class, 'destinationPost'])->name('store-data');
Route::get('/table', [DestinationController::class, 'displayTable'])->name('show-table');
