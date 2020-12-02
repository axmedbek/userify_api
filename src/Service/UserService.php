<?php
namespace Src\Service;

use Src\Entity\UserEntity;
use Src\Repository\Impl\UserRepositoryImpl;
use Src\Service\Impl\UserServiceImpl;

class UserService implements UserServiceImpl
{
    private $userRepository;

    public function __construct(UserRepositoryImpl $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function fetchAllUsers(int $pagination = 10): array
    {
        return $this->userRepository->fetchAllUsers($pagination);
    }

    public function createUser(UserEntity $user): void
    {
        $this->userRepository->createUser($user);
    }

    public function updateUser(int $id, UserEntity $user): void
    {
        $this->userRepository->updateUser($id,$user);
    }

    public function deleteUser(int $id): void
    {
        $this->userRepository->deleteUser($id);
    }
}