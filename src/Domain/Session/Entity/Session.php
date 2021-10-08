<?php

namespace App\Domain\Session\Entity;

use App\Collection\Ticket\TicketCollection;
use App\Domain\Movie\Entity\Movie;
use App\Domain\Session\TransferObject\SessionDto;
use App\Domain\Session\ValueObject\Seats;
use App\Domain\Session\ValueObject\SessionSchedule;
use App\Domain\Ticket\Entity\Ticket;

class Session
{
    private int $id;
    private Movie $movie;
    private TicketCollection $bookedTickets;
    private SessionSchedule $sessionSchedule;
    private Seats $seats;

    public function __construct(SessionDto $sessionDto)
    {
        $this->id = $sessionDto->id;
        $this->movie = $sessionDto->movie;
        $this->sessionSchedule = $sessionDto->sessionSchedule;
        $this->seats = $sessionDto->seats;
        $this->bookedTickets = $sessionDto->bookedTicketCollection;
    }

    public function addTicket(Ticket $ticket)
    {
        if ($this->isThereFreeSeats()) {
            $this->bookedTickets->addBookedTicket($ticket);
        } else {
            throw new \LogicException('Невозможно добавить билет. Сеанс заполнен');
        }
    }

    public function isThereFreeSeats(): bool
    {
        return $this->seats->isThereFreeSeats();
    }

    public function getMovieName(): string
    {
        return $this->movie->getName();
    }

    public function getSessionScheduleTime(): string
    {
        return $this->sessionSchedule->getScheduleTime($this);
    }

    public function getFreeSeats(): int
    {
        return $this->seats->getFreeSeats($this);
    }

    public function getSessionDate(): string
    {
        return $this->sessionSchedule->getScheduleDate();
    }

    public function getMovieDuration(): string
    {
        return $this->sessionSchedule->getDuration($this);
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }

    public function getSeats(): Seats
    {
        return $this->seats;
    }

    public function getBookedTickets()
    {
        return $this->bookedTickets;
    }
}
