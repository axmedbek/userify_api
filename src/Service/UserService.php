<?php
namespace Src\Service;

use Src\Entity\User\User;
use UserServiceImpl;

class UserService implements UserServiceImpl
{

    public function fetchAllUsers(int $pagination = 10): array
    {
        return [];
    }

    public function createUser(User $user): void
    {
        // TODO: Implement createUser() method.
    }
}