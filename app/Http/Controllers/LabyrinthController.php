<?php

namespace App\Http\Controllers;

use App\Services\LabyrinthServiceInterface;

class LabyrinthController extends Controller
{
    public function __construct(private LabyrinthServiceInterface $labyrinthService)
    {
    }

    public function labyrinths()
    {
        return $this->labyrinthService->labyrinths();
    }

    public function labyrinth($id)
    {
        return $this->labyrinthService->find($id);
    }

    public function generateLabyrinth()
    {
        return $this->labyrinthService->generateLabyrinth();
    }

    public function playField($labyrinthId,$x,$y,$type)
    {
        return $this->labyrinthService->playField($labyrinthId,$x,$y,$type);
    }

    public function start($labyrinthId,$x,$y)
    {
        return $this->labyrinthService->start($labyrinthId,$x,$y);
    }

    public function end($labyrinthId,$x,$y)
    {
        return $this->labyrinthService->end($labyrinthId,$x,$y);
    }

    public function solution($labyrinthId)
    {
        return $this->labyrinthService->solution($labyrinthId);
    }

}
