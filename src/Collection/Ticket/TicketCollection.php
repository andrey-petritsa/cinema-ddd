<?php

namespace App\Collection\Ticket;

use App\Domain\Ticket\Entity\Ticket;

class TicketCollection implements \IteratorAggregate, \Countable
{
    private array $tickets = [];

    public function getIterator(): TicketIterator
    {
        return new TicketIterator($this);
    }

    public function getBookedTickets(): array
    {
        return $this->tickets;
    }

    public function addBookedTicket(Ticket $bookedTicket)
    {
        $this->tickets[] = $bookedTicket;
    }

    public function count()
    {
        return count($this->tickets);
    }
}
