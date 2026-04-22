<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/
Route::get('/', function () {

    if (auth()->check()) {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'panitia') {
            return redirect()->route('lo.dashboard');
        }

        if ($user->role === 'mahasiswa') {
            return redirect()->route('mahasiswa.dashboard');
        }

        // fallback kalau role tidak dikenali
        return redirect()->route('login');
    }

    return view('landing');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/jadwal', function () {
            return view('admin.jadwal');
        })->name('jadwal.index');

        Route::get('/pengumuman', function () {
            return view('admin.pengumuman');
        })->name('pengumuman.index');

        Route::get('/mahasiswa', [UserController::class, 'index'])
    ->name('mahasiswa.index');

        Route::get('/lo', function () {
            return view('admin.lo');
        })->name('lo.index');
    });

    /*
    |--------------------------------------------------------------------------
    | PANITIA ONLY
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:panitia'])
        ->prefix('lo')
        ->name('lo.')
        ->group(function () {

        Route::get('/dashboard', function () {
            return view('lo.dashboard');
        })->name('dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | MAHASISWA ONLY
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:mahasiswa'])
        ->prefix('mahasiswa')
        ->name('mahasiswa.')
        ->group(function () {

        Route::get('/dashboard', function () {
            return view('mahasiswa.dashboard');
        })->name('dashboard');

        Route::get('/jadwal', function () {
            return view('mahasiswa.jadwal');
        })->name('jadwal');

        Route::get('/pengumuman', function () {
            return view('mahasiswa.pengumuman');
        })->name('pengumuman');

        Route::get('/lo', function () {
            return view('mahasiswa.lo');
        })->name('lo');

        Route::get('/list', [UserController::class, 'index'])->name('list');
    });

    /*
    |--------------------------------------------------------------------------
    | PROFILE (SEMUA ROLE)
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);

});