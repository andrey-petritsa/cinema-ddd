<?php

namespace App\Domain\Movie\Entity;

use App\Domain\Movie\ValueObject\Name;

class Movie
{
    public function __construct(private int $id, private Name $name, private \DateInterval $duration)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getDuration(): \DateInterval
    {
        return $this->duration;
    }
}
