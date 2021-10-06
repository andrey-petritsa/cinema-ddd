<?php

namespace App\Domain\Session\Entity;

use App\Collection\BookingTicket\BookedTicketCollection;
use App\Domain\BookedTicket\Entity\BookedTicket;
use App\Domain\Movie\Entity\Movie;
use App\Domain\Session\TransferObject\SessionDto;
use DateTime;

class Session
{
    private int $id;
    private Movie $movie;
    private BookedTicketCollection $bookedTickets;
    private DateTime $startTime;
    private int $countOfSeats;

    public function __construct(SessionDto $movieShowDto)
    {
        $this->id = $movieShowDto->id;
        $this->movie = $movieShowDto->movie;
        $this->startTime = $movieShowDto->startTime;
        $this->bookedTickets = new BookedTicketCollection();

        self::assertThatCountOfSeatsIsCorrect($movieShowDto->countOfSeats);
        $this->countOfSeats = $movieShowDto->countOfSeats;
    }

    private static function assertThatCountOfSeatsIsCorrect(int $countOfSeats)
    {
        if ($countOfSeats <= 0) {
            throw new \InvalidArgumentException('Количество свободных мест сеанса не может быть меньше или равно 0');
        }
    }

    public function isThereFreeSeats(): bool
    {
        if (empty($this->getFreeSeats())) {
            return false;
        }

        return true;
    }

    public function getFreeSeats(): int
    {
        return $this->countOfSeats - count($this->bookedTickets);
    }

    public function addTicket(BookedTicket $ticket)
    {
        if ($this->isThereFreeSeats()) {
            $this->bookedTickets->addBookedTicket($ticket);
        } else {
            throw new \LogicException('Невозможно добавить билет. Сеанс заполнен');
        }
    }

    public function getMovieName(): string
    {
        return $this->movie->getName();
    }
}
