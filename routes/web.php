<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Checkout;
use App\Livewire\Login;
use App\Livewire\Result;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('checkout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', Login::class)
    ->middleware(['guest'])
    ->name('login');

Route::get('login/{email}', [AuthenticatedSessionController::class, 'login'])
    ->middleware(['signed'])
    ->name('login.store');

Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/pedido-criado/{order_id}', Result::class)
    ->middleware(['signed'])
    ->name('checkout.result');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';
