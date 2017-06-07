<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EMPLOYEES', function (Blueprint $table) {
          $table->increments('EMP_ID');
          $table->string('EMP_OFFICE');
          $table->increments('PER_ID');
          $table->integer('SUPERVISOR_ID')->default(NULL);
          $table->foreign('SUPERVISOR_ID')->references('SUP_ID')->on('SUPERVISORS');
          $table->foreign('PER_ID')->references('PER_ID')->on('PERSONS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('EMPLOYEES');
    }
}
