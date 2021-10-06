<?php

namespace App\Collection\BookingTicket;

use App\Domain\BookedTicket\Entity\BookedTicket;

class BookedTicketCollection implements \IteratorAggregate, \Countable
{
    private array $tickets = [];

    public function getIterator(): BookedTicketIterator
    {
        return new BookedTicketIterator($this);
    }

    public function getBookedTickets(): array
    {
        return $this->tickets;
    }

    public function addBookedTicket(BookedTicket $bookedTicket)
    {
        $this->tickets[] = $bookedTicket;
    }

    public function count()
    {
        return count($this->tickets);
    }
}
