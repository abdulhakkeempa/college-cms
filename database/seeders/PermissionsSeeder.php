<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // permission for faculty & office staff
        Permission::create(['name' => 'edit profile page']);

        // permission for office staff
        Permission::create(['name' => 'create news']);
        Permission::create(['name' => 'update news']);
        Permission::create(['name' => 'delete news']);

        // create roles and assign existing permissions
        $faculty = Role::create(['name' => 'faculty']);
        $faculty->givePermissionTo('edit profile page');

        $staff = Role::create(['name' => 'office staff']);
        $staff->givePermissionTo('create news');
        $staff->givePermissionTo('update news');
        $staff->givePermissionTo('delete news');

        $admin = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Teacher',
            'email' => 'teacher@example.com',
        ]);
        $user->assignRole($faculty);

        $user = \App\Models\User::factory()->create([
            'name' => 'Office',
            'email' => 'office@example.com',
        ]);
        $user->assignRole($staff);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($admin);
    }
}
