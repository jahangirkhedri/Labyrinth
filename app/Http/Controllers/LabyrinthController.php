<?php

namespace App\Http\Controllers;

use App\Backtrack;
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
            'labyrinth' => $this->generate()
        ]);
        return $Labyrinth;
    }

    public function playField($labyrinthId,$x,$y,$type)
    {
        $labyrinth = Labyrinth::findOrFail($labyrinthId);
        $labyrinthTable = $labyrinth->labyrinth;

        $labyrinthTable[$x][$y] = Labyrinth::TYPES[$type];

        $labyrinth->update([
            'labyrinth' => $labyrinthTable
        ]);

        return $labyrinth;


    }

    public function start($labyrinthId,$x,$y)
    {
        $labyrinth = Labyrinth::findOrFail($labyrinthId);

        $labyrinth->update([
            'start_x' => $x,
            'start_y' => $y,
        ]);
        return $labyrinth;

    }

    public function end($labyrinthId,$x,$y)
    {
        $labyrinth = Labyrinth::findOrFail($labyrinthId);

        $labyrinth->update([
            'end_x' => $x,
            'end_y' => $y,
        ]);
        return $labyrinth;

    }

    public function solution($labyrinthId)
    {
        $labyrinth = Labyrinth::findOrFail($labyrinthId);

        $backtrack = new Backtrack($labyrinth->labyrinth,[$labyrinth->start_x,$labyrinth->start_y],[$labyrinth->end_x,$labyrinth->end_y]);

        $res = $backtrack->solve();
        if(count($res))
            return $res;
        else
            return "can't resolve it";

    }

    public function generate()
    {
        return  [
            [1, 1, 1, 1, 1,1,1],
            [1, 1, 1, 1, 1,1,1],
            [1, 1, 1, 1, 1,1,1],
            [1, 1, 1, 1, 1,1,1],
        ];
    }
}
