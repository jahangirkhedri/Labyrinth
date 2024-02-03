<?php

namespace App\Http\Controllers;

use App\Models\Labyrinth;
use Illuminate\Support\Facades\Auth;

class LabyrinthController extends Controller
{

    public function labyrinths()
    {
        return Auth::user()->labyrinth;
    }

    public function labyrinth($id)
    {
        return Labyrinth::findOrFail($id);
    }

    public function generateLabyrinth()
    {
        $Labyrinth = Labyrinth::create([
            'user_id' => Auth::id(),
            'Labyrinth' => []
        ]);
    }

    public function playfield($labyrinthId,$x,$y,$type)
    {
        $labyrinth = Labyrinth::findOrFail($labyrinthId);
        $labyrinthTable = $labyrinth->labyrinth;

        $labyrinthTable[$x][$y] = $type;

        $labyrinth->update([
            'labyrinth' => $labyrinthTable
        ]);

    }

    public function start($labyrinthId,$x,$y)
    {
        $labyrinth = Labyrinth::findOrFail($labyrinthId);

        $labyrinth->update([
            'start_x' => $x,
            'start_y' => $y,
        ]);

    }

    public function end($labyrinthId,$x,$y)
    {
        $labyrinth = Labyrinth::findOrFail($labyrinthId);

        $labyrinth->update([
            'end_x' => $x,
            'end_y' => $y,
        ]);

    }

    public function solution($labyrinthId)
    {
        $labyrinth = Labyrinth::findOrFail($labyrinthId);

        //do solution

    }
}
