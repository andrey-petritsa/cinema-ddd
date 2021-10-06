<?php

namespace App\Domain\Movie\Entity;

use App\Domain\Movie\ValueObject\Name;

class Movie
{
    const MAX_NAME_SYMBOLS = 100;

    public function __construct(private int $id, private Name $name, private \DateTime $duration)
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return \DateTime
     */
    public function getDurationInHours(): \DateTime
    {
        return $this->duration;
    }



}
