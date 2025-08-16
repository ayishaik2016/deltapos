<?php

namespace Database\Seeders\Updates;


use Illuminate\Database\Seeder;

use App\Models\PermissionGroup;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Version232Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        echo "Version232Seeder Running...";
        $this->updatePermissions();
        $this->addNewPermissions();

        echo "\Version232Seeder Completed!!\n";
    }

    public function updatePermissions()
    {
       //
    }

    public function addNewPermissions()
    {

        $permissionGroupId = PermissionGroup::firstOrCreate(['name' => 'General'])->id;

        $reportPermissionsArray = [
            [
                'name'          =>'general.permission.to.change.sale.price',
                'display_name'  =>'Allow User to Change Sale Price',
                'permission_group_id'  => $permissionGroupId,
            ],

        ];

        foreach ($reportPermissionsArray as $permission) {
            // Validate if the permission exists
            $isPermissionExist = Permission::where('name', $permission['name'])->exists();

            if (!$isPermissionExist) {
                $createdPermission = Permission::create([
                    'name' => $permission['name'],
                    'display_name' => $permission['display_name'],
                    'permission_group_id' => $permission['permission_group_id'],
                    'status' => 1,
                ]);
            }

            /**
             * Assign the permission to roles that have 'sale.invoice.create' or 'sale.invoice.edit'
             */
            $roles = Role::whereHas('permissions', function ($query) {
                $query->whereIn('name', ['sale.invoice.create', 'sale.invoice.edit']);
            })->get();

            foreach ($roles as $role) {
                $role->givePermissionTo($permission['name']);
            }

            /**
             * Assign the permission to users that have 'sale.invoice.create' or 'sale.invoice.edit'
             */
            $users = User::whereHas('permissions', function ($query) {
                $query->whereIn('name', ['sale.invoice.create', 'sale.invoice.edit']);
            })->get();

            foreach ($users as $user) {
                $user->givePermissionTo($permission['name']);
            }

        }//$reportPermissionsArray foreach


    }//funciton addNewPermissions
}
