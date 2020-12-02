<?php

namespace Src\Repository;

use PDO;
use Src\Entity\UserEntity;
use Src\Lib\Database\ConnectionFactory;
use Src\Repository\Impl\UserRepositoryImpl;

class UserRepository implements UserRepositoryImpl
{
    private $connection;

    public function __construct(ConnectionFactory $connection)
    {
        $this->connection = $connection;
    }


    public function fetchAllUsers(int $pagination = 10): array
    {
        return $this->connection->query("SELECT * FROM users", PDO::FETCH_ASSOC);
    }

    public function createUser(UserEntity $user): void
    {
        $name = $user->getName();
        $surname = $user->getSurname();
        $age = $user->getAge();

        $sql = "INSERT INTO users (name, surname, age) VALUES (?,?,?)";
        $this->connection->prepare($sql)->execute([$name, $surname, $age]);
    }

    public function updateUser(int $id, UserEntity $user): void
    {
        // TODO: Implement updateUser() method.
    }

    public function deleteUser(int $id): void
    {
        // TODO: Implement deleteUser() method.
    }
}