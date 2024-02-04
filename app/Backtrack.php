<?php

namespace App;

class Backtrack
{

    public array $maze;
    public array $start;
    public array $end;
    public $stack;

    const WALL = 0;
    const WAY = 1;
    const MOVED = 2;

    const  DIRECTION = [[0,1],[1,0],[0,-1],[-1,0]];

    public function __construct($maze,$start,$end)
    {
        $this->maze = $maze;
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
               while (!$this->stack->isEmpty()){
                   dump($this->stack->pop());
               }
               dd("the end");
            }else{
                //todo set start as read
                $this->maze[$this->start[0]][$this->start[1]] = self::MOVED;
                $this->stack->push($this->start);
                $this->start = $neighbor;
                $this->solve();
            }
        }else{
            if($this->stack->isEmpty()){
                // can't solve
                dd("can't solve");
            }else{
                $this->maze[$this->start[0]][$this->start[1]] = self::MOVED;
                $this->start = $this->stack->pop();
                $this->solve();
            }
        }
    }

    public function checkReadyNeighbor()
    {
        $hasReadyNeighbor = false;
        $direction = self::DIRECTION;
        shuffle($direction);
        foreach ($direction as $neighbor){
            $nx = $this->start[0] + $neighbor[0];
            $ny = $this->start[1] + $neighbor[1];
            if(!isset($this->maze[$nx][$ny]))
                continue;

            if ($this->maze[$nx][$ny] === 1){
                $hasReadyNeighbor = true;
                break;
            }
        }

        return [$hasReadyNeighbor , [$nx,$ny]];

    }
}
