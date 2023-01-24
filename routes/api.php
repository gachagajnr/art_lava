<?php

use App\Http\Controllers\ArtController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['auth:sanctum'])->group(function () {
    // Route::get('me', [AuthController::class, 'me']);
    // Route::get('arts/search/{name}', [ArtController::class,'search']);
    // Route::get('arts', [ArtController::class,'index'])->middleware(['auth:sanctum']);
    // Route::get('arts/{art}', [ArtController::class,'show']);


// });

//public routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('arts', [ArtController::class,'index']);
Route::get('arts/{art}', [ArtController::class,'show']);


//private routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::delete('arts/delete/{art}', [ArtController::class,'delete']);
    Route::get('arts/search/{name}', [ArtController::class,'search']);
    Route::post('arts',[ArtController::class,'store']);
    Route::put('arts/{art}',[ArtController::class,'update']);
    Route::post('/logout',[AuthController::class,'logout']);



});

