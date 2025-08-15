<?php

namespace Database\Seeders\Updates;


use Illuminate\Database\Seeder;

use App\Models\PermissionGroup;
use Spatie\Permission\Models\Permission;

class Version231Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        echo "Version231Seeder Running...";
        $this->updatePermissions();
        $this->addNewPermissions();

        echo "\Version231Seeder Completed!!\n";
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
                'name'          =>'report.transaction.cashflow',
                'display_name'  =>'Cash Flow Transaction Report',
                'permission_group_id'  => $permissionGroupId,
            ],
            [
                'name'          =>'report.transaction.bank-statement',
                'display_name'  =>'Bank Statement Transaction Report',
                'permission_group_id'  => $permissionGroupId,
            ],

        ];

        foreach ($reportPermissionsArray as $permission) {
            //Validate is the permission exist
            $isPermssionExist = Permission::where('name', $permission['name'])->count();
            $isPermssionExist = $isPermssionExist>0 ? true : false;

            if(!$isPermssionExist){
                Permission::firstOrCreate([
                                        'name' => $permission['name'],
                                        'display_name' => $permission['display_name'],
                                        'permission_group_id' => $permission['permission_group_id'],
                                        'status' => 1,
                                    ]);
            }//if

        }//foreach



    }
}
