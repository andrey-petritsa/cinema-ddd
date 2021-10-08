<?php

namespace App\Collection\Ticket;

class TicketIterator implements \Iterator
{
    private int $position = 0;

    public function __construct(private TicketCollection $bookedTicketCollection)
    {
    }

    public function current()
    {
        return $this->bookedTicketCollection->getTickets()[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->bookedTicketCollection->getTickets()[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}