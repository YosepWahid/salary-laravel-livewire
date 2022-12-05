<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DataSeed extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::factory()->count(5)->create();

        // SuperAdmin Prepair
        // $super = User::create([
        //     'name' => "YosepWahid",
        //     'email' => "yosep2377@gmail.com",
        //     'active' => 1,
        //     'password' => bcrypt("yosep123wahid"),
        // ]);
        // $super->assignRole(['SuperAdmin']);

        // all inside permission
        // $data = Role::find(4);
        // $permission = Permission::all();
        // $ps = $permission->pluck('name');
        // $data->syncPermissions($ps);

        // user role
        // $data = User::find(3);
        // $data->assignRole(['Employee']);

        // role
        // Role::create(['name' => 'Employee']);
        // Role::create(['name' => 'Treasurer']);
        // Role::create(['name' => 'Staff']);
        // Role::create(['name' => 'Admin']);
        // Role::create(['name' => 'SuperAdmin']);

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

        // permission all salary
        // Permission::create(['name' => 'View All Salary']);
        // Permission::create(['name' => 'Create All Salary']);
        // Permission::create(['name' => 'Import All Salary']);
        // Permission::create(['name' => 'Update All Salary']);
        // Permission::create(['name' => 'Detail All Salary']);
        // Permission::create(['name' => 'Delete All Salary']);
        // Permission::create(['name' => 'PDF All Salary']);

        // Permission User Salary
        // Permission::create(['name' => 'View User Salary']);
        // Permission::create(['name' => 'Detail User Salary']);
        // Permission::create(['name' => 'PDF User Salary']);

        // permission User ChartPie
        Permission::create(['name' => 'View Chartpie Salary']);
        Permission::create(['name' => 'Year Chartpie Salary']);
        Permission::create(['name' => 'Data Chartpie Salary']);

        // permission Super ChartPie
        Permission::create(['name' => 'View Super Chartpie Salary']);
        Permission::create(['name' => 'Year Super Chartpie Salary']);
        Permission::create(['name' => 'Data Super Chartpie Salary']);

        // permission Salary
    }
}
