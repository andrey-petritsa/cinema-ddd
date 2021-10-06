<?php

namespace App\Domain\User\Entity;

use App\Domain\User\ValueObject\Phone;
use App\Domain\User\ValueObject\Name;

class User
{
    public function __construct(private Name $name, private Phone $phone)
    {
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }
}
