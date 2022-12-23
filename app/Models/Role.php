<?php

namespace App\Models;
use Spatie\Permission\Models\Permission;
// use Spatie\Translatable\HasTranslations;

/**
 * Class Role
 *
 * @property Permission[] $permissions
 * @property string $name
 * @package App\Models
 */
class Role extends \Spatie\Permission\Models\Role
{
    // use HasTranslations;
    public $guard_name = 'api';
    // public $translatable = ['name'];

    
    
    /**
     * Check whether current role is admin
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->name === 'admin';
    }
}
