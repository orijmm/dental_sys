<?php

use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'full_name' => 'Petronila Valo',
		    'birthday' => '1987-02-02',
		    'phone' => '04249876577',
		    'dni' => 12322674,
        ]);

        DB::table('patients')->insert([
            'full_name' => 'Sergio Farias',
		    'birthday' => '1990-07-07',
		    'phone' => '04249844533',
		    'dni' => 11665674,
        ]);
    }
}
