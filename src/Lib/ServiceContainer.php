<?php


namespace Src\Lib;


use Src\Repository\Impl\UserRepositoryImpl;
use Src\Repository\UserRepository;
use Src\Service\Impl\UserServiceImpl;
use Src\Service\UserService;

class ServiceContainer
{
    public function __construct()
    {
        $di = new DIContainer();
        $di->set(
            UserServiceImpl::class,
            UserService::class
        );

        $di->set(
            UserRepositoryImpl::class,
            UserRepository::class
        );
    }

}