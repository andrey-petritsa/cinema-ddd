<?php

namespace App\Collection\BookingTicket;

class BookedTicketIterator implements \Iterator
{
    private int $position = 0;

    public function __construct(private BookedTicketCollection $bookedTicketCollection)
    {
    }

    public function current()
    {
        return $this->bookedTicketCollection->getBookedTickets()[$this->position];
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
        return isset($this->bookedTicketCollection->getBookedTickets()[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
