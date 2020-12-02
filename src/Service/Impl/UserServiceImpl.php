<?php

namespace Src\Service\Impl;

use Src\Entity\UserEntity;

interface UserServiceImpl
{
    public function fetchAllUsers(int $pagination = 10): array;

    public function createUser(UserEntity $user): void;

    public function updateUser(int $id, UserEntity $user): void;

    public function deleteUser(int $id): void;
}