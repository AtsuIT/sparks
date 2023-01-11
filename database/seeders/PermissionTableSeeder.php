<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'permission-list',
           'permission-create',
           'permission-edit',
           'permission-delete',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'cities-list',
           'address-sparks-list',
           'address-aymakan-list',
           'address-create',
           'address-edit',
           'order-delete',
           'order-sparks-list',
           'order-aymakan-list',
           'order-create',
           'order-edit',
           'order-timeline',
           'order-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission,'guard_name'=>'web']);
        }
    }
}
