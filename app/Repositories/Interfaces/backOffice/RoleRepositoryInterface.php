<?php

namespace App\Repositories\Interfaces\backOffice;

/**
 * Interface RoleServiceInterface
 * @package App\Services\Interfaces
 */
interface RoleRepositoryInterface
{
    public function allRoles();
    public function getRoles();
    public function rolePermissions($id);
    public function storeRole($data);
    public function findRole($id);
    public function updateRole($data, $id);
    public function destroyRole($id);
}
