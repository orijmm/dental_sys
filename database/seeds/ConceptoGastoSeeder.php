<?php

use Illuminate\Database\Seeder;

class ConceptoGastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\ConceptoGasto::class, 20)->create();
    }
}
