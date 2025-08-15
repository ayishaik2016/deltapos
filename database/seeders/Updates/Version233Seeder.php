<?php

namespace Database\Seeders\Updates;


use Illuminate\Database\Seeder;

use App\Models\PermissionGroup;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Version233Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        echo "Version233Seeder Running...";
        $this->updatePermissions();
        $this->addNewPermissions();

        echo "\Version233Seeder Completed!!\n";
    }

    public function updatePermissions()
    {
       //
    }

    public function addNewPermissions()
    {

        $permissionGroupId = PermissionGroup::firstOrCreate(['name' => 'Dashboard'])->id;

        $reportPermissionsArray = [
            [
                'name'          =>'dashboard.can.view.low.stock.items.table',
                'display_name'  =>'Allow User to View Low Stock Items Table on Dashboard',
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
