<?php

namespace App\Domain\Session\ValueObject;

use App\Domain\Session\Entity\Session;

class Seats implements \Countable
{
    private int $amountOfSeats;

    public function __construct(int $amountOfSeats)
    {
        self::assertThatAmountOfSeatsCorrect($amountOfSeats);
        $this->amountOfSeats = $amountOfSeats;
    }

    private static function assertThatAmountOfSeatsCorrect(int $amountOfSeats)
    {
        if ($amountOfSeats <= 0) {
            throw new \InvalidArgumentException('Количество мест не может быть 0 или меньше');
        }
    }

    public function count()
    {
        return $this->amountOfSeats;
    }

    public function isThereFreeSeats(): bool
    {
        if (empty($this->amountOfSeats)) {
            return false;
        }

        return true;
    }

    public function getFreeSeats(Session $session): int
    {
        return count($session->getSeats()) - count($session->getBookedTickets());
    }
}
