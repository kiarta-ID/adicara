<?php

use App\Http\Controllers\DocumentController;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user', function () {
    return new UserCollection(User::all());
});

Route::get('/user/{id}', function ($id) {
    return new UserResource(User::with('events')->findOrFail($id));
});

Route::get('/event', function () {
    return new EventCollection(Event::with('user')->get());
});

Route::get('/event/{id}', function ($id) {
    return new EventResource(Event::with('user')->findOrFail($id));
});

// Route::middleware('auth:sanctum')->group(function () {
//     Route::resource('documents', DocumentController::class);
// });

