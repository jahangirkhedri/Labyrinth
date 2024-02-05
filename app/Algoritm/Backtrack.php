<?php

namespace App\Algoritm;

class Backtrack
{

    public array $board;
    public array $start;
    public array $end;
    public $stack;

    const WALL = 0;
    const WAY = 1;
    const MOVED = 2;

    const  DIRECTION = [[0,1],[1,0],[0,-1],[-1,0]];

    const PATH_TYPE = [
        "vertical" => [
            1 => "down",
            -1 => "up"
        ],
        "horizontal" => [
            1 => "right",
            -1 => "left"
        ]
    ];

    public function __construct($board,$start,$end)
    {
        $this->board = $board;
        $this->start = $start;
        $this->end = $end;
        $this->stack = new Stack();
    }

    public function solve()
    {
        [$hasReadyNeighbor,$neighbor] = $this->checkReadyNeighbor();
        if($hasReadyNeighbor){
            // check is end
            if($neighbor[0] == $this->end[0] && $neighbor[1] == $this->end[1]){
                $this->stack->push($this->start);
                $this->stack->push($neighbor);

               return $this->getPath();

            }else{
                $this->board[$this->start[0]][$this->start[1]] = self::MOVED;
                $this->stack->push($this->start);
                $this->start = $neighbor;
               return $this->solve();
            }
        }else{
            if($this->stack->isEmpty()){
               return [];
            }else{
                $this->board[$this->start[0]][$this->start[1]] = self::MOVED;
                $this->start = $this->stack->pop();
              return  $this->solve();
            }
        }
    }


    public function getPath()
    {
        $path = [];
        if($this->stack->isEmpty())
            return [];

        $reverseStack = new Stack();
        while (!$this->stack->isEmpty()){
            $reverseStack->push($this->stack->pop());
        }
        $start = $reverseStack->pop();

        $last = $start;

        while (!$reverseStack->isEmpty()){
            $pick = $reverseStack->pop();
            $diff = $pick[0] - $last[0];
            if($diff !== 0){
                $path[]= self::PATH_TYPE["vertical"][$diff];
            }else{
                $diff = $pick[1] - $last[1];
                $path[]= self::PATH_TYPE["horizontal"][$diff];
            }
            $last = $pick;
        }
        return $path;
    }

    public function checkReadyNeighbor()
    {
        $hasReadyNeighbor = false;
        $direction = self::DIRECTION;
        shuffle($direction);
        foreach ($direction as $neighbor){
            $nx = $this->start[0] + $neighbor[0];
            $ny = $this->start[1] + $neighbor[1];
            if(!isset($this->board[$nx][$ny]))
                continue;

            if ($this->board[$nx][$ny] === 1){
                $hasReadyNeighbor = true;
                break;
            }
        }

        return [$hasReadyNeighbor , [$nx,$ny]];

    }
}
