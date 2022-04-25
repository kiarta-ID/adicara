<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', function (Request $request) {
        return new UserResource(Auth::user());
    });
    Route::get('/user', function (Request $request) {
        return new UserCollection(User::all());
    });
    Route::get('/user/{user}', function (Request $request, User $user) {
        return new UserResource($user);
    });
    Route::get('/event', function (Request $request) {
        return new EventCollection(Event::all());
    });
    Route::get('/event/{event}', function (Request $request, Event $event) {
        return new EventResource($event);
    });
    // Route::get('/documents', function (Request $request) {
    //     return new DocumentCollection(Document::all());
    // });
    // Route::get('/documents/{document}', function (Request $request, Document $document) {
    //     return new DocumentResource($document);
});


// Route::get('/user', function () {
//     return new UserCollection(User::all());
// });

// Route::get('/user/{id}', function ($id) {
//     return new UserResource(User::with('events')->findOrFail($id));
// });

// Route::get('/event', function () {
//     return new EventCollection(Event::with('user')->get());
// });

// Route::get('/event/{id}', function ($id) {
//     return new EventResource(Event::with('user')->findOrFail($id));
// });


// Route::middleware('auth:sanctum')->group(function () {
//     Route::resource('documents', DocumentController::class);
// });

Route::post('/tokens/create', function (Request $request) {

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    if (Auth::attempt($request->only(['email', 'password']))) {
        return response()->json([
            'token' => Auth::user()->createToken('MyApp')->plainTextToken,
        ]);
    } else {
        return response()->json([
            'error' => 'Unauthorized'
        ], 401);
    }
    // $token = $request->user()->createToken($request->token_name);

    // return ['token' => $token->plainTextToken];
});
