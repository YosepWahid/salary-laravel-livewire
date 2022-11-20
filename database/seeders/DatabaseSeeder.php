<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // SuperAdmin Prepair
        // $super = User::create([
        //     'name' => "YosepWahid",
        //     'email' => "yosep2377@gmail.com",
        //     'active' => 1,
        //     'password' => bcrypt("yosep123wahid"),
        // ]);
        // $super->assignRole(['SuperAdmin']);

        // all inside permission
        $data = Role::find(4);
        $permission = Permission::all();
        $ps = $permission->pluck('name');
        $data->syncPermissions($ps);

        // role
        // Role::create(['name' => 'SuperAdmin']);
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'keuangan']);
        // Role::create(['name' => 'staff']);

        // user Permission
        // Permission::create(['name' => 'View User']);
        // Permission::create(['name' => 'Create User']);
        // Permission::create(['name' => 'Update User']);
        // Permission::create(['name' => 'Detail User']);
        // Permission::create(['name' => 'Delete User']);
        // Role Permission
        // Permission::create(['name' => 'View Role']);
        // Permission::create(['name' => 'Create Role']);
        // Permission::create(['name' => 'Update Role']);
        // Permission::create(['name' => 'Delete Role']);
        // Permission Permission
        // Permission::create(['name' => 'View Permission']);
        // Permission::create(['name' => 'Create Permission']);
        // Permission::create(['name' => 'Update Permission']);
        // Permission::create(['name' => 'Delete Permission']);
    }
}
