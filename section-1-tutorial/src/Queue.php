<?php

class Queue {
    protected $items = [];

    public const MAX_ITEMS = 5;

    public function push($item)
    {
        if ($this->getCount() + 1 > 5) {
            throw new QueueException('Max number of items exceeded');
        }
        $this->items[] = $item;
    }

    public function pop()
    {
        return array_shift($this->items);
    }

    public function getCount()
    {
        return count($this->items);
    }

    public function clear()
    {
        $this->items = [];
    }
}

?>