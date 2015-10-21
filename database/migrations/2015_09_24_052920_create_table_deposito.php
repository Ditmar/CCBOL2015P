<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDeposito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposito', function (Blueprint $table) {
            $table->increments('id');
            $table->string("codigo");
            $table->integer("monto");
            $table->date("fecha");
            $table->time("hora");
            $table->string("depositante");
            ////////////////////////////////
            $table->string('ci_depositante');
            $table->string('imgboleta');
            $table->rememberToken();
            ////////////////////////////////
            $table->integer("idPa")->unsigned();
            $table->foreign("idPa")->references("id")->on("participante");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('deposito');
    }
}
