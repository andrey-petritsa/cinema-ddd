<?php

namespace App\Domain\Booking\Ticket\Entity;

use App\Domain\Booking\ClientDetails\ValueObject\ClientDetails;
use Ramsey\Uuid\UuidInterface;

class Ticket
{
    public function __construct(private UuidInterface $id, private ClientDetails $clientDetails)
    {
    }
}
