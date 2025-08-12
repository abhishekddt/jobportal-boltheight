<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\EmployersController;
use App\Http\Controllers\Backend\GeneralController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Frontend\CondidateController;
use App\Http\Controllers\Backend\DegreeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('admin', [AdminController::class, 'create'])->name('backend.login');
    Route::post('admin', [AdminController::class, 'loginStore'])->name('backend.login_store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('dashboard', 'adminDashboard')->name('backend.dashboard');
            Route::get('all-admins', 'adminList')->name('backend.admin.all_admins');
            Route::get('edit-admin', 'editAdmin')->name('backend.admin.edit_admin');
            Route::get('create-admin', 'createAdmin')->name('backend.admin.create_admin');
        });

        Route::controller(EmployersController::class)->group(function () {
            Route::get('employers', 'index')->name('backend.employers.index');
            Route::get('employer/create', 'create')->name('backend.employer.create');
            Route::get('employer/edit', 'edit')->name('backend.employer.edit');
        });

        Route::controller(CondidateController::class)->group(function () {
            Route::get('condidate-list', 'condidateList')->name('backend.condidate_list');
            Route::get('condidate-edit/{id}', 'condidateEdit')->name('backend.condidate_edit');
            Route::get('condidate-create', 'condidateCreate')->name('backend.condidate_create');
            Route::POST('condidate-store', 'condidateStore')->name('backend.condidate_store');
            Route::POST('condidate-update/{id}', 'condidateUpdate')->name('backend.condidate_update');
            Route::delete('condidate-softdelete/{id}', 'softDelete')->name('backend.condidate_softDelete');
        });

        Route::controller(DegreeController::class)->group(function () {
            Route::post('create', 'create')->name('backend.degree_create');
            Route::post('/degrees/{id}/update-status', 'updateStatus')->name('degrees.updateStatus');
        });

        Route::controller(JobController::class)->group(function () {
            Route::get('jobs', 'index')->name('backend.jobs.index');
            Route::get('jobs/create', 'create')->name('backend.jobs.create');
            Route::get('jobs/edit', 'edit')->name('backend.jobs.edit');
        });

        Route::controller(CountryController::class)->group(function () {
            Route::get('countries', 'index')->name('backend.countries.index');
        });

        Route::controller(GeneralController::class)->group(function () {
            Route::get('general', 'index')->name('backend.general.index');
        });
    });
});
