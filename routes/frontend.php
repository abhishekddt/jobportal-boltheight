<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Frontend\CondidateController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get-states/{country_id}', [CondidateController::class, 'getStates'])->name('get.states');
Route::get('/get-cities/{state_id}', [CondidateController::class, 'getCities'])->name('get.cities');


Route::middleware('guest')->group(function () {
    Route::get('login', [CondidateController::class, 'login'])->name('frontend.login');
    Route::post('login', [CondidateController::class, 'loginStore'])->name('frontend.login_store');
    Route::post('register', [CondidateController::class, 'registerCondidate'])->name('frontend.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('frontend.home');
    Route::get('/profile', [HomeController::class, 'userprofile'])->name('frontend.user-profile');
    Route::get('/jobs', [HomeController::class, 'jobsDashboard'])->name('jobs');
    Route::get('/apply-jobs', [HomeController::class, 'applyJobs'])->name('frontend.apply-jobs');

    // Aviation Routes
    Route::get('/aviation', [HomeController::class, 'aviation'])->name('frontend.aviation');
    Route::post('/pilot', [HomeController::class, 'addPilotDetail'])->name('frontend.add-pilot');
    Route::post('/skill', [HomeController::class, 'addSkillDetail'])->name('frontend.add-skill');
    Route::post('/add-cabin-crew-detail', [HomeController::class, 'addCabinCrewDetail'])->name('frontend.add-cabin-crew');
    Route::post('/add-engineer-detail', [HomeController::class, 'addEngineerDetail'])->name('frontend.addEngineer');
    Route::post('/add-dispatcher-detail', [HomeController::class, 'addDispatcherDetail'])->name('frontend.add-dispatcher');








    Route::post('/update-profile-details', [HomeController::class, 'updateProfileDetails'])->name('frontend.update-profile-details');
    Route::post('/update-skills', [HomeController::class, 'updateSkill'])->name('frontend.update-skills');


    // Route::post('/update-employment', [HomeController::class, 'updateEmployement'])->name('frontend.add-employment');
    // Routes for Education
    Route::post('/add-employment-details', [HomeController::class, 'addEmploymentDetails'])->name('frontend.add-employment-details');

    Route::post('/update-employment-details/{id}', [HomeController::class, 'updateEmploymentDetails']);
    Route::delete('/delete-employment/{id}', [HomeController::class, 'deleteEmploymentDetails'])->name('employment.delete');




    Route::post('/update-it-skills', [HomeController::class, 'updateitSkills'])->name('frontend.add-itskill');
    Route::post('/add-profile-summary', [HomeController::class, 'updateprofileSummary'])->name('frontend.add-profile-summary');
    Route::post('/update-profile-summary-details', [HomeController::class, 'updateuserprofileDetails'])->name('frontend.update-user-profile-details');

    // Routes for Education
    Route::post('/add-education-details', [HomeController::class, 'addEducationDetails'])->name('frontend.add-education-details');
    Route::post('/update-education-details/{id}', [HomeController::class, 'updateEducationDetails']);
    Route::delete('/delete-education/{id}', [HomeController::class, 'deleteEducationDetails'])->name('education.delete');

    // Routes for ITSkills
    Route::post('/add-it-skills', [HomeController::class, 'addItSkills'])->name('frontend.add-it-skills');
    Route::post('/update-itskill-details/{id}', [HomeController::class, 'updateItSkills']);
    Route::delete('/delete-itskill/{id}', [HomeController::class, 'deleteItSkills'])->name('skill.delete');

    // Route for Personal Details
    Route::post('/add-personal-details', [HomeController::class, 'addPersonalDetails'])->name('frontend.add-personal-details');
    Route::post('/update-personal-details', [HomeController::class, 'addPersonalDetails'])->name('frontend.update-personal-details');

    Route::post('/upload-resume', [HomeController::class, 'storeresume'])->name('resume.upload');
    Route::post('/upload-profile-image', [HomeController::class, 'storeProfileImage'])->name('profile.image.upload');
});