<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Set Namespace here
$namespace = 'App\Http\Controllers\Api';

Route::namespace($namespace)->group(function () {
    Route::apiResource('form-submissions', 'FormSubmissionController');
});
