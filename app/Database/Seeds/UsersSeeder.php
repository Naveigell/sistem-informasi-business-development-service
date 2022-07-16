<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin123',
                'name'     => 'admin',
                'email'    => 'admin@gmail.com',
                'password' => password_hash(123456, PASSWORD_DEFAULT),
                'phone'    => '087384723',
                'address'  => 'Jln Raya No 1',
                'role'     => User::ROLE_ADMIN,
            ],
            [
                'username' => 'client',
                'name'     => 'client',
                'email'    => 'client@gmail.com',
                'password' => password_hash(123456, PASSWORD_DEFAULT),
                'phone'    => '083499134',
                'address'  => 'Jln Raya No 2',
                'role'     => User::ROLE_CLIENT,
            ],
            [
                'username' => 'client2',
                'name'     => 'client2',
                'email'    => 'client2@gmail.com',
                'password' => password_hash(123456, PASSWORD_DEFAULT),
                'phone'    => '0829489124',
                'address'  => 'Jln Raya No 2',
                'role'     => User::ROLE_CLIENT,
            ],
            [
                'username' => 'consultant',
                'name'     => 'consultant',
                'email'    => 'consultant@gmail.com',
                'password' => password_hash(123456, PASSWORD_DEFAULT),
                'phone'    => '084487341325',
                'address'  => 'Jln Raya No 3',
                'role'     => User::ROLE_CONSULTANT,
            ],
            [
                'username' => 'consultant1',
                'name'     => 'consultant1',
                'email'    => 'consultant1@gmail.com',
                'password' => password_hash(123456, PASSWORD_DEFAULT),
                'phone'    => '0739841234',
                'address'  => 'Jln Raya No 3',
                'role'     => User::ROLE_CONSULTANT,
            ],
            [
                'username' => 'consultant2',
                'name'     => 'consultant2',
                'email'    => 'consultant2@gmail.com',
                'password' => password_hash(123456, PASSWORD_DEFAULT),
                'phone'    => '0826841345',
                'address'  => 'Jln Raya No 3',
                'role'     => User::ROLE_CONSULTANT,
            ],
        ];

        (new User())->insertBatch($data);
    }
}
