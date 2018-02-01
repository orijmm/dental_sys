<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'System Administrator',
            'removable' => false
        ]);

        DB::table('roles')->insert([
            'name' => 'user',
            'display_name' => 'user',
            'description' => 'Default system user.',
            'removable' => false
        ]);
    
    }
}
