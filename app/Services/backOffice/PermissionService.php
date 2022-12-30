<?php

namespace App\Services\backOffice;

use App\Repositories\backOffice\PermissionRepository;
use App\Services\Interfaces\backOffice\PermissionServiceInterface;

/**
 * Class PermissionService
 * @package App\Services
 */
class PermissionService implements PermissionServiceInterface
{
    protected $permissionRepository;

    function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
        
    }

    public function getPermissions()
    {
        return $this->permissionRepository->getPermissions();
    }
    
    public function allPermissions()
    {
        return $this->permissionRepository->allPermissions();
    }

    public function storePermission($data)
    {
        return $this->permissionRepository->storePermission($data);
    }

    public function findPermission($id)
    {
        return $this->permissionRepository->findPermission($id);
    }

    public function updatePermission($data, $id)
    {
        return $this->permissionRepository->updatePermission($data, $id);
    }

    public function destroyPermission($id)
    {
        return $this->permissionRepository->destroyPermission($id);
    }
}
