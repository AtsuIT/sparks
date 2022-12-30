<?php

namespace App\Services\Interfaces\backOffice;

/**
 * Interface RoleServiceInterface
 * @package App\Services\Interfaces
 */
interface RoleServiceInterface
{
    public function allRoles();
    public function getRoles();
    public function storeRole($data);
    public function findRole($id);
    public function updateRole($data, $id);
    public function destroyRole($id);
}
