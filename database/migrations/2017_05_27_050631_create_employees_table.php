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
        Schema::create('employees', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('age');
          $table->string('sex', 6);
          $table->string('office');
          $table->timestamps();
          $table->boolean('deleted')->default(0);
          $table->boolean('is_supervisor')->default(0);
          $table->integer('supervisor')->default(NULL);
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
    }
}
