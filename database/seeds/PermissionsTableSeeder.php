<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-04-17 14:31:44',
            'updated_at' => '2019-04-17 14:31:44',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '17',
                'title'      => 'setting_access',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '18',
                'title'      => 'device_type_access',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '19',
                'title'      => 'device_type_create',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '20',
                'title'      => 'device_type_edit',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '21',
                'title'      => 'device_type_show',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '22',
                'title'      => 'device_type_delete',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '23',
                'title'      => 'device_type_access',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '24',
                'title'      => 'sector_create',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '25',
                'title'      => 'sector_edit',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '26',
                'title'      => 'sector_show',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '27',
                'title'      => 'sector_delete',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '28',
                'title'      => 'sector_access',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '29',
                'title'      => 'device_create',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '30',
                'title'      => 'device_edit',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '31',
                'title'      => 'device_show',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '32',
                'title'      => 'device_delete',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '33',
                'title'      => 'device_access',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '34',
                'title'      => 'audit_log_show',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '35',
                'title'      => 'audit_log_access',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '36',
                'title'      => 'team_create',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '37',
                'title'      => 'team_edit',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '38',
                'title'      => 'team_show',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '39',
                'title'      => 'team_delete',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ],
            [
                'id'         => '40',
                'title'      => 'team_access',
                'created_at' => '2019-04-17 14:31:44',
                'updated_at' => '2019-04-17 14:31:44',
            ]];

        Permission::insert($permissions);
    }
}
