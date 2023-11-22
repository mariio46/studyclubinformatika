<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\BiodataExportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\TutorialController;
use Illuminate\Support\Facades\Route;

// auth()->loginUsingId(1);

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::get('security', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('security', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('security', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(BiodataController::class)->group(function () {
        Route::get('biodata', 'index')->name('biodata.index');
        Route::put('biodata', 'biodataUpdate')->name('biodata.update');
        Route::put('biodata/profile', 'profileUpdate')->name('biodata.profile.update');
        Route::put('biodata/picture', 'pictureUpdate')->name('biodata.picture.update');
    });

    Route::controller(BiodataExportController::class)->group(function () {
        Route::get('biodata/{identifier}', 'preview')->name('biodata.export.preview');
        Route::get('biodata/{identifier}/{code}/manual', 'manual')->name('biodata.export.manual');
        Route::get('biodata/{identifier}/{code}/auto', 'auto')->name('biodata.export.auto');
    });

    Route::get('timeline', TimelineController::class)->name('timeline');

    Route::get('tutorial', TutorialController::class)->name('tutorial');

    Route::get('help', HelperController::class)->name('help');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/hasrole.php';
