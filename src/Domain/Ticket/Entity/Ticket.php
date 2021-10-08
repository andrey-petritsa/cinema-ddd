<?php

namespace App\Domain\Ticket\Entity;

use App\Domain\User\Entity\User;

class Ticket
{
    public function __construct(private int $id, private User $user)
    {
    }
}
