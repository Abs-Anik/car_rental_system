<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = new User();
        $admin->first_name = "Mr.";
        $admin->last_name = "Admin";
        $admin->username = "Super Admin";
        $admin->email = "superadmin@gmail.com";
        $admin->phone = "017XXXXXXXX";
        $admin->image = "image.jpg";
        $admin->is_admin = 1;
        $admin->password = Hash::make('123456');
        $admin->save();
        $admin->assignRole('Super Admin');

        $admin = new User();
        $admin->first_name = "Mr.";
        $admin->last_name = "Anik";
        $admin->username = "anik";
        $admin->email = "anik@gmail.com";
        $admin->phone = "017XXXXXXXX";
        $admin->image = "image.jpg";
        $admin->is_admin = 0;
        $admin->password = Hash::make('123456');
        $admin->save();
        $admin->assignRole('Editor');
    }
}
