<?php

use Illuminate\Database\Seeder;

class NumConsultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('num_consults')->insert([
            'name_consult' => '1',
        ]);

        DB::table('num_consults')->insert([
            'name_consult' => '2',
        ]);
    }
}
