<?php

namespace App\Domain\Movie\ValueObject;

class Name implements \Stringable
{
    private const MAX_MOVIE_NAME_LENGTH = 100;

    private string $name;

    public function __construct(string $name)
    {
        self::assertThatNameNotTooLong($name);
        self::assertThatNameNotEmpty($name);

        $this->name = $name;
    }

    private static function assertThatNameNotTooLong(string $name)
    {
        if (strlen($name) >= self::MAX_MOVIE_NAME_LENGTH) {
            throw new \InvalidArgumentException('Имя пользователя слишком большое');
        }
    }

    private static function assertThatNameNotEmpty(string $name)
    {
        if (empty($name)) {
            throw new \InvalidArgumentException('Имя пользователя слишком короткое');
        }
    }

    public function __toString()
    {
        return $this->name;
    }
}
