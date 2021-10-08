<?php

namespace App\Domain\Session\ValueObject;

use App\Domain\Session\Entity\Session;
use IntlDateFormatter;

//QUESTION Здесь этот клас больше походит на сервис SessionScheduleFormatter, но так как сервисы использовать нельзя, пришлось
// объеденить с моделью SessionSchedule
class SessionSchedule
{
    public function __construct(private \DateTime $startTime, private IntlDateFormatter $dateLocaleFormatter)
    {
    }

    public function getScheduleTime(Session $session): string
    {
        $startTime = $this->startTime->format('H:i');

        $movieDuration = $session->getMovie()->getDuration();
        $endTime = $this->startTime->add($movieDuration)->format('H:i');

        return sprintf('%s - %s', $startTime, $endTime);
    }

    public function getDuration(Session $session): string
    {
        return $session->getMovie()->getDuration()->format('%h час %i минут');
    }

    public function getScheduleDate(): string
    {
        return $this->dateLocaleFormatter->format($this->startTime);
    }
}
