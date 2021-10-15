<?php

require_once '../vendor/autoload.php';

use App\Domain\Booking\Entity\Movie;
use App\Domain\Booking\Entity\Session\Session;
use App\Domain\Booking\TransferObject\TicketInformation;
use Ramsey\Uuid\Nonstandard\Uuid;

const CLIENT_NAME = 'Паша';
const CLIENT_PHONE = '735736';
const NUMBER_OF_SEATS = 20;

const MOVIE_NAME = 'Девчата';
const MOVIE_HOUR_START = 13;
const MOVIE_MINUTE_START = 34;

$dateLocaleFormatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::LONG,
    IntlDateFormatter::NONE, 'Europe/Moscow');

$sessionStartAt = (new DateTime('2021-02-02'))->setTime(MOVIE_HOUR_START, MOVIE_MINUTE_START);
$movie = new Movie(Uuid::uuid4(), MOVIE_NAME, new DateInterval("PT1H25M"));
$session = new Session(Uuid::uuid4(), $movie, NUMBER_OF_SEATS, $sessionStartAt);

$session->bookTicket(new TicketInformation(CLIENT_NAME, CLIENT_PHONE));
$session->bookTicket(new TicketInformation(CLIENT_NAME, CLIENT_PHONE));

echo 'Свободных мест в кинозале ' . $session->getNumberOfFreeSeats();
echo PHP_EOL;
echo 'Название фильма ' . $session->getMovieName();
echo PHP_EOL;
echo 'Начало сеанса ' . $session->getStartAt()->format('m-d-y H:i');
echo PHP_EOL;
echo 'Окончание сеанса ' . $session->getEndAt()->format('m-d-y H:i');
echo PHP_EOL;
echo 'Продолжительность ' . $session->getMovieDuration()->format("%h час %i минут");
