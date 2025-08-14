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
            Route::get('create-admin', 'createAdmin')->name('backend.admin.create_admin');
            Route::post('store-admin', 'storeAdmin')->name('backend.admin.store_admin');
            Route::post('all-admins/toggle-status/{encryptedId}', 'toggleAdminStatus')->name('backend.admin.statusUpdate');
            Route::get('edit-admin/{encryptedId}', 'editAdmin')->name('backend.admin.edit_admin');
            Route::put('admin/update/{encryptedId}', 'updateAdmin')->name('backedn.admin.update_admin');
        });

        Route::controller(EmployersController::class)->group(function () {
            Route::get('employers', 'index')->name('backend.employers.index');
            Route::post('/employer/toggle-status/{id}', 'toggleEmployerStatus')
                ->name('employer.toggle-status');
            Route::get('employer/create', 'create')->name('backend.employer.create');
            Route::post('employer/store', 'storeEmployer')->name('backend.employer.store');
            Route::get('employer/edit/{encryptedId}', 'edit')->name('backend.employer.edit');
            Route::put('employer/update/{encryptedId}', 'update')->name('backend.employer.update');
        });

        Route::controller(CondidateController::class)->group(function () {
            Route::get('candidate-list', 'condidateList')->name('backend.condidate_list');
            Route::get('candidate-edit/{id}', 'condidateEdit')->name('backend.condidate_edit');
            Route::get('candidate-create', 'condidateCreate')->name('backend.condidate_create');
            Route::POST('candidate-store', 'condidateStore')->name('backend.condidate_store');
            Route::POST('candidate-update/{id}', 'condidateUpdate')->name('backend.condidate_update');
            Route::delete('candidate-softdelete/{id}', 'softDelete')->name('backend.condidate_softDelete');
        });

        Route::controller(DegreeController::class)->group(function () {
            Route::post('create', 'create')->name('backend.degree_create');
            Route::post('/degrees/{id}/update-status', 'updateStatus')->name('degrees.updateStatus');
        });

        Route::controller(JobController::class)->group(function () {
            Route::get('jobs', 'index')->name('backend.jobs.index');
            Route::get('jobs/create', 'create')->name('backend.jobs.create');
            Route::post('jobs/store', 'store')->name('backend.jobs.store');
            Route::post('jobs/status/update', 'updateStatus')->name('backend.jobs.updateStatus');
            Route::get('jobs/edit/{encryptedId}', 'edit')->name('backend.jobs.edit');
            Route::put('jobs/update/{encryptedId}', 'update')->name('backend.jobs.update');
        });

        Route::controller(CountryController::class)->group(function () {
            Route::get('countries', 'index')->name('backend.countries.index');
        });

        Route::controller(GeneralController::class)->group(function () {
            Route::get('general', 'index')->name('backend.general.index');
            Route::post('general/storeIndustry', 'storeIndustries')->name('backend.general.industryStore');
            Route::put('industries/{encryptedId}', 'updateIndustries')->name('backend.general.industryUpdate');
            Route::delete('/industries/{encryptedId}', 'destroyIndustry')->name('backend.general.industryDestroy');

            //Funcational Area
            Route::post('general', 'storeFunctionalArea')->name('backend.general.functionalareaStore');
            Route::put('/functionalarea/{encryptedId}', 'updateFunctionalArea')->name('backend.general.functionalareaUpdate');
            Route::delete('/functionalarea/{encryptedId}', 'destroyFunctionalArea')->name('backend.general.functionalAreaDestroy');
        });
    });
});
