<?php

namespace App\Services\Interfaces\backOffice;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserServiceInterface
{
    public function allUsers();
    public function storeUser($data);
    public function findUser($id);
    public function userRole($user);
    public function findProfile($id);
    public function updateUser($data, $id);
    public function destroyUser($id);
}
