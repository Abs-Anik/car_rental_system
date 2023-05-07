<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'first_name'=>'Mr.',
               'last_name'=>' Admin',
               'username'=>'Super Admin',
               'email'=>'superadmin@gmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'first_name'=>'Mr. ',
               'last_name'=>'Anik',
               'username'=>'anik',
               'email'=>'anik@gmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
