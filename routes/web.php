<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\BiodataPdfExportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrantHelperController;
use App\Http\Controllers\RegistrantProgressStatusController;
use App\Http\Controllers\TutorialController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::get('security', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('security', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('security', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(BiodataController::class)->group(function () {
        Route::get('biodata', 'index')->name('biodata.index');
        Route::post('biodata', 'store')->name('biodata.store');
        Route::put('biodata', 'biodataUpdate')->name('biodata.update');
        Route::put('biodata/profile', 'profileUpdate')->name('biodata.profile.update');
        Route::put('biodata/picture', 'pictureUpdate')->name('biodata.picture.update');
    });

    Route::controller(BiodataPdfExportController::class)->group(function () {
        Route::get('biodata/{identifier}', 'preview')->name('biodata.export.preview');
        Route::get('biodata/{identifier}/{code}/manual', 'manual')->name('biodata.export.manual');
        Route::get('biodata/{identifier}/{code}/auto', 'auto')->name('biodata.export.auto');
    });

    Route::get('status', RegistrantProgressStatusController::class)->name('status.index');

    Route::get('tutorial', TutorialController::class)->name('tutorial.index');

    Route::get('help', RegistrantHelperController::class)->name('help.index');
});

require __DIR__.'/auth.php';
