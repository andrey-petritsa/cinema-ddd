<?php

namespace App\Domain\BookedTicket\Entity;

use App\Domain\User\Entity\User;

class BookedTicket
{
    public function __construct(private int $id, private User $user)
    {
    }
}
