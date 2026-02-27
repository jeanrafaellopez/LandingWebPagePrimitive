<?php

use Illuminate\Support\Facades\Route;
use App\Models\Servicio;
use App\Livewire\LandingPage;

Route::livewire('/', LandingPage::class)->name('home');

Route::get('/servicios/{servicio}', function (Servicio $servicio) {
    return view('servicio', compact('servicio'));
})->name('servicio.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
