<?php

namespace App\Domain\Booking\Ticket\TransferObject;

class TicketInformation
{
    public function __construct(public string $name, public string $phone)
    {
    }
}
