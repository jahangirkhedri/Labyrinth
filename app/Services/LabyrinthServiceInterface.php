<?php

namespace App\Services;

interface LabyrinthServiceInterface
{

    public function labyrinths();

    public function find($id);

    public function generateLabyrinth();

    public function playField($labyrinthId,$x,$y,$type);

    public function start($labyrinthId,$x,$y);

    public function end($labyrinthId,$x,$y);

    public function solution($labyrinthId);

    public function generate();

}
