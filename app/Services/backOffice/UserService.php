<?php

namespace App\Services\backOffice;

use App\Repositories\backOffice\UserRepository;
use App\Services\Interfaces\backOffice\UserServiceInterface;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        
    }
    
    public function allUsers()
    {
        return $this->userRepository->allUsers();
    }

    public function storeUser($data)
    {
        return $this->userRepository->storeUser($data);
    }

    public function findUser($id)
    {
        return $this->userRepository->findUser($id);
    }

    public function userRole($user)
    {
        return $this->userRepository->userRole($user);
    }

    public function findProfile($id)
    {
        return $this->userRepository->findProfile($id);
    }

    public function updateUser($data, $id)
    {
        return $this->userRepository->updateUser($data, $id);
    }

    public function destroyUser($id)
    {
        return $this->userRepository->destroyUser($id);
    }
}
