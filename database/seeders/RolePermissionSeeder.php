<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;  // Import Permission dari Spatie
use Spatie\Permission\Models\Role;        // Import Role dari Spatie
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // permission untuk menentukan role nya
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage abouts',
            'manage appointments',
            'manage hero sections',
        ];

        foreach ($permissions as $permission){
            Permission::firstOrCreate(['name' => $permission]);
        }

        // role Design Manager
        $designManagerRole = Role::firstOrCreate(['name' => 'Designer_Manager']);

        $designManagerPermissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials'
        ];
        
        // Harus menggunakan syncPermissions
        $designManagerRole->syncPermissions($designManagerPermissions);

        // role super admin
        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin']);
        $superAdminRole->syncPermissions($permissions);
        
        $user = User::create([
            'name' => 'Voycomp',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('palayam'),
        ]);

        $user->assignRole($superAdminRole);
    }
}
