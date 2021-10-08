<?php

namespace App\Domain\Session\TransferObject;

use App\Collection\Ticket\TicketCollection;
use App\Domain\Movie\Entity\Movie;
use App\Domain\Session\ValueObject\Seats;
use App\Domain\Session\ValueObject\SessionSchedule;

class SessionDto
{
    public int $id;
    public SessionSchedule $sessionSchedule;
    public Movie $movie;
    public Seats $seats;
    public TicketCollection $bookedTicketCollection;
}
