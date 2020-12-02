<?php

namespace Src\Controllers\V1\User;

use Src\Controllers\BaseController;
use Src\Entity\UserEntity;
use Src\Lib\Request\Request;
use Src\Service\Impl\UserServiceImpl;

class UserController extends BaseController
{
    private $userService;

    public function __construct(UserServiceImpl $userService = null)
    {
        $this->userService = $userService;
    }


    public function getAllUsers()
    {
        return $this->successResponse([
            'data' => $this->userService->fetchAllUsers(10)
        ]);
    }

    public function handleCreateUser()
    {
        $request = new Request();
        $data = $request->getBody();

        if (isset($data['name']) && isset($data['surname']) && isset($data['age'])) {
            $user = new UserEntity($data['name'],'User',23);

            $this->userService->createUser($user);

            return $this->successResponse([
                'message' => 'Successfully created!'
            ]);
        } else {
            return $this->errorResponse([
                'message' => 'Validation problem !'
            ]);
        }
    }

    public function handleUpdateUser($id){
        $request = new Request();
        $data = $request->getBody();

        if (isset($data['name']) && isset($data['surname']) && isset($data['age'])) {
            $user = new UserEntity($data['name'],'User',23);

            $this->userService->updateUser($id,$user);

            return $this->successResponse([
                'message' => 'Successfully updated!'
            ]);
        } else {
            return $this->errorResponse([
                'message' => 'Validation problem !'
            ]);
        }
    }


    public function handleDeleteUser($id){
        $this->userService->deleteUser($id);
        return $this->successResponse([
            'message' => 'Successfully deleted!'
        ]);
    }
}