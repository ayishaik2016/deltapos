<?php

namespace Database\Seeders\Updates;


use Illuminate\Database\Seeder;

use App\Models\PermissionGroup;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Version234Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        echo "Version234Seeder Running...";
        $this->updatePermissions();
        $this->addNewPermissions();

        echo "\Version234Seeder Completed!!\n";
    }

    public function updatePermissions()
    {
       //
    }

    public function addNewPermissions()
    {

        $permissionGroupId = PermissionGroup::firstOrCreate(['name' => 'Stock Adjustment'])->id;

        $reportPermissionsArray = [
            [
                'name'          =>'stock_adjustment.create',
                'display_name'  =>'Create',
                'permission_group_id'  => $permissionGroupId,
            ],
            [
                'name'          =>'stock_adjustment.edit',
                'display_name'  =>'Edit',
                'permission_group_id'  => $permissionGroupId,
            ],
            [
                'name'          =>'stock_adjustment.delete',
                'display_name'  =>'Delete',
                'permission_group_id'  => $permissionGroupId,
            ],
            [
                'name'          =>'stock_adjustment.view',
                'display_name'  =>'View',
                'permission_group_id'  => $permissionGroupId,
            ],
            [
                'name'          =>'stock_adjustment.can.view.other.users.stock.adjustments',
                'display_name'  =>'Allow User to View All Stock Adjustment Created By Other Users',
                'permission_group_id'  => $permissionGroupId,
            ],
            // [
            //     'name'          =>'report.stock_adjustment',
            //     'display_name'  =>'Stock Adjustment Report',
            //     'permission_group_id'  => $permissionGroupId,
            // ],
            // [
            //     'name'          =>'report.stock_transfer.item',
            //     'display_name'  =>'Item Stock Adjustment Report',
            //     'permission_group_id'  => $permissionGroupId,
            // ],


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
