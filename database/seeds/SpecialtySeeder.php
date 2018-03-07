<?php

use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialties')->insert([
            'name' => 'Especialidad 1',
        ]);

        DB::table('specialties')->insert([
            'name' => 'Especialidad 2',
        ]);
    }
}
