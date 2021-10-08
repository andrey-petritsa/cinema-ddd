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

    public function getTickets(): array
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket)
    {
        $this->tickets[] = $ticket;
    }

    public function count()
    {
        return count($this->tickets);
    }
}
