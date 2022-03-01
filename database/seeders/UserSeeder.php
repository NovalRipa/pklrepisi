<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {       
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Administrator';
        $adminRole->save();

        $memberRole = new Role();
        $memberRole->name = 'member';
        $memberRole->display_name = 'Member';
        $memberRole->save();

        $admin = new User();
        $admin->name = "Admin Pkl";
        $admin->email = "admin@gmail.com";
        $admin->password = Hash::make('a');
        $admin->save();
        $admin->attachRole($adminRole);

        $member = new User();
        $member->name = "Member Use";
        $member->email = "member@gmail.com";
        $member->password = Hash::make('d');
        $member->save();
        $admin->attachRole($memberRole);
    }
}
