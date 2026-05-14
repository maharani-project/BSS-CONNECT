<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LOController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| LANDING & REDIRECT LOGIC
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();

        return match ($user->role) {
            'admin'     => redirect()->route('admin.dashboard'),
            'panitia'   => redirect()->route('lo.dashboard'),
            'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
            default     => view('landing'),
        };
    }

    return view('landing');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';

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

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | JADWAL
        |--------------------------------------------------------------------------
        */
        Route::get('/jadwal', [AdminController::class, 'jadwal'])
            ->name('jadwal');

        Route::get('/jadwal/create', [AdminController::class, 'createJadwal'])
            ->name('jadwal.create');

        Route::post('/jadwal', [AdminController::class, 'storeJadwal'])
            ->name('jadwal.store');

        Route::get('/jadwal/{id}/edit', [AdminController::class, 'editJadwal'])
            ->name('jadwal.edit');

        Route::put('/jadwal/{id}', [AdminController::class, 'updateJadwal'])
            ->name('jadwal.update');

        Route::delete('/jadwal/{id}', [AdminController::class, 'deleteJadwal'])
            ->name('jadwal.delete');

        /*
        |--------------------------------------------------------------------------
        | PENGUMUMAN
        |--------------------------------------------------------------------------
        */
        Route::get('/pengumuman', [AdminController::class, 'pengumuman'])
            ->name('pengumuman');

        Route::get('/pengumuman/create', [AdminController::class, 'createPengumuman'])
            ->name('pengumuman.create');

        Route::post('/pengumuman', [AdminController::class, 'storePengumuman'])
            ->name('pengumuman.store');

        Route::get('/pengumuman/{id}/edit', [AdminController::class, 'editPengumuman'])
            ->name('pengumuman.edit');

        Route::put('/pengumuman/{id}', [AdminController::class, 'updatePengumuman'])
            ->name('pengumuman.update');

        Route::delete('/pengumuman/{id}', [AdminController::class, 'deletePengumuman'])
            ->name('pengumuman.delete');

        /*
        |--------------------------------------------------------------------------
        | USER MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::get('/lo', [AdminController::class, 'lo'])
            ->name('lo');

        Route::get('/mahasiswa', [AdminController::class, 'mahasiswa'])
            ->name('mahasiswa');

        /*
        |--------------------------------------------------------------------------
        | PROFILE
        |--------------------------------------------------------------------------
        */
        Route::get('/profile', [AdminController::class, 'profile'])
            ->name('profile');

        Route::get('/profile/edit', [AdminController::class, 'editProfile'])
            ->name('profile.edit');

        Route::put('/profile', [AdminController::class, 'updateProfile'])
            ->name('profile.update');

        /*
        |--------------------------------------------------------------------------
        | SECURITY
        |--------------------------------------------------------------------------
        */
        Route::get('/profile/security', [AdminController::class, 'security'])
            ->name('security');

        /*
        |--------------------------------------------------------------------------
        | ACTIVITY
        |--------------------------------------------------------------------------
        */
        Route::get('/profile/activity', [AdminController::class, 'activity'])
            ->name('activity');

        /*
        |--------------------------------------------------------------------------
        | SETTINGS
        |--------------------------------------------------------------------------
        */
        Route::get('/profile/settings', [AdminController::class, 'settings'])
            ->name('settings');

    });

    /*
    |--------------------------------------------------------------------------
    | PANITIA / LO ONLY
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:panitia'])
    ->prefix('lo')
    ->name('lo.')
    ->group(function () {

        /*
        | DASHBOARD
        */
        Route::get('/dashboard', [LOController::class, 'dashboard'])
            ->name('dashboard');

        /*
        | PROFILE
        */
        Route::get('/profile', [LOController::class, 'profile'])
            ->name('profile');

        /*
        | PROFILE MENU
        */
        Route::get('/profile/edit', [LOController::class, 'editAccount'])
            ->name('profile.edit');

        Route::get('/profile/security', [LOController::class, 'security'])
            ->name('profile.security');

        Route::get('/profile/settings', [LOController::class, 'settings'])
            ->name('profile.settings');

        Route::get('/profile/activity', [LOController::class, 'activity'])
            ->name('profile.activity');

        /*
        | JADWAL
        */
        Route::get('/jadwal', [LOController::class, 'jadwal'])
            ->name('jadwal.index');

        Route::get('/jadwal/create', [LOController::class, 'createJadwal'])
            ->name('jadwal.create');

        Route::post('/jadwal/store', [LOController::class, 'storeJadwal'])
            ->name('jadwal.store');

        Route::get('/jadwal/{id}/edit', [LOController::class, 'editJadwal'])
            ->name('jadwal.edit');

        Route::put('/jadwal/{id}', [LOController::class, 'updateJadwal'])
            ->name('jadwal.update');

        Route::delete('/jadwal/{id}', [LOController::class, 'destroyJadwal'])
            ->name('jadwal.destroy');

        /*
        | PENGUMUMAN
        */
        Route::get('/pengumuman', [LOController::class, 'pengumuman'])
            ->name('pengumuman.index');

        Route::get('/pengumuman/create', [LOController::class, 'createPengumuman'])
            ->name('pengumuman.create');

        Route::post('/pengumuman', [LOController::class, 'storePengumuman'])
            ->name('pengumuman.store');

        Route::get('/pengumuman/{id}/edit', [LOController::class, 'editPengumuman'])
            ->name('pengumuman.edit');

        Route::put('/pengumuman/{id}', [LOController::class, 'updatePengumuman'])
            ->name('pengumuman.update');

        Route::delete('/pengumuman/{id}', [LOController::class, 'destroyPengumuman'])
            ->name('pengumuman.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | MAHASISWA ONLY
    |--------------------------------------------------------------------------
    */
    Route::middleware(['auth', 'role:mahasiswa'])
        ->prefix('mahasiswa')
        ->name('mahasiswa.')
        ->group(function () {

            /*
            |--------------------------------------------------------------------------
            | DASHBOARD
            |--------------------------------------------------------------------------
            */
            Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])
                ->name('dashboard');

            /*
            |--------------------------------------------------------------------------
            | JADWAL
            |--------------------------------------------------------------------------
            */
            Route::get('/jadwal', [MahasiswaController::class, 'jadwal'])
                ->name('jadwal');

            /*
            |--------------------------------------------------------------------------
            | PENGUMUMAN
            |--------------------------------------------------------------------------
            */
            Route::get('/pengumuman', [MahasiswaController::class, 'pengumuman'])
                ->name('pengumuman');

            /*
            |--------------------------------------------------------------------------
            | REWARD
            |--------------------------------------------------------------------------
            */
            Route::get('/reward', [MahasiswaController::class, 'reward'])
                ->name('reward');

            /*
            |--------------------------------------------------------------------------
            | PROFILE
            |--------------------------------------------------------------------------
            */
            Route::get('/profile', [MahasiswaController::class, 'profile'])
                ->name('profile');

            Route::get('/profile/edit', [MahasiswaController::class, 'editProfile'])
                ->name('profile.edit');

            Route::put('/profile/update', [MahasiswaController::class, 'updateProfile'])
                ->name('profile.update');

            /*
            |--------------------------------------------------------------------------
            | SECURITY
            |--------------------------------------------------------------------------
            */
            Route::get('/profile/security', [MahasiswaController::class, 'security'])
                ->name('security');

            Route::post('/profile/security/update', [MahasiswaController::class, 'updateSecurity'])
                ->name('security.update');

            /*
            |--------------------------------------------------------------------------
            | ACTIVITY
            |--------------------------------------------------------------------------
            */
            Route::get('/profile/activity', [MahasiswaController::class, 'activity'])
                ->name('activity');

            /*
            |--------------------------------------------------------------------------
            | SETTINGS
            |--------------------------------------------------------------------------
            */
            Route::get('/profile/settings', [MahasiswaController::class, 'settings'])
                ->name('settings');
        });

    /*
    |--------------------------------------------------------------------------
    | PROFILE ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', function (Request $request) {

        $user = $request->user();

        return $user->role === 'mahasiswa'
            ? view('mahasiswa.profile.index', [
                'user' => $user,
                'status' => session('status'),
            ])
            : app(ProfileController::class)->edit($request);

    })->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | HOME REDIRECT
    |--------------------------------------------------------------------------
    */
    Route::get('/home', function () {

        $role = Auth::user()->role;

        return redirect()->route(($role === 'panitia' ? 'lo' : $role) . '.dashboard');

    })->name('dashboard');
});