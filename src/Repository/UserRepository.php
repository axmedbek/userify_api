<?php


use Src\Entity\User\User;

class UserRepository implements UserRepositoryImpl
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