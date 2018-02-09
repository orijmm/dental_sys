<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod', 100);
            $table->integer('patient_id')->unsigned();
            $table->integer('odontogram_id')->unsigned();
            $table->text('observations')->nullable();
            $table->integer('specialist_id')->unsigned();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')
            ->on('patients')->onDelete('cascade');
            $table->foreign('odontogram_id')->references('id')->on('odontograms');
            $table->foreign('specialist_id')->references('id')->on('specialists');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
