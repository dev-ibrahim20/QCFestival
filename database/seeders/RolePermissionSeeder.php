<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions for Applicants
        $permissions = [
            // Applicant permissions
            'view_applicants',
            'create_applicant',
            'edit_applicant',
            'delete_applicant',

            // Disability permissions
            'view_disabilities',
            'create_disability',
            'edit_disability',
            'delete_disability',

            // User permissions
            'view_users',
            'create_user',
            'edit_user',
            'delete_user',
            'manage_roles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $managerRole = Role::firstOrCreate(['name' => 'Manager']);
        $viewerRole = Role::firstOrCreate(['name' => 'Viewer']);

        // Assign all permissions to Admin
        $adminRole->syncPermissions($permissions);

        // Assign Manager permissions
        $managerPermissions = [
            'view_applicants',
            'create_applicant',
            'edit_applicant',
            'delete_applicant',
            'view_disabilities',
            'create_disability',
            'edit_disability',
            'delete_disability',
            'view_users',
        ];
        $managerRole->syncPermissions($managerPermissions);

        // Assign Viewer permissions
        $viewerPermissions = [
            'view_applicants',
            'view_disabilities',
        ];
        $viewerRole->syncPermissions($viewerPermissions);

        $this->command->info('✓ Roles and Permissions created successfully!');
    }
}
