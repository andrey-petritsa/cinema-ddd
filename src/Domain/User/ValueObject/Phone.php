<?php

namespace App\Domain\User\ValueObject;

class Phone
{
    private string $phone;

    public function __construct(string $phone)
    {
        self::assertThatPhoneNumberIsCorrect($phone);
        $this->phone = $phone;
    }

    private static function assertThatPhoneNumberIsCorrect(string $phone)
    {
        if (!is_numeric($phone)) {
            throw new \InvalidArgumentException('Номер телефона указан не верно');
        }
    }
}
