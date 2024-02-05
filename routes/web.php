<?php

use App\LabyrinthSolver;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Example usage
//    $labyrinth = [
//        [1, 1, 1, 1, 1,1,1],
//        [1, 1, 1, 1, 1,1,1],
//        [1, 1, 1, 1, 1,1,1],
//        [1, 1, 1, 1, 1,1,1],
//    ];

    $labyrinth = [
        [0, 1, 1, 0, 1,1,1],
        [1, 0, 1, 1, 0,1,1],
        [1, 1, 1, 1, 1,0,1],
        [1, 0, 1, 0, 1,1,1],
    ];

    $start = [1, 0];
    $exit = [0, 4];

    $solver = new \App\Backtrack($labyrinth,$start,$exit);
    return $solver->solve();

});

