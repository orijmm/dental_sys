<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_consult_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('specialist_id')->unsigned();
            $table->enum('elije',['Emergencia','Control','Primera Cita']);
            $table->datetime('datetime');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('num_consult_id')->references('id')->on('num_consults');
            $table->foreign('specialist_id')->references('id')->on('specialists');
            $table->foreign('patient_id')
            ->references('id')->on('patients')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
