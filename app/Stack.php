<?php

namespace App;
use Exception;

class Stack
{
    private array $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function push($item): void
    {
        $this->items[] = $item;
    }

    /**
     * @throws Exception
     */
    public function pop(): mixed
    {
        if (!empty($this->items)) {
            return array_pop($this->items);
        }
        throw new Exception("array is empty");
    }

    /**
     * @throws Exception
     */
    public function pick(): mixed
    {
        if (!empty($this->items))
            return end($this->items);

        throw new Exception("array is empty");
    }

    public function size(): int
    {
        return count($this->items);
    }

    public function isEmpty()
    {
        return $this->size() == 0;
    }

}
