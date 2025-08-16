<?php

namespace Database\Seeders\Updates;


use Illuminate\Database\Seeder;

use App\Models\PermissionGroup;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Version236Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        echo "Version236Seeder Running...";
        $this->updatePermissions();
        $this->addNewPermissions();

        echo "\Version236Seeder Completed!!\n";
    }

    public function updatePermissions()
    {
       //
    }

    public function addNewPermissions()
    {

        $permissionGroupId = PermissionGroup::firstOrCreate(['name' => 'Reports'])->id;

        $reportPermissionsArray = [
            [
                'name'          =>'report.stock_adjustment',
                'display_name'  =>'Stock Adjustment Report',
                'permission_group_id'  => $permissionGroupId,
            ],
            [
                'name'          =>'report.stock_adjustment.item',
                'display_name'  =>'Item Wise Stock Adjustment Report',
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

        }//$reportPermissionsArray foreach


    }//funciton addNewPermissions
}
