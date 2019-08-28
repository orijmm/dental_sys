<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('detalle');
            $table->integer('concepto_gastos_id')->unsigned();
            $table->integer('status');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('concepto_gastos_id')->references('id')->on('concepto_gastos')->onDelelte('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelelte('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos');
    }
}
