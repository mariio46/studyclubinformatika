<?php

use App\Http\Controllers\HasRole\OperatorListController;
use App\Http\Controllers\HasRole\PromoteController;
use App\Http\Controllers\HasRole\RegistrantBiodataExportController;
use App\Http\Controllers\HasRole\RegistrantListController;
use App\Http\Controllers\HasRole\RegistrantsTableExportController;
use App\Http\Controllers\HasRole\RegistrationStatusController;
use App\Http\Controllers\HasRole\ScheduleController;
use App\Http\Controllers\HasRole\VerifyController;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:operator|admin'])->group(function () {
    Route::controller(RegistrationStatusController::class)->group(function () {
        Route::put('status/open', 'open')->name('status.open');
        Route::put('status/close', 'close')->name('status.close');
    });

    Route::controller(VerifyController::class)->group(function () {
        Route::put('verify/{user}', 'verify')->name('registrant.verify');
        Route::put('unverify/{user}', 'unverify')->name('registrant.unverify');
    });

    Route::controller(RegistrantListController::class)->group(function () {
        Route::get('registrant', 'index')->name('registrant.index');
        Route::get('registrant/{user}', 'show')->name('registrant.show');
        Route::delete('registrant/{user}', 'delete')->name('registrant.delete');

        Route::delete('registrants/unverified/delete', 'deleteUnverified')->name('registrant.unverified.delete');
        Route::delete('registrants/all/delete', 'deleteAll')->name('registrant.all.delete');
    });

    Route::controller(RegistrantBiodataExportController::class)->group(function () {
        Route::get('registrant/pdf/{identifier}', 'preview')->name('registrant.pdf.preview');
        Route::get('registrant/pdf/{identifier}/{code}/manual', 'manual')->name('registrant.pdf.manual');
        Route::get('registrant/pdf/{identifier}/{code}/auto', 'auto')->name('registrant.pdf.auto');
    });

    Route::controller(RegistrantsTableExportController::class)->group(function () {
        Route::get('registrant/table/pdf/preview', 'preview')->name('registrant.table.pdf.preview');
        Route::get('registrant/table/pdf/manual', 'tableManual')->name('registrant.table.pdf.manual');
        Route::get('registrant/table/pdf/auto', 'tableAuto')->name('registrant.table.pdf.auto');
    });

    Route::controller(ScheduleController::class)->group(function () {
        Route::get('schedule', 'index')->name('schedule.index');
        Route::post('schedule', 'store')->name('schedule.store');
        Route::get('schedule/{schedule}', 'edit')->name('schedule.edit');
        Route::put('schedule/{schedule}', 'update')->name('schedule.update');

        Route::put('schdule/activate/{schedule}', 'activate')->name('schedule.activate');
        Route::put('schdule/deactivate/{schedule}', 'deactivate')->name('schedule.deactivate');

        route::delete('schedule/{schedule}', 'delete')->name('schedule.delete');
    });
});

Route::middleware(['role:admin'])->group(function () {
    Route::put('promote/{user}', PromoteController::class)->name('registrant.promote');

    Route::controller(OperatorListController::class)->group(function () {
        Route::get('operator', 'index')->name('operator.index');
        Route::get('operator/{user}', 'show')->name('operator.show');
        Route::get('operator/create', 'create')->name('operator.create');
        Route::post('operator/create', 'store')->name('operator.store');
        Route::put('operator/forget-password', 'operatorForgetPassword')->name('operator.forget.password');
    });
});
