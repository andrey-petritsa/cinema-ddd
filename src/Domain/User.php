<?php

namespace App\Domain;

use App\Domain\User\Phone;

class User
{
    public function __construct(private int $id, private Name $name, private Phone $phone)
    {
    }
}
