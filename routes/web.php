<?php
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::match(['get', 'post'], '/', function () {
    return view('welcome');
})->name('home');

Route::match(['get', 'post'], '/1', function () {
    return view('selection');
})->name('home1');


Route::match(['get', 'post'], '/2', function () {
    return view('selection2');
})->name('home2');

Route::match(['get', 'post'], '/11', function () {
    return view('mapass1');
})->name('home11');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/some-url', function () {
    return app(DestinationController::class)->index();
});
Route::get('/destination', [DestinationController::class, 'destination'])->name('destination.show');
Route::post('/destination/{selected_seat}', [DestinationController::class, 'destinationPost'])->name('destination.post');
Route::match(['get', 'post'], '/selection', [DestinationController::class, 'selectionPost'])->name('selection.post');
Route::match(['get', 'post'], '/selection2', [DestinationController::class, 'selectionPost'])->name('selection.post');
Route::get('/map', [DestinationController::class, 'map'])->name('map');
Route::get('/mapass1', [DestinationController::class, 'map'])->name('map');
Route::get('/mappass2', [DestinationController::class, 'map'])->name('map');
Route::get('/table', [DestinationController::class, 'displayTable'])->name('show-table');
Route::post('/check-rfid', [DestinationController::class, 'checkRFID'])->name('check.rfid');

#get current location
Route::post('/getcurrentlocation', [DestinationController::class, 'getCurrentLocation']);


