<?php

namespace Src\Entity\User;

use DateTime;

class User
{
    private string $name;
    private string $surname;
    private int $age;
    private DateTime $created_at;
    private DateTime $updated_at;
    private DateTime $deleted_at;
}