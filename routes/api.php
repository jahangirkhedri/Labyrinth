<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LabyrinthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('login',[AuthController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('logout',[AuthController::class,'logout']);


    Route::get('labyrinth',[LabyrinthController::class,'labyrinths']);
    Route::post('labyrinth',[LabyrinthController::class,'generateLabyrinth']);
    Route::get('labyrinth/{id}',[LabyrinthController::class,'labyrinth']);
    Route::get('labyrinth/{id}/playfield/{x}/{y}/{type}',[LabyrinthController::class,'playField']);
    Route::get('labyrinth/{id}/start/{x}/{y}/',[LabyrinthController::class,'start']);
    Route::get('labyrinth/{id}/end/{x}/{y}/',[LabyrinthController::class,'end']);
    Route::get('labyrinth/{id}/solution',[LabyrinthController::class,'solution']);
});
