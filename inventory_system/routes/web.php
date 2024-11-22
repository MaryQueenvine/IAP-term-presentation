<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyticsController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/two-factor/enable', [TwoFactorController::class, 'enableTwoFactor'])->name('two-factor.enable');
});

Route::get('/two-factor/verify', [TwoFactorVerificationController::class, 'show'])->name('two-factor.verify');
Route::post('/two-factor/verify', [TwoFactorVerificationController::class, 'verify']);

Route::middleware(['auth', 'two-factor'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

use App\Http\Controllers\TwoFactorController;

Route::middleware('auth')->group(function () {
    Route::get('/2fa/setup', [TwoFactorController::class, 'showSetupForm'])->name('2fa.setup');
    Route::post('/2fa/setup', [TwoFactorController::class, 'store']);
});

Route::resource('orders', OrderController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('inventory', InventoryController::class);



Route::get('/analytics', [AnalyticsController::class, 'showAnalytics'])->name('analytics');


require __DIR__.'/auth.php';
