<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name' => 'Admin Name',
            'mobile' => '981000000',
            'is_admin' => 1,
            'status' => 1,
            'work_phone' => null,
            'address_street' => null,
            'address_city' => null,
            'address_state' => null,
            'description' => null,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            ],
            [
            'name' => 'Test Name',
            'mobile' => '981000000',
            'is_admin' => 0,
            'status' => 1,
            'work_phone' => null,
            'address_street' => null,
            'address_city' => null,
            'address_state' => null,
            'description' => null,
            'email' => 'test@gmail.com',
            'password' => bcrypt('test123'),
            ]
        ];
        foreach($users as $keys => $value){
            User::create($value);
        }
    }
}
