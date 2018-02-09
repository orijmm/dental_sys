<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('specialty_id')->unsigned();
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->string('email')->unique();
            $table->string('phone',100)->nullable();
            $table->integer('dni');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('specialty_id')->references('id')->on('specialties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialists');
    }
}
