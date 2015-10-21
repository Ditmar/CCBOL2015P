<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableParticipante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participante', function (Blueprint $table) {
            $table->increments('id');
            $table->string("nombres");
            $table->string("apellidos");
            $table->string("nick");
            //$table->string("password");
            $table->string("codigotag")->nullable();//deberia ser otra tabla
            $table->string("ci");
            $table->string("sexo");
            $table->boolean("estado")->default(false);
            $table->string("semestre");
            ///////////////////////////////
            $table->string('emails');
            $table->integer('IdUsAgr')->nullable();
            $table->boolean('participacion')->default(true);
            $table->rememberToken();
            ///////////////////////////////
            //llaves foraneas
            $table->integer("idUni")->unsigned();
            $table->foreign("idUni")->references("id")->on("Universidad");
            $table->integer("idCa")->unsigned();
            $table->foreign("idCa")->references("id")->on("carrera");
            $table->integer("idPais")->unsigned();
            $table->foreign("idPais")->references("id")->on("Paises");
            $table->integer("idCi")->unsigned();
            $table->foreign("idCi")->references("id")->on("Ciudad");

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
        Schema::drop('participante');
    }
}
