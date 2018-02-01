<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use App\Support\User\UserStatus;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_1 = User::create([
            'name' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => 'secret',
            'status' => UserStatus::ACTIVE,
            'created_at' => \Carbon\Carbon::now()
        ]);

        $admin = Role::where('name', 'admin')->first();
        $user_1->attachRole($admin);

        $user_2 = User::create([
            'name' => 'user',
            'lastname' => 'user',
            'email' => 'user@user.com',
            'username' => 'user',
            'password' => 'secret',
            'status' => UserStatus::ACTIVE,
            'created_at' => \Carbon\Carbon::now()
        ]);

        $user = Role::where('name', 'user')->first();
        $user_2->attachRole($user);
    }
}
