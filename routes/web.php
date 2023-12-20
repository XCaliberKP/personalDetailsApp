<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('personal_details.create');
});

// Display form to create a new personal detail entry
Route::get('/personal-details/create', [PersonalDetailController::class, 'create']);

// Store new personal detail
Route::post('/personal-details', [PersonalDetailController::class, 'store']);

// Display all personal details
Route::get('/personal-details', [PersonalDetailController::class, 'index']);

// Display a specific personal detail for viewing or editing
Route::get('/personal-details/{id}', [PersonalDetailController::class, 'show']);

// Display form for editing a specific personal detail
Route::get('/personal-details/{id}/edit', [PersonalDetailController::class, 'edit']);

// Update a specific personal detail
Route::put('/personal-details/{id}', [PersonalDetailController::class, 'update']);

// Delete a specific personal detail
Route::delete('/personal-details/{id}', [PersonalDetailController::class, 'destroy']);
