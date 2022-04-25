<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserResource;
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
        return new UserResource(Auth::user()->with('events')->findOrFail(Auth::user()->id));
    });

    Route::resource('user', UserController::class);

    Route::resource('event', EventController    ::class);
    
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
