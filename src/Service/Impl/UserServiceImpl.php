<?php


use Src\Entity\User\User;

interface UserServiceImpl
{
    public function fetchAllUsers(int $pagination = 10): array;

    public function createUser(User $user): void;
}