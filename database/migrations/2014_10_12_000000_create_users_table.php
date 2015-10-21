<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //se cambio name por username para tener una identificacion unicas
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();;
            $table->string('email')->unique();
            $table->string("nombres");
            $table->string("apellidos");
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->boolean("active")->default(true);
            $table->string('rol');
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
