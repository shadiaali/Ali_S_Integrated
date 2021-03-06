<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('roleName', 'admin')->first();
        $userRole = Role::where('roleName', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'password' => Hash::make('password')

            ]);



        $user = User::create([
            'name' => 'Regular Level user',
            'email' => 'user@email.com',
            'password' => Hash::make('password')

        ]);

    

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);

    }
}
