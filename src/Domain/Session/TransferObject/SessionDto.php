<?php

namespace App\Domain\Session\TransferObject;

use App\Collection\BookingTicket\BookedTicketCollection;
use App\Domain\Movie\Entity\Movie;

class SessionDto
{
    public int $id;
    public \DateTime $startTime;
    public Movie $movie;
    public int $countOfSeats;
}
