<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositoParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposito_participantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_participante');
            $table->integer('codigo')->unique();
            $table->date('fecha');
            $table->string('hora');
            $table->string('depositante');
            $table->integer('ci_depositante');
            $table->string('imgboleta');
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
        Schema::drop('deposito_participantes');
    }
}
