<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CountryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {
});

Route::get('/get-states/{country_id}', [ApiController::class, 'getStates']);
Route::get('/get-cities/{state_id}', [ApiController::class, 'getCities']);
Route::get('/get-currency/{country_id}', [ApiController::class, 'getCurrency']);
Route::get('/get-functional-areas/{industry_id}', [ApiController::class, 'getfuncationalareaByIndustry']);


Route::POST('/get-countries', [ApiController::class, 'getCountries'])->name('api.get_countries');
Route::POST('/get-states', [ApiController::class, 'getStates'])->name('api.get_states');
Route::POST('/get-cities', [ApiController::class, 'getCities'])->name('api.get_cities');
Route::POST('/check-existing-user-email', [ApiController::class, 'checkExistingUserEmail'])->name('api.check_existing_user_email');
Route::POST('/check-existing-user-phone', [ApiController::class, 'checkExistingUserPhone'])->name('api.check_existing_user_phone');