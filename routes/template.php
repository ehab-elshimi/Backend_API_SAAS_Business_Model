<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Template\TemplateController;

/*
|--------------------------------------------------------------------------
| Template API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Template API routes for your Template. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api of template contract" middleware group. Enjoy Access your Template API!
|
*/
Route::controller(TemplateController::class)->prefix('/')->group(function () {
    Route::get('personal-data/{user_id}', 'personalData');
    Route::get('skills/{user_id}', 'skills');
    Route::get('technologies/{user_id}', 'technologies');
    Route::get('features/{user_id}', 'features');
    Route::get('services/{user_id}', 'services');
    Route::get('projects/{user_id}', 'projects');
    Route::get('experience/{user_id}', 'experience');
    Route::get('website-settings/{user_id}', 'websiteSettings');
    Route::get('user-settings/{user_id}', 'userSettings');
});


