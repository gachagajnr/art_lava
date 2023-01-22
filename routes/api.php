<?php

use App\Http\Controllers\ArtController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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


Route::post('/register',[AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('arts', [ArtController::class,'index']);
Route::get('arts/{art}', [ArtController::class,'show']);
Route::post('arts',[ArtController::class,'store']);
Route::put('arts/{art}',[ArtController::class,'update']);
Route::delete('arts/{art}', [ArtController::class,'delete']);