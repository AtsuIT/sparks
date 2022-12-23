<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role= Role::create(['name'=>'admin','guard_name' => 'api']);
        $role1= Role::create(['name'=>'user','guard_name' => 'api']);
        $user= User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('147258'),
        ]);
        $user->assignRole($role);

        // DB::table('model_has_roles')->insert([
        //     'role_id' => 1,
        //     'model_type' => 'App\Models\User',
        //     'model_id' => 1
        // ]);

        // \App\Models\User::factory(10)->create();

    }
}
