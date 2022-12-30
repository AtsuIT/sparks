<?php

namespace App\Services\backOffice;

use App\Repositories\backOffice\RoleRepository;
use App\Services\Interfaces\backOffice\RoleServiceInterface;

/**
 * Class RoleService
 * @package App\Services
 */
class RoleService implements RoleServiceInterface
{
    protected $roleRepository;

    function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
        
    }
    
    public function allRoles()
    {
        return $this->roleRepository->allRoles();
    }

    public function getRoles()
    {
        return $this->roleRepository->getRoles();
    }

    public function storeRole($data)
    {
        return $this->roleRepository->storeRole($data);
    }

    public function findRole($id)
    {
        return $this->roleRepository->findRole($id);
    }

    public function rolePermissions($id)
    {
        return $this->roleRepository->rolePermissions($id);
    }

    public function updateRole($data, $id)
    {
        return $this->roleRepository->updateRole($data, $id);
    }

    public function destroyRole($id)
    {
        return $this->roleRepository->destroyRole($id);
    }
}
