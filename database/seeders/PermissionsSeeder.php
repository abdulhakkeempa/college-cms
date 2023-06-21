<?php

namespace Database\Seeders;

use App\Models\User;
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

        // create roles and assign existing permissions
        $faculty = Role::create(['name' => 'Faculty']);
        $faculty->givePermissionTo('edit profile page');

        $staff = Role::create(['name' => 'Office-Staff']);
        $staff->givePermissionTo('edit profile page');

        $admin = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

    
        $user = User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@example.com',
            'acc_type' => 'System Admin',
        ]);

        echo("Created the user ".$user->name);
        $user->assignRole($admin);    
    }
}
