<?php

use Illuminate\Database\Seeder;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialists')->insert([
            'specialty_id' => 1,
		    'name' => 'Maria',
		    'last_name' => 'Paredes',
		    'email' => 'mariap@gmail.com',
		    'phone' => '04249876545',
		    'dni' => 12345674,
		    'status' => 1,
        ]);

        DB::table('specialists')->insert([
            'specialty_id' => 2,
		    'name' => 'Pedro',
		    'last_name' => 'Paredes',
		    'email' => 'pedrop@gmail.com',
		    'phone' => '04249844545',
		    'dni' => 12665674,
		    'status' => 1,
        ]);
    }
}
