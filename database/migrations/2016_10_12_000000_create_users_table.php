<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('username')->nullable()->unique();
            $table->date('birthday')->nullable(); 
            $table->string('phones')->nullable();
            $table->string('status', 20);
            $table->string('avatar')->nullable();
            $table->string('lang')->default('es');
            $table->string('address')->nullable();
            $table->string('password');
            $table->timestamp('last_login')->nullable();
            $table->string('confirmation_token', 60)->nullable();
            $table->integer('two_factor_country_code')->nullable();
            $table->integer('two_factor_phone')->nullable();
            $table->text('two_factor_options')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
