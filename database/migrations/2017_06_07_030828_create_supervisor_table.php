<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('SUPERVISORS', function (Blueprint $table) {
        $table->increments('SUP_ID');
        $table->string('SUP_office');
        $table->increments('PER_ID');
        $table->foreign('PER_ID')->references('PER_ID')->on('persons');
      });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
