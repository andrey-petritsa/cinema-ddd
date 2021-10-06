<?php

namespace App\Domain\User\ValueObject;

class Name
{
    private const MAX_NAME_SYMBOLS = 100;

    private string $name;

    public function __construct(string $name)
    {
        self::assertThatNameNotTooLong($name);
        self::assertThatNameNotEmpty($name);

        $this->name = $name;
    }

    private static function assertThatNameNotTooLong(string $name)
    {
        if (strlen($name) >= self::MAX_NAME_SYMBOLS) {
            throw new \InvalidArgumentException('Имя пользователя слишком большое');
        }
    }

    private static function assertThatNameNotEmpty(string $name)
    {
        if (empty($name)) {
            throw new \InvalidArgumentException('Имя пользователя не может быть пустым');
        }
    }
}
