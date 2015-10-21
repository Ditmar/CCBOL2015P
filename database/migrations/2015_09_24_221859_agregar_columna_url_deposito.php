<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarColumnaUrlDeposito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('deposito', function($table)
        {
            $table->string("url");
            $table->string("absurl");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deposito', function($table)
        {
            $table->dropColumn("url");
            $table->dropColumn("absurl");
        });
        //
    }
}
