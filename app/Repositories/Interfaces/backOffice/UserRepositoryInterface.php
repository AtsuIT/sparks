<?php

namespace App\Repositories\Interfaces\backOffice;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserRepositoryInterface
{
    public function allUsers();
    public function storeUser($data);
    public function findUser($id);
    public function findProfile($id);
    public function updateUser($data, $id);
    public function destroyUser($id);
}
