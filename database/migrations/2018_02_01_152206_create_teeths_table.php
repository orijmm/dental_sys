<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeethsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teeths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('odontogram_id')->unsigned();
            $table->integer('c1')->nullable();
            $table->integer('c2')->nullable();
            $table->integer('c3')->nullable();
            $table->integer('c4')->nullable();
            $table->integer('c5')->nullable();
            $table->integer('all_c')->nullable();
            $table->timestamps();

            $table->foreign('odontogram_id')
            ->references('id')->on('odontograms')
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
        Schema::dropIfExists('teeths');
    }
}
