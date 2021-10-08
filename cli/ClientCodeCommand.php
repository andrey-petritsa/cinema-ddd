<?php
require_once '../vendor/autoload.php';

use App\Collection\Ticket\TicketCollection;
use App\Domain\Movie\{Entity\Movie, ValueObject\Name as MovieName};
use App\Domain\Session\{Entity\Session, TransferObject\SessionDto, ValueObject\Seats, ValueObject\SessionSchedule};
use App\Domain\Ticket\Entity\Ticket;
use App\Domain\User\{Entity\User, ValueObject\Name as UserName, ValueObject\Phone as UserPhone};

const COUNT_OF_SEATS = 20;
const MOVIE_HOUR_START = 13;
const MOVIE_MINUTE_START = 34;
$dateFormatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::LONG,
    IntlDateFormatter::NONE, 'Europe/Moscow');

$sessionStartTime = (new DateTime('2021-02-02 '))->setTime(MOVIE_HOUR_START, MOVIE_MINUTE_START);
$sessionSchedule = new SessionSchedule($sessionStartTime, $dateFormatter);

$seats = new Seats(COUNT_OF_SEATS);

$movie = new Movie(1, new MovieName('Девчата'), new DateInterval("PT1H25M"));

$sessionDto = new SessionDto();
$sessionDto->id = 1;
$sessionDto->movie = $movie;
$sessionDto->sessionSchedule = $sessionSchedule;
$sessionDto->seats = $seats;
$sessionDto->bookedTicketCollection = new TicketCollection();
$session = new Session($sessionDto);

$user = new User(new UserName('Паша'), new UserPhone('735735'));
$ticketCollection = new TicketCollection();
$ticketCollection->addTicket(new Ticket(1, $user));
$ticketCollection->addTicket(new Ticket(2, $user));
$ticketCollection->addTicket(new Ticket(3, $user));

foreach ($ticketCollection->getIterator() as $ticket) {
    $session->addTicket($ticket);
}

echo 'Свободных мест в кинозале ' . $session->getFreeSeats();
echo PHP_EOL;
echo 'Название фильма ' . $session->getMovieName();
echo PHP_EOL;
echo 'Расписание сеанса ' . $session->getSessionScheduleTime();
echo PHP_EOL;
echo 'Дата ' . $session->getSessionDate();
echo PHP_EOL;
echo 'Продолжительность ' . $session->getMovieDuration();
