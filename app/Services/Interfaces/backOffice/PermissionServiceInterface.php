<?php

namespace App\Services\Interfaces\backOffice;

/**
 * Interface PermissionServiceInterface
 * @package App\Services\Interfaces
 */
interface PermissionServiceInterface
{
    public function allPermissions();
    public function getPermissions();
    public function storePermission($data);
    public function findPermission($id);
    public function updatePermission($data, $id);
    public function destroyPermission($id);
}
