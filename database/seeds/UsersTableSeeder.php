<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$eySfbTKip85kP6.qGKZh3O.gOv73kCg.9.rnR.Xegz58xdAt1T9.u',
            'remember_token' => null,
            'created_at'     => '2019-04-17 14:12:10',
            'updated_at'     => '2019-04-17 14:12:10',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
