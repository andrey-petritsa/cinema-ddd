<?php

namespace App\Domain\Booking\Movie\Entity;

use Ramsey\Uuid\UuidInterface;

class Movie
{
    private string $name;

    public function __construct(private UuidInterface $id, string $name, private \DateInterval $duration)
    {
        self::assertThatNameNotEmpty($name);

        $this->name = $name;
    }

    public static function assertThatNameNotEmpty(string $name)
    {
        if (empty($name)) {
            throw new \InvalidArgumentException('Имя пользователя слишком короткое');
        }
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDuration(): \DateInterval
    {
        return $this->duration;
    }
}
