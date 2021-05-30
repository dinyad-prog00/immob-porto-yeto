<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRdv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rendezvouses', function (Blueprint $table) {
            //
            $table->dateTime("date_rdv");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rendezvouses', function (Blueprint $table) {
            //
            $table->dropColumn('date_rdv');
        });
    }
}
