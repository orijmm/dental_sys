<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RolesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(UsersSeeder::class);  
        $this->call(NumConsultSeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(SpecialistSeeder::class); 
        $this->call(PatientSeeder::class); 
        $this->call(ConceptoGastoSeeder::class);  
    }
}
